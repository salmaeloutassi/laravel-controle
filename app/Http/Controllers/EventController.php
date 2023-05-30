<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function createEventPage(){
        return view('events.create_event');
    }
    public function createEvent(Request $request){
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'start_date'=>'required',
            'end_date'=>'required',
            'price'=>'required',
        ]);

        $eve = new Event();
        $eve->title = $request->title;
        $eve->description = $request->description;
        $eve->start_date = $request->start_date;
        $eve->end_date = $request->end_date;
        $eve->price=$request->price;
        $eve->save();    
        flashy()->success("Le produit a été crier avec succés");
        return redirect()-> route('eventList');
    }
    public function eventList(){
        $events = Event::all();
        return view('events.liste_events', compact('events'));

    }
    public function editEventPage($id){
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }
    public function update_event(Request $request, $id){
        // $request->validate([
        //     'title' => 'required|min:3',
        //     'description' => 'required|min:3',
        //     'start_date' => 'required',
        //     'end_date' => 'required' ,
        //     'price' => 'required',
        // ]);
        $event =Event::findOrFail($id);
        $event->title = $request->input('title'); 
        $event->description = $request->input('description');
        $event->start_date= $request->input('start_date');
        $event->end_date=$request->input('end_date');
        $event->price=$request->input('price');
        $event->save();
        return redirect()->route('eventList');
    }

    public function delete_event($id)
    {
        Event::destroy($id);
        flashy()->success("Le produit a été supprimé avec succès");
        return redirect()->route('eventList');
    }
}
