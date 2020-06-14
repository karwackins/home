<?php
namespace App\Home\Repositories;

    use App\Budget;
    use App\Event;
    use App\Home\Interfaces\FrontendRepositoryInterface;
    use App\Task;
    use App\ConstExpense;
    use App\PlanExpense;

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

        public function getConstExpense($id)
        {
            return ConstExpense::where('mounth','=',$id)->get();
        }

        public function setConstExpense($expence)
        {
            foreach ($expence as $exp) {
                $e = ConstExpense::create($exp);
                $e->save();
            }
        }

        public function setConstExpenseForUpdate($expence, $id)
        {
            $expence->status=='Tak'?$status=0:$status=1;

            ConstExpense::where('id',$id)->update([
                'name' => $expence->name,
                'amount' => $expence->amount,
                'status' => $status
            ]);

        }

        public function setPlanExpense($expence)
        {
            foreach ($expence as $exp) {
                $e = PlanExpense::create($exp);
                $e->save();
            }
        }
    }
