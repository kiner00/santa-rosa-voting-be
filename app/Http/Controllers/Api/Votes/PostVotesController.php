<?php

namespace App\Http\Controllers\Api\Votes;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Position;
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
                        $invalidCandidates = Candidate::whereNotIn('id', $value)
                            ->where('position_id', $position->id)
                            ->exists();

                        if ($invalidCandidates) {
                            $fail('Invalid candidates for ' . $attribute);
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
                // Logic to record the vote
                Vote::create([
                    'position_id' => $positionId,
                    'candidate_id' => $candidateId,
                    'user_id' => auth()->id(),
                ]);
            }
        }

        return response()->json(['message' => 'Vote successfully recorded!'], 200);
    }

}
