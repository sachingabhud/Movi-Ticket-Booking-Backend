<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
class BookingController extends Controller
{
    //
    function addbooking(Request $req){
        $booking = new Booking();
        $booking->user_id = $req->input('user_id');
        $booking->show_id = $req->input('show_id');
        $booking->ticket_count = $req->input('ticket_count');
        $booking->save();
        return $req->input();
    }

    function get_booking_details(Request $req){
        $booking = DB::table('bookings')
                    ->select('users.name','shows.show_name','bookings.ticket_count')
                    ->leftJoin('users','users.id','bookings.user_id')
                    ->leftJoin('shows','shows.id','bookings.show_id')
                    ->get();
        return $booking;            

    }

}
