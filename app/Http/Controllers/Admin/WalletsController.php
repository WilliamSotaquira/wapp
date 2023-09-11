<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WalletRequest;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = Wallet::where('user_id', auth()->id())->orderBy('value','desc')->get();

        return view('admin.wallets.index', compact('wallets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wallets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WalletRequest $request)
    {
        $wallet = new Wallet();
        $wallet->name = $request->name;
        $wallet->description = $request->description;
        $wallet->value = $request->value;
        $wallet->user_id = auth()->id();
        $wallet->save();

        session()->flash('flash.banner', 'Wallets created successfully!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('admin.wallets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(wallet $wallet)
    {
        return view('admin.wallets.show', compact('wallet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallet $wallet)
    {
        // return $wallet->all();
        return view('admin.wallets.edit', compact('wallet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(WalletRequest $request, Wallet $wallet)
    {
        $wallet->update($request->all());

        session()->flash('flash.banner', 'Wallets updated successfully!');
        session()->flash('flash.bannerStyle', 'success');


        return redirect()->route('admin.wallets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {

        $wallet->delete();


        session()->flash('flash.banner', 'Wallets deleted successfully!');
        session()->flash('flash.bannerStyle', 'danger');

        return redirect()->route('admin.wallets.index');
    }
}
