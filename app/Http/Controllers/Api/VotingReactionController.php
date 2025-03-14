<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Voting;
use App\Models\VotingReaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotingReactionController extends Controller
{
    /**
     * Get reactions for a voting post.
     */
    public function index(Request $request, $voting_id)
    {
        $reactions = VotingReaction::select('voting_id', 'user_id', 'type')
            ->where('voting_id', $voting_id)
            ->with(['user' => function ($q) {
                $q->select('name', 'username', 'email', 'last_name');
            }]);
        if (!empty($request->user_id)) {
            $reactions->where('user_id', $request->user_id);
        }
        $reactions = $reactions->get();
        return response()->json(['success' => true, 'data' => $reactions]);
    }

    /**
     * Add or update a voting reaction.
     */
    public function store(Request $request)
    {
        $request->validate([
            'voting_id' => 'required',
            'type' => 'required',
        ]);

        $voting = Voting::find($request->voting_id);

        if (empty($voting)) {
            return response()->json(['success' => false, 'message' => 'Vote not Found!']);
        }

        $user_id = Auth::id(); // Assuming auth middleware is applied

        // Check if user already reacted
        $reaction = VotingReaction::updateOrCreate(
            ['user_id' => $user_id, 'voting_id' => $request->voting_id],
            ['type' => $request->type]
        );

        return response()->json(['success' => true, 'data' => $reaction]);
    }

    /**
     * Remove a reaction.
     */
    public function destroy($id)
    {
        $reaction = VotingReaction::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$reaction) {
            return response()->json(['success' => false, 'message' => 'Reaction not found'], 404);
        }

        $reaction->delete();

        return response()->json(['success' => true, 'message' => 'Reaction removed']);
    }
}
