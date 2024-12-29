<?php

namespace App\Http\Controllers\Api\Votes;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;

class DeleteVotesController extends Controller
{
    public function deleteVote(Request $request)
    {
        $vote = Vote::whereUserId(auth()->user()->id)->get();

        if ($vote->isEmpty()) {
            return response()->json(['error' => 'Vote not found'], 404);
        }

        $vote->delete();

        return response()->json(['message' => 'Vote deleted successfully']);
    }
}
