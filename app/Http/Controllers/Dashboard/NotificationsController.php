<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    use Notifiable;
    public function readAll()
    {
        try{
             $user =Student::find(auth()->user()->id);
            $user->unreadNotifications()->update(['read_at' => now()]);    
            return response()->json([
                'success' => 'done'
            ])  ;     
        }catch(Exception $e)
        {
            return response()->json([
                'error' =>$e->getMessage()
            ])  ;  
        }

    }

    public function showAll()
    {
        $user =Student::find(auth()->user()->id);

        return view('dashboard.pages.notifications',['notifications'=>$user->notifications]);
    }
}
