<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AreaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = $request->user()->load('reportingManagers');
    return response()->json($user);
});

Route::get('/notifications', [NotificationController::class, 'index']);
Route::get('/notifications/markAsRead/{id}', [NotificationController::class, 'markNotificationAsRead']);
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified', 'role:admin,project admin'])->group(function () {
Route::get('/area/user/{id}', [AreaController::class, 'getUser'])->name('area.user');
});