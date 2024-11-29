<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $notifications = $user->unreadNotifications;
        
        return response()->json(['notifications' => $notifications]);
    }

    public function markNotificationAsRead($id)
    {
        // Get the authenticated user
        $user = Auth::user();
        
        // Find the notification by ID
        $notification = $user->notifications()->findorfail($id);
        $type = $notification->type;
        // Mark the notification as read
        $notifications = $user->notifications()->where('type', $type)->get();

        // Mark each notification as read and delete it
        foreach ($notifications as $notification) {
            $notification->markAsRead();
            $notification->delete();
        }
    
    
    }
}
