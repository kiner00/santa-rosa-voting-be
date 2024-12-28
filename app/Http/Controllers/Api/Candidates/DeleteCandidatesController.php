<?php

namespace App\Http\Controllers\Api\Candidates;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class DeleteCandidatesController extends Controller
{
    public function deleteCandidate(Request $request)
    {
        $candidate = Candidate::find($request->id);
        $candidate->delete();
        return response()->json([
            'message' => 'Candidate deleted successfully'
        ]);
    }
}
