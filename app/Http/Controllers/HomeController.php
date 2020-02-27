<?php

namespace App\Http\Controllers;

use App\Event;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();
        // $events = $user->events()->paginate(10); // niewydajne rozwiązanie
        $eventsHot = Event::with('comments.user')
            ->orderBy('created_at', 'desc')->paginate(5); // eager loading (optymalizacja zapytań do bazy)
        $events = Event::with('comments.user')
            ->orderBy('created_at', 'desc')->paginate(10); // eager loading (optymalizacja zapytań do bazy)
//        $events_2 = Event::whereBetween ('data_event', [date('Y-m-d H:i:s'), date('Y-m-d H:i:s',strtotime("+5 day"))])->orderBy('created_at', 'desc')->get();
        $tasks = Task::where ('date_task', '<=', date('Y-m-d H:i:s'))->where('status','=',0)->orderBy('priority', 'desc')->get();
        $tasksDone = Task::where ('updated_at', 'like', date('Y-m-d').'%')->where('status','=',1)->get();
        return view('home', compact('user', 'posts', 'events','eventsHot', 'tasks', 'tasksDone'));
    }
}
