<?php

use App\Http\Controllers\ParticipantController;
use App\Models\Participant;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("participant")->name("participant")->group(function(){
    Route::get("/register", [ParticipantController::class, "register"])->name(".register");
});