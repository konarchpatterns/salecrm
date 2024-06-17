<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityLogs extends Controller
{
    public function index(){
        return view('activity-logs');
    }
}
