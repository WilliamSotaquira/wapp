<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Item;
use App\Models\Operation;
use App\Models\Transaction;
use Exception;
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

        $userId = Auth::id();
        $cuotas = $request->get('payment_installments');
        $cont = 1;

        if ($cuotas == null || $cuotas == 0) {
            $cuotas = 1;
        }

        while ($cont <= $cuotas) {

            try {

                DB::beginTransaction();

                $transaction = new Transaction();
                $transaction->details = $request->get('details');
                $transaction->payment = $request->get('payment');
                $transaction->grand = $request->get('grand');
                $transaction->status = $request->get('status');
                $transaction->type = $request->get('type');
                $transaction->transaction_date = $request->get('transaction_date');
                $transaction->payment_installments = $cont;
                $transaction->payment_number = $request->get('payment_number');
                $transaction->autorization_number = $request->get('autorization_number');
                $transaction->agreed_rate = $request->get('agreed_rate');
                $transaction->billed_EA = $request->get('billed_EA');
                $transaction->category_id  = $request->get('categories_id');
                $transaction->budget_id  = $request->get('budgets_id');
                $transaction->users_id = $userId;
                $transaction->save();

                $qty = $request->get('qty');
                $subtotal = $request->get('subtotal');
                $tax_subtotal = $request->get('tax_subtotal');
                $item_id = $request->get('items_id');

                // return $qty;

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
                }

                DB::commit();
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
