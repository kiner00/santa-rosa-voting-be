<?php

namespace App\Http\Controllers\Api\Votes;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Position;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

class PostVotesController extends Controller
{
    public function vote(Request $request)
    {
        $positions = Position::select('id', 'maximum_candidates')->get();

        // Build validation rules dynamically based on positions
        $rules = [
            'votes' => 'required|array',
        ];

        foreach ($positions as $position) {
            $rules["votes.{$position->id}"] = [
                'array',
                'max:' . $position->maximum_candidates, // Limit the number of candidates
                function ($attribute, $value, $fail) use ($position) {
                    if (!empty($value)) {
                        // Check if all candidate IDs belong to the specified position
                        $validCandidateCount = Candidate::whereIn('id', $value)
                            ->where('position_id', $position->id)
                            ->count();

                        if ($validCandidateCount !== count($value)) {
                            $fail("One or more candidates in {$attribute} are invalid for position ID {$position->id}.");
                        }
                    }
                },
            ];
            $rules["votes.{$position->id}.*"] = 'exists:candidates,id'; // Ensure candidate exists
        }

        $validated = $request->validate($rules);

        // Process votes
        foreach ($validated['votes'] as $positionId => $candidateIds) {
            foreach ($candidateIds as $candidateId) {
                // Record the vote
                Vote::create([
                    'position_id' => $positionId,
                    'candidate_id' => $candidateId,
                    'user_id' => auth()->id(),
                ]);
            }
        }

        User::where('id', auth()->id())->update(['has_voted' => true]);

        return response()->json(['message' => 'Vote successfully recorded!'], 200);
    }
}
