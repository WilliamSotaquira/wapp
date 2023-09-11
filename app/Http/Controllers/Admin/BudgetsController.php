<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BudgetRequets;
use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $budgets = $user->budgets->sortByDesc('start_date');

        // return ($budgets);

        return view('admin.budgets.index', compact('budgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $wallets = $user->wallets;

        return view('admin.budgets.create', compact('wallets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BudgetRequets $request)
    {
        $budget = new Budget();
        $budget->name = $request->name;
        $budget->purpose = $request->purpose;
        $budget->quantity = $request->quantity;
        $budget->repetition = $request->repetition;
        $budget->wallet_id = $request->wallet_id;
        $budget->start_date = $request->start_date;
        $budget->due_date = $request->due_date;
        $budget->save();

        session()->flash('flash.banner', 'Budget created successfully!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('admin.budgets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {
        $user = Auth::user();
        $wallets = $user->wallets;
        // return $wallets;
        return view('admin.budgets.edit', compact(['budget', 'wallets']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budget $budget)
    {
        $budget->update($request->all());

        session()->flash('flash.banner', 'Budget updated successfully!');
        session()->flash('flash.bannerStyle', 'success');


        return redirect()->route('admin.budgets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget)
    {

        $budget->delete();


        session()->flash('flash.banner', 'Budget deleted successfully!');
        session()->flash('flash.bannerStyle', 'danger');

        return redirect()->route('admin.budgets.index');
    }


    public function enlistarMes(Request $request){

        return $request;
    }
}
