<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TimeEntryController;

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
Route::post('/mark-rest',[TimeEntryController::class,'markRest'])->name('mark.rest');
Route::post('/mark_rest', [TimeEntryController::class,'markRestForProjectUsers'])->name('markRest');
Route::post('/mark_rest/date', [TimeEntryController::class,'markRestForProjectUsersForDate'])->name('markRest');
Route::get('/attendance_by_date/user', [TimeEntryController::class,'getTimeEntriesByDate'])->name('attendance.date');
Route::post('/attendance_by_date/user', [TimeEntryController::class,'addTimeEntriesByDate'])->name('attendance.date.add');
Route::post('/attendance/bulkdelete',[TimeEntryController::class,'bulkDestroy']);



});
Route::middleware('auth:sanctum')->post('clock-in', [TimeEntryController::class, 'clockIn']);
Route::middleware('auth:sanctum')->post('clock-out', [TimeEntryController::class, 'clockOut']);