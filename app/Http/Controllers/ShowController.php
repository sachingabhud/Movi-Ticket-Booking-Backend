<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use Illuminate\Support\Facades\DB;
class ShowController extends Controller
{
    //
    function addshow(Request $req){
        $show = new Show();
        $show->show_name = $req->input('show_name');
        $show->type = $req->input('type');
        $show->available_ticket = $req->input('available_ticket');
        $show->date = $req->input('date');
        $show->save();
        return $req->input();
    }

    function get_show_details(Request $req){
        return Show::all();
    }

    function get_show_statistics(Request $req){
        $stats = DB::table('bookings')
        ->select('shows.type type','sum(bookings.ticket_count) total_booked')
        ->leftJoin('shows','shows.id','bookings.show_id')
        ->groupby('shows.type')
        ->get();
        return $stats;         
    }
}
