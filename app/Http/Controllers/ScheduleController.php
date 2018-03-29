<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function create(){
    	return view('schedule.create');
    }

    public function store(Request $request){

    }
}
