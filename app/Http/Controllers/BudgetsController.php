<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Home\Interfaces\FrontendRepositoryInterface;
use App\Home\Repositories\FrontendRepository;
use Illuminate\Http\Request;
use JsonSerializable;

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

        foreach ($this->fR->getExpense($month) as $expenses)
        {
            $expenses = json_decode($expenses->expense);
        }
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
        $expense = [];
        foreach($request->name as $nkey => $n)
        {
            foreach ($request->expense as $ekey => $e)
            {
                if($nkey == $ekey)
                {
                    $expense[] = array(
                        'name' => $n,
                        'expense' => $e,
                        'status' => 0
                    );
                }
            }
        }

        $budget = Budget::create([
                'mounth' => date('m'),
                'year' => date('Y'),
                'expense' => json_encode($expense),
        ]);
        $budget->save();

//        return back();
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

        dd($request);
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
