<?php
namespace App\Home\Repositories;

    use App\Event;
    use App\Home\Interfaces\FrontendRepositoryInterface;
    use App\Task;

    class FrontendRepository implements FrontendRepositoryInterface{
        public function getEventsForMainPage()
        {
            return Event::with('comments.user')
            ->orderBy('created_at', 'desc')->paginate(10);;
        }

        public function getEventForShow($id)
        {
            return Event::findOrFail($id);
        }

        public function getTasksForMainPage()
        {
            return Task::where ('date_task', '<=', date('Y-m-d H:i:s'))->where('status','=',0)->orderBy('priority', 'desc')->get();
        }

        public function getDoneTasksForMainPage()
        {
            return  Task::where ('updated_at', 'like', date('Y-m-d').'%')->where('status','=',1)->get();
        }
    }
