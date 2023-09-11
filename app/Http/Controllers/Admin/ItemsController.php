<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::orderBy('name')->paginate(10);
        return view('admin.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return $request;

        // $item = new Item();

        // $item->name = $request->name;
        // $item->tax = $request->tax;
        // $item->price = $request->price;
        // $item->previous_price = $request->previous_price;
        // $item->measure = $request->measure;
        // $item->by_fraction = $request->by_fraction;
        // $item->efficiency = $request->efficiency;
        // $item->maslow_value = $request->maslow_value;
        // $item->save();

        // session()->flash('flash.banner', 'Item created successfully!');
        // session()->flash('flash.bannerStyle', 'success');

        // return redirect()->route('admin.items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
            return $request->all();

            $item->update($request->all());

            session()->flash('flash.banner', 'Items updated successfully!');
            session()->flash('flash.bannerStyle', 'success');

            return redirect()->route('admin.items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {

        $item->delete();

        session()->flash('flash.banner', 'Item deleted successfully!');
        session()->flash('flash.bannerStyle', 'danger');
        return redirect()->route('admin.items.index');

    }
}
