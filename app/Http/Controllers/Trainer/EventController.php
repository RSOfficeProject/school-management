<?php

namespace App\Http\Controllers\trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
     public function event_list()
    {
        $event=Event::all();
        return view('trainer.event.event_list',compact('event'));
    }

    public function eventView($id)
    {
        $event=Event::find($id);
       
        return view('trainer.event.view_event',compact('event'));
    }
}
