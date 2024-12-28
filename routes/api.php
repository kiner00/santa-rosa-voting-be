<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegistrationController;
use App\Http\Controllers\Api\Candidates\AddCandidatesController;
use App\Http\Controllers\Api\Candidates\DeleteCandidatesController;
use App\Http\Controllers\Api\Candidates\GetCandidatesController;
use App\Http\Controllers\Api\Candidates\UpdateCandidatesController;
use App\Http\Controllers\Api\Votes\GetVotesController;
use App\Http\Controllers\Api\Votes\PostVotesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [RegistrationController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [LogoutController::class, 'logout']);

    Route::post('vote/vote', [PostVotesController::class, 'vote']);
    Route::get('vote/vote', [GetVotesController::class, 'getVote']);

    Route::get('admin/candidates', [GetCandidatesController::class, 'getCandidates']);
    Route::post('admin/candidates', [AddCandidatesController::class, 'addCandidates']);
    Route::put('admin/candidates/{candidate}', [UpdateCandidatesController::class, 'updateCandidate']);
    Route::delete('admin/candidates/{candidate}', [DeleteCandidatesController::class, 'deleteCandidate']);
});
