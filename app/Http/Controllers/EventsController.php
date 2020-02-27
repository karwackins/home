<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Friend;
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
        $user = User::findOrFail(Auth::id());

        $events= Event::with('comments')->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('users.show', compact('user','events'));
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
            'content' => $request->event_content,
            'file' => $request->file,
            'budget' => $request->budget,
            'data_event' => $request->data_event,
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
}
