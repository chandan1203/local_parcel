<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use App\Repositories\AreaRepository;

class AreaController extends Controller
{
    private $area;

    public function __construct(AreaRepository $area)
    {
        $this->area = $area;
    }

    public function index()
    {
        return $this->area->all();
    }

    public function create()
    {
        return view('admin.areas.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'level_color' => '',
            'generate_level' => '',
            'generate_level' => '',
            'status' => ''
        ]);

        return $this->area->store($request->all());
    }

    public function show(Area $area)
    {

    }


    public function edit(Area $area)
    {
        return view('admin.areas.edit',compact('area'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'level_color' => '',
            'generate_level' => '',
            'generate_level' => '',
            'status' => ''
        ]);
        
        return $this->area->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->area->delete($id);
    }

    public function search(Request $request)
    {
        return $this->area->find($request->all());
    }
}
