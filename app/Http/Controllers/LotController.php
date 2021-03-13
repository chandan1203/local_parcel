<?php

namespace App\Http\Controllers;

use App\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lots = Lot::orderBy('id','desc')->paginate(10);
        return view('warehouse.lots.index',compact('lots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warehouse_id = Auth::user()->warehouse->id;
        return view('warehouse.lots.create',compact('warehouse_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lot::create($request->all());
        return redirect()->route('lot.index')->with('success','Lot created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function show(Lot $lot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function edit(Lot $lot)
    {
        return view('warehouse.lots.edit',compact('lot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lot $lot)
    {
        $lot->update($request->all());
        return redirect()->route('lot.index')->with('success','Lot Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lot::findOrFail($id)->delete();
        return redirect()->back()->with('success','Lot Deleted successfully');
    }
}
