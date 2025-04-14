<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $notifications = $user->notifications()->orderBy('created_at', 'desc')->get();

        Notification::where('user_id', $user->id)->update(['is_read' => true]);

        return view('instructor.notif', compact('notifications'));
    }
}
