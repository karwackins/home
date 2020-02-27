<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Friend;
use Illuminate\Http\Request;
use App\User;
use App\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('user_permission',['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = User::findOrFail($id);
        // $events = $user->events()->paginate(10); // niewydajne rozwiązanie
//        $events = Event::with('comments.user')
//            ->where('user_id', $id)->orderBy('created_at', 'desc')->paginate(10); // eager loading (optymalizacja zapytań do bazy)
        $events = Event::whereBetween ('data_event', [date('Y-m-d H:i:s'), date('Y-m-d H:i:s',strtotime("+5 day"))])->orderBy('created_at', 'desc')->get();
        return view('users.show', compact('user', 'events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
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

        $request->validate([
           'name' => 'required|min:3',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],

        ],[
            'required' => 'Pole jest wymagane',
            'unique' => 'Inny użytkownik ma już taki adres e-mail',
        ]);


        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sex = $request->sex;

        if($request->file('avatar'))
        {
            $upload_path = 'public/users/' .$id. '/avatars';
            $path = $request->file('avatar')->store($upload_path);
            $avatar_filename = str_replace($upload_path.'/','',$path);
            $user->avatar = $avatar_filename;
        }
        $user->save();


        return back();
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
