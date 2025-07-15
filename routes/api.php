<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\LeaveRuleController;
use App\Http\Controllers\Api\VacationRequestController;

Route::apiResource('employees', EmployeeController::class);
Route::apiResource('leave-rules', LeaveRuleController::class);
Route::apiResource('vacation-requests', VacationRequestController::class);