<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class IndexCallendar extends Controller
{
    public function index(){
        return view('calendar.index-calendar');
    }
    public function viewEvents(){
        return view('calendar.view-events');
    }
    public function editEvents(Request $request){
        $eventDetails = Booking::select('id', 'title', 'discription', 'priority', 'company_id', 'client_id', 'start_date', 'end_date')
        ->where('id', '=', $request->id)->get();
        return view('calendar.edit-events', compact('eventDetails'));
    }
}
