<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Test;
use App\Events\Notification;
use Pusher;

class TestController extends Controller
{
    public function index()
    {
    	return view('test1');
    }
}
