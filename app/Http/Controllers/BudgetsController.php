<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Http\Controllers\ConstExpenses;
use App\Home\Interfaces\FrontendRepositoryInterface;
use App\Home\Repositories\FrontendRepository;
use Illuminate\Http\Request;
use JsonSerializable;
use Illuminate\Support\Facades\Session;

class BudgetsController extends Controller
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
        $month = date("m");
        $expenses = $this->fR->getConstExpense($month);

        return view('budgets.index', compact('month', 'expenses'));
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
        if(isset($request->nameC))
        {
            foreach ($request->nameC as $item => $v)
            {
                $expenseC[] = array(
                    'name' => $request->nameC[$item],
                    'mounth' => date("m"),
                    'year' => date("y"),
                    'amount' => $request->amountC[$item],
                );
            }
            $this->fR->setConstExpense($expenseC);
        }

        if(isset($request->nameP))
        {
            foreach ($request->nameP as $item => $v)
            {
                $expenseP[] = array(
                    'name' => $request->nameP[$item],
                    'mounth' => date("m"),
                    'year' => date("y"),
                    'amount' => $request->amountP[$item],
                );
            }
            $this->fR->setPlanExpense($expenseP);
        }

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

        return view('budgets.index', compact('month', 'expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $this->fR->setConstExpenseForUpdate($request, $id);
        return redirect()->route('budget.index');
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
