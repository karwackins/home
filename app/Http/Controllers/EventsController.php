<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Friend;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EventsController extends Controller
{

    public function __construct()
    {
//        $this->middleware('post_permission',['except' => ['show', 'store']]);
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
        $event = Event::with('comments')->findOrFail($id)->orderBy('created_at', 'desc')->paginate(10);
        dd($event);
//        $comments = Comment::where('post_id', $id)->get();
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
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                        'url' => 'pass here url and any route',
                    ]
                );
            }
        }
        return $calendar = Calendar::addEvents($events);
//        return view('fullcalender', compact('calendar'));
    }
}
