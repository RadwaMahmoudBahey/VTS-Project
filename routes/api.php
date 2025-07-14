<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\LeaveRuleController;
use App\Http\Controllers\Api\VacationRequestController;
Route::get("/", function () {
    return view("welcome");
});