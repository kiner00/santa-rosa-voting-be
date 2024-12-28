<?php

namespace App\Http\Controllers\Api\Candidates;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class AddCandidatesController extends Controller
{
    public function addCandidates(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'alias' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position_id' => 'required|exists:positions,id',
        ]);

        $candidate = new Candidate($validated);
        $candidate->save();

        return response()->json([
            'message' => 'Candidate added successfully',
            'candidate' => $candidate
        ]);
    }
}
