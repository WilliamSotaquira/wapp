<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Json;

class apiTransactionsController extends Controller
{
    public function create(Request $request)
    {

        try {

            // $request = json_decode($request->getContent());

            $item = new Item();

            $item->name = $request->name;
            $item->tax = $request->tax;
            $item->price = $request->price;
            $item->previous_price = $request->previous_price;
            $item->measure = $request->measure;
            $item->by_fraction = $request->by_fraction;
            $item->efficiency = $request->efficiency;
            $item->maslow_value = $request->maslow_value;
            $item->save();

            session()->flash('flash.banner', 'Item created successfully!');
            session()->flash('flash.bannerStyle', 'success');

            return response()->json([
                'message' => 'Item created successfully!',
                'status' => 'success',
                'item' => $item,
            ], 200);
        } catch (Exception $e) {
            return $e;
        }

        // return $request;
        // return redirect()->route('admin.items.index');
    }

    public function select(Request $request)
    {
        $search = $request->search ?? '';

        $items = Item::select('id', 'name as text', 'price')->where('name', 'LIKE', '%' . $search . '%')
            ->get();


        // return $term;
        return $items;
    }

    public function get(Request $request)
    {
        $id = $request->id;
        $item = Item::where('id', $id)->first();
        return $item;
    }

    public function enList(Request $request)
    {

        $desde = $request->desde;
        $hasta = $request->hasta;

        if ($desde == null || $desde == '' || $desde == 'undefined' || $hasta == null || $hasta == '' || $hasta == 'undefined') {
            $data = DB::table('transactions')
                ->where('status', '!=', 2)
                ->orderBy('transaction_date', 'desc')
                ->get();
        } else {
            $data = DB::table('transactions')
                ->whereBetween('transaction_date', [$desde, $hasta])
                ->where('status', '!=', 2)
                ->orderBy('transaction_date', 'desc')
                ->get();
        }

        return $data;
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $transaction = Transaction::findOrFail($id);
        $transaction->status = 2;
        $transaction->update();

        return response()->json([
            'message' => 'Transaction deleted successfully!',
            'status' => 'success',
            'transaction' => $transaction,
        ], 200);
    }

}
