<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\UserSuggestionService;

class UserSuggestionController extends Controller
{
    protected $suggestionService;

    public function __construct(UserSuggestionService $suggestionService)
    {
        $this->suggestionService = $suggestionService;
    }

    public function index()
    {
        $currentUser = Auth::user();

        if (!$currentUser) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $suggestions = $this->suggestionService->getSuggestions($currentUser, 10);

        return response()->json([
            'status' => true,
            'suggestions' => $suggestions
        ]);
    }
}
