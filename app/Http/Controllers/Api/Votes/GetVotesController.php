<?php

namespace App\Http\Controllers\Api\Votes;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetVotesController extends Controller
{
    public function getVote(Request $request)
    {
        $barangayId = $request->query('barangay_id'); // Get the barangay_id parameter

        $query = Candidate::with('position')
            ->withCount(['votes as votes_count' => function ($query) use ($barangayId) {
                if ($barangayId) {
                    // Filter votes by barangay_id through the users table
                    $query->whereHas('user', function ($userQuery) use ($barangayId) {
                        $userQuery->where('barangay_id', $barangayId);
                    });
                }
            }]);

        // Get results and group by position
        $votes = $query->get()
            ->groupBy('position.name')
            ->map(function ($candidates) {
                return $candidates->map(function ($candidate) {
                    return [
                        'candidate_id' => $candidate->id,
                        'name' => $candidate->name,
                        'votes_count' => $candidate->votes_count,
                    ];
                });
            });

        return response()->json($votes);
    }
}
