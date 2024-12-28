<?php

namespace App\Http\Controllers\Api\Candidates;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class UpdateCandidatesController extends Controller
{
    public function updateCandidates(Request $request)
    {
        $candidate = Candidate::find($request->id);
        $candidate->update($request->all());
        return response()->json([
            'message' => 'Candidate updated successfully',
            'candidate' => $candidate
        ]);
    }
}
