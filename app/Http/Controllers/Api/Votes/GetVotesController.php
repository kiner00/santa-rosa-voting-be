<?php

namespace App\Http\Controllers\Api\Votes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetVotesController extends Controller
{
    public function getVote(Request $request)
    {
        $votes = DB::table('candidates')
            ->join('positions', 'positions.id', '=', 'candidates.position_id')
            ->leftJoin('votes', 'votes.candidate_id', '=', 'candidates.id')
            ->select(
                'positions.name as position_name',
                'candidates.id as candidate_id',
                'candidates.name as candidate_name',
                DB::raw('COUNT(votes.id) as votes_count')
            )
            ->groupBy('positions.name', 'candidates.id', 'candidates.name')
            ->get()
            ->groupBy('position_name');

        return response()->json($votes);
    }
}
