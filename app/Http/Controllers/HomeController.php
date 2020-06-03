<?php

namespace App\Http\Controllers;


use App\Event;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Home\Interfaces\FrontendRepositoryInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FrontendRepositoryInterface $repository)
    {
        $this->fR = $repository;
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
        $events = $this->fR->getEventsForMainPage();
        $tasks = $this->fR->getTasksForMainPage();
        $tasksDone = $this->fR->getDoneTasksForMainPage();

        $calendar = EventsController::calender();

        return view('home', compact('user', 'posts', 'events','eventsHot', 'tasks', 'tasksDone', 'calendar'));
    }
}
