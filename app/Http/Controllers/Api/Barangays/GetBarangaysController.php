<?php

namespace App\Http\Controllers\Api\Barangays;

use App\Http\Controllers\Controller;
use App\Models\Barangay;
use Illuminate\Http\Request;

class GetBarangaysController extends Controller
{
    public function getBarangays(Request $request)
    {
        $barangays = Barangay::select('id', 'name')->paginate(20);
        return response()->json([
            $barangays
        ]);
    }
}
