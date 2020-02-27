<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $friends = $user->friends();

        $id_mine_friends = [];
        foreach ($friends as $friend)
        {
            $id_mine_friends[] = $friend->id;
        }
        $id_mine_friends[] = $user->id;

        $posts= Event::with('comments')->whereIn('user_id', $id_mine_friends)->orderBy('created_at', 'desc')->paginate(10);
        $events = Event::whereBetween ('data_event', [date('Y-m-d H:i:s'), date('Y-m-d H:i:s',strtotime("+5 day"))])->orderBy('created_at', 'desc')->get();


        return view('users.show', compact('user','posts', 'events'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
