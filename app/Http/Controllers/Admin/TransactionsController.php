<?php

namespace App\Http\Controllers\Admin;

use App\Events\BudgetUpdate;
use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Item;
use App\Models\Operation;
use App\Models\Transaction;
use Egulias\EmailValidator\Parser\Comment;
use Exception;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions  = Transaction::all()->sortByDesc('id');

        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        $categories = Category::all();
        $budgets = Budget::all();

        return view('admin.transactions.create', compact('items', 'categories', 'budgets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $cuotas = $request->get('payment_installments');
        $idbudget = (int)$request->get('budgets_id');
        $total = (int)$request->get('grand');
        $cont = 1;

        $budget = Budget::where('id', $idbudget)->first();
        $value = $budget->value;
        $userId = Auth::id();

        if ($value > $total) {

            if ($cuotas == null || $cuotas == 0) {
                $cuotas = 1;
            }


            while ($cont <= $cuotas) {

                try {

                    DB::beginTransaction();

                    $transaction = new Transaction();
                    $transaction->details = $request->get('details');
                    $transaction->payment = $request->get('payment');
                    $transaction->grand = $total;
                    $transaction->status = $request->get('status');
                    $transaction->type = $request->get('type');
                    $transaction->transaction_date = $request->get('transaction_date');
                    $transaction->payment_installments = $cont;
                    $transaction->payment_number = $request->get('payment_number');
                    $transaction->autorization_number = $request->get('autorization_number');
                    $transaction->agreed_rate = $request->get('agreed_rate');
                    $transaction->billed_EA = $request->get('billed_EA');
                    $transaction->category_id  = (int)$request->get('categories_id');
                    $transaction->budget_id  = $idbudget;
                    $transaction->users_id = (int)$userId;
                    $transaction->save();

                    $qty = $request->get('qty');
                    $subtotal = $request->get('subtotal');
                    $tax_subtotal = $request->get('tax_subtotal');
                    $item_id = $request->get('items_id');

                    // return $transaction;

                    $i = 0;
                    while ($i < count($item_id)) {
                        $operation  = new Operation();
                        $operation->transaction_id  = $transaction->id;
                        $operation->qty = $qty[$i];
                        $operation->subtotal = $subtotal[$i];
                        $operation->tax_subtotal = $tax_subtotal[$i];
                        $operation->item_id = $item_id[$i];
                        $operation->save();
                        $i++;

                        // return $operation;
                    }

                    DB::commit();


                    $value = $value - $total;
                    $budget->value = $value;
                    $budget->update();
                    // BudgetUpdate::dispatch($transaction);

                } catch (Exception $e) {

                    DB::rollback();

                    return $e;
                }

                $cont++;
            }

            session()->flash('flash.banner', 'Transaction created successfully!');
            session()->flash('flash.bannerStyle', 'success');
            return redirect()->route('admin.transactions.index');
        }


        session()->flash('flash.banner', 'Error, the transaction exceeds the amount!Enter the values again');
        session()->flash('flash.bannerStyle', 'error');
        return redirect()->route('admin.transactions.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
