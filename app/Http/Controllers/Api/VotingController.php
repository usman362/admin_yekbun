<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voting;
use App\Models\VotingReaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votings = Voting::with('reactions')->get();
        return response()->json(['Voting' => $votings, 'success' => true], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        $imagePath  = $request->audio;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('/images/voting/', 'public');
            $imagePath = $path;
        }
        $voting = Voting::create([
            'name' => $request->name,
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        return response()->json([
            "success" => true,
            "message" => "Voting successfully created.",
            "data" => $voting
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vote = Voting::find($id);
        $vote->name = $request->name ?? $vote->name;
        $vote->category_id = $request->category_id ?? $vote->category_id;
        $vote->description = $request->description ?? $vote->description;

        if ($request->hasFile('image')) {
            if (isset($vote->banner)) {
                $image_path = public_path('storage/' . $vote->banner);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                $path = $request->file('image')->store('/images/voting', 'public');
                $vote->banner = $path;
            }
        }
        if ($vote->update()) {
            return response()->json('Voting Updated Successfully', 200);
        } else {
            return response()->json('Failed to updated voting', 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vote = Voting::find($id);
        if ($vote->banner) {
            $image_path = public_path('storage/' . $vote->banner);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        if ($vote->delete($vote->id)) {
            return response()->json('Voting Deleted Successfully', 200);
        } else {
            return response()->json('Failed to delete vote', 400);
        }
    }

    public function get_cover($id = null)
    {
        $voting = Voting::select('id', 'name', 'category_id', 'description', 'status')->with('gallery')->orderBy('created_at', 'desc')->take(1)->get();

        if (sizeof($voting) > 0) {
            // $voting[0]->banner = url('/') . '/storage/' . $voting[0]->banner;

            $voting_reaction = VotingReaction::where('user_id', $id)->where('vote_id', $voting[0]->id)->first();

            $voting[0]->user_reaction = $voting_reaction;
        }

        return response()->json(['success' => true, 'data' => $voting]);
    }

    public function fetch($id = null)
    {
        $voting = Voting::select('id', 'name', 'category_id', 'description', 'status')->orderBy('created_at', 'desc')->take(5)->with(['voting_category', 'gallery'])->get();
        foreach ($voting as $item) {
            // $item->banner = url('/') . '/storage/' . $item->banner;

            $voting_reaction = VotingReaction::where('user_id', $id)->where('vote_id', $item->id)->first();

            $item->user_reaction = $voting_reaction;
        }

        return response()->json(['success' => true, 'data' => $voting]);
    }

    public function fetch_all($id = null)
    {
        $voting = Voting::select('id', 'description', 'name', 'category_id', 'status')->orderBy('created_at', 'desc')->with(['voting_category', 'gallery'])->get();
        foreach ($voting as $item) {
            // $item->banner = url('/') . '/storage/' . $item->banner;

            $voting_reaction = VotingReaction::where('user_id', $id)->where('vote_id', $item->id)->first();

            $item->user_reaction = $voting_reaction;
        }

        return response()->json(['success' => true, 'data' => $voting]);
    }

    public function get_details($id, $user_id = null)
    {
        $voting = Voting::with(['voting_category', 'gallery'])->find($id);

        if ($voting != "") {
            // $voting->banner = url('/') . '/storage/' . $voting->banner;

            $voting_reaction = VotingReaction::where('user_id', $user_id)->where('vote_id', $voting->id)->first();

            $voting->user_reaction = $voting_reaction;
        }

        return response()->json(['success' => true, 'data' => $voting]);
    }

    public function store_reaction(Request $request)
    {
        $credentails = $request->validate([
            'user_id' => 'required',
            'vote_id' => 'required',
            'type' => 'required',
        ]);

        $existing_voting = VotingReaction::where('user_id', $request->user_id)->where('vote_id', $request->vote_id)->first();

        if ($existing_voting != "") {
            if ($existing_voting->type == $request->type) {
                $existing_voting->delete();

                return response()->json(['success' => true, 'message' => 'Vote removed.']);
            } else {
                $existing_voting->type = $request->type;
                $existing_voting->save();

                return response()->json(['success' => true, 'message' => 'Vote updated.']);
            }
        }

        VotingReaction::create($credentails);

        return response()->json(['success' => true, 'message' => 'Vote saved.']);
    }

    public function get_statistics($id)
    {
        $vote = Voting::with('voting_category')->find($id);
        if (empty($vote)) {
            return response()->json(['message' => 'Vote Not Found!', 'success' => false], 404);
        }
        // Define age groups
        $ageGroups = [
            '18-24' => [18, 24],
            '25-30' => [25, 30],
            '31-35' => [31, 35],
            '36-40' => [36, 40]
        ];

        $statistics = [];

        foreach ($ageGroups as $ageRange => [$minAge, $maxAge]) {
            // Fetch users within this age range
            $users = DB::table('users')->get()->filter(function ($user) use ($minAge, $maxAge) {
                if (!isset($user['dob'])) {
                    return false;
                }
                $age = Carbon::parse($user['dob'])->age; // Calculate age from DOB
                return $age >= $minAge && $age <= $maxAge;
            });

            // Extract user IDs
            $userIds = $users->map(fn($user) => (string) $user['_id'])->toArray();

            // Fetch reactions for these users
            $reactions = DB::table('voting_reactions')->whereIn('user_id', $userIds)->where('voting_id', $id)->get();

            // Initialize gender-based stats
            // $genderStats = ['reviews' => 0, 'likes' => 0, 'neutrals' => 0, 'dislikes' => 0];
            $maleStats = ['reviews' => 0, 'likes' => 0, 'neutrals' => 0, 'dislikes' => 0];
            $femaleStats = ['reviews' => 0, 'likes' => 0, 'neutrals' => 0, 'dislikes' => 0];

            foreach ($reactions as $reaction) {
                $user = $users->where('_id', $reaction['user_id'])->first();
                $gender = $user['gender'] ?? 'male'; // Default male if missing
                // Determine the category
                if ($gender == 'male') {
                    if ($reaction['type'] == 1) {
                        $maleStats['likes']++;
                    } elseif ($reaction['type'] == 2) {
                        $maleStats['neutrals']++;
                    } elseif ($reaction['type'] == 3) {
                        $maleStats['dislikes']++;
                    }
                    $maleStats['reviews']++;
                } else {
                    if ($reaction['type'] == 1) {
                        $femaleStats['likes']++;
                    } elseif ($reaction['type'] == 2) {
                        $femaleStats['neutrals']++;
                    } elseif ($reaction['type'] == 3) {
                        $femaleStats['dislikes']++;
                    }
                    $femaleStats['reviews']++;
                }
            }
            // Find max value for percentage calculations
            $max = max($maleStats['reviews'], $femaleStats['reviews'], 1); // Avoid division by zero

            // dd($max);
            $statistics[] = [
                'age' => $ageRange,
                'max' => $max,
                'male' => $maleStats,
                'female' => $femaleStats
            ];
        }

        // Calculate total values
        $total_reviews = 0;
        $total_likes = 0;
        $total_dislikes = 0;
        $total_neutrals = 0;

        foreach ($statistics as $stat) {
            $total_reviews += $stat['male']['reviews'] + $stat['female']['reviews'];
            $total_likes += $stat['male']['likes'] + $stat['female']['likes'];
            $total_dislikes += $stat['male']['dislikes'] + $stat['female']['dislikes'];
            $total_neutrals += $stat['male']['neutrals'] + $stat['female']['neutrals'];
        }

        return response()->json([
            'success' => true,
            'message' => 'Voting Statistics!',
            'data' => [
                'statistics' => $statistics,
                'totals' => [
                    'reviews' => $total_reviews,
                    'likes' => $total_likes,
                    'neutrals' => $total_neutrals,
                    'dislikes' => $total_dislikes
                ]
            ],
        ], 200);
    }
}

// 18 - 24
// 25 - 32
// 33 - 39
// 40+
