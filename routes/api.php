<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegistrationController;
use App\Http\Controllers\Api\Barangays\GetBarangaysController;
use App\Http\Controllers\Api\Candidates\AddCandidatesController;
use App\Http\Controllers\Api\Candidates\DeleteCandidatesController;
use App\Http\Controllers\Api\Candidates\GetCandidatesController;
use App\Http\Controllers\Api\Candidates\UpdateCandidatesController;
use App\Http\Controllers\Api\Votes\DeleteVotesController;
use App\Http\Controllers\Api\Votes\GetVotesController;
use App\Http\Controllers\Api\Votes\PostVotesController;
use App\Http\Middleware\HasVotedMiddleware;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [RegistrationController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/barangays', [GetBarangaysController::class, 'getBarangays']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [LogoutController::class, 'logout']);

    Route::post('vote', [PostVotesController::class, 'vote'])->middleware(HasVotedMiddleware::class);
    Route::get('vote', [GetVotesController::class, 'getVote']);
    Route::delete('vote', [DeleteVotesController::class, 'deleteVote']);

    Route::group([], function () {
        Route::get('admin/candidates', [GetCandidatesController::class, 'getCandidates']);
        Route::post('admin/candidates', [AddCandidatesController::class, 'addCandidates']);
        Route::put('admin/candidates/{candidate}', [UpdateCandidatesController::class, 'updateCandidate']);
        Route::delete('admin/candidates/{candidate}', [DeleteCandidatesController::class, 'deleteCandidate']);
    })->middleware(IsAdminMiddleware::class);
});
