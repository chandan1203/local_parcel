<?php

namespace App\Http\Controllers;

use App\Hub;
use Illuminate\Http\Request;
use App\Repositories\HubRepository;

class HubController extends Controller
{
    private $hub;

    public function __construct(HubRepository $hub)
    {
        $this->hub = $hub;
    }

    public function index()
    {
        return $this->hub->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->hub->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'area_id' => '',
            'incharge_name' => 'required',
            'incharge_phone' => 'required',
            'status' => ''
        ]);

        return $this->hub->save($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function show(Hub $hub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->hub->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'area_id' => '',
            'incharge_name' => 'required',
            'incharge_phone' => 'required',
            'status' => ''
        ]);
        
        return $this->hub->update($id, $request->all());
    }

    public function search(Request $request)
    {
        return $this->hub->find($request->all());
    }
    public function destroy($id)
    {
        return $this->hub->delete($id);
    }
}
