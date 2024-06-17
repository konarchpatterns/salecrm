<?php

namespace App\Http\Controllers;

use App\Models\Booking;

use Illuminate\Http\Request;

class CalenderController extends Controller
{
    public function index()
    {
        $events = array();
        $bookings = Booking::all();
        foreach ($bookings as $booking) {
            $color = null;
            if ($booking->priority == 'high') {
                $color = '#FF0000';
            }
            if ($booking->priority == 'medium') {
                $color = '#0000FF';
            }
            if ($booking->priority == 'low') {
                $color = '#008000';
            }
            $events[] = [
                'id'   => $booking->id,
                'title' => $booking->title,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'color' => $color,
                'discription' => $booking->discription,
                'priority' => $booking->priority,
                'created_by' => $booking->created_by,
                'updated_by' => $booking->updated_by
            ];
        }
        return view('calendar.index', ['events' => $events]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'priority' => 'required|string',
            'discription' => 'required|string',
            'created_by' => 'required|string',
            'updated_by' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $booking = Booking::create([
            'title' => $request->title,
            'discription' => $request->discription,
            'priority' => $request->priority,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        $color = null;

        if ($booking->priority == 'high') {
            $color = '#FF0000';
        }
        if ($booking->priority == 'medium') {
            $color = '#0000FF';
        }
        if ($booking->priority == 'low') {
            $color = '#008000';
        }

        return response()->json([
            'id' => $booking->id,
            'start' => $booking->start_date,
            'end' => $booking->end_date,
            'title' => $booking->title,
            'color' => $color ? $color : '',
            'discription' => $booking->discription,
            'priority' =>  $booking->priority,
            'created_by' => $booking->created_by,
            'updated_by' => $booking->updated_by
        ]);
    }
    public function update(Request $request, $id)
    {

        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'updated_by' => $request->updated_by
        ]);
        return response()->json('Event updated');
    }
    public function destroy($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->delete();
        return $id;
    }
    public function show($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        return response()->json($booking);
    }
}
