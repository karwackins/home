<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Friend;

use App\Home\Interfaces\FrontendRepositoryInterface;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EventsController extends Controller
{
    public function __construct(FrontendRepositoryInterface $repository)
    {
        $this->fR = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_content' => 'required|min:5',
        ],[
            'required' => 'Musisz coś wpisać',
            'min' => 'Wpis musi zawierać co najmniej :min znaków',
        ]);

        Event::create([
            'user_id' => Auth::id(),
            'title' => $request->event_title,
            'content' => $request->event_content,
            'file' => $request->file,
            'budget' => $request->budget,
            'data_event' => $request->data_event,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = $this->fR->getEventForShow($id);
        return view('events.show', compact('event'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Event::where('id',$id)->update([
            'content' => $request->event_content,
        ]);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::where('id',$id)->delete();
        return back();
    }

    static function calender()
    {
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $eventsColorD = [
                    'color' => '#f05050',
                    'url' => 'events/'.$value->id,
                ];
                $eventsColorP = [
                    'color' => '#f04040',
                    'url' => 'public/events/'.$value->id,
                ];
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    Auth::id()==1?$eventsColorD:$eventsColorP
                );
            }
        }
        return $calendar = Calendar::addEvents($events);
//        return view('fullcalender', compact('calendar'));
    }
}
