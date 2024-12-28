<?php

namespace App\Http\Controllers\Api\Candidates;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class GetCandidatesController extends Controller
{
    public function getCandidates(Request $request)
    {
        $candidates = Candidate::paginate(20);
        return response()->json([
            'candidates' => $candidates
        ]);
    }
}
