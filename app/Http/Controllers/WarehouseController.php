<?php

namespace App\Http\Controllers;

use App\Hub;
use App\Area;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\WarehouseRepository;
use App\User;

class WarehouseController extends Controller
{

    private $warehouse;

    public function __construct(WarehouseRepository $warehouse)
    {
        $this->warehouse = $warehouse;
    }
    public function index()
    {
        return view('admin.dashboards.dev');
    }

    public function scanner()
    {
        return view('warehouse.scanner');
    }

    public function all()
    {
        return $this->warehouse->all();
    }

    public function create(Request $r)
    {
        $users = User::where('role',3)->get();
        if($r->has('area_id'))
        {
             return Hub::where('area_id', $r->input('area_id'))->where('status', 1)->get();
        }
        if($r->has('phone'))
        {
            return User::where('phone', $r->input('phone'))->get();
        }
        $areas = Area::where('status', 1)->orderBy('name','asc')->get();

        return view('admin.warehouses.create',compact('areas','users'));
    }

    public function store(Request $request)
    {
        return $this->warehouse->store($request->all());

    }

    public function edit($id)
    {
        return $this->warehouse->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->warehouse->update($id, $request->all());
    }

    public function search(Request $request)
    {
        return $this->warehouse->search($request->all());
    }

    public function destroy($id)
    {
        return $this->warehouse->delete($id);
    }

    public function lotPrint()
    {
        return view('warehouse.lot-print');
    }
    public function lotReporting()
    {
        return view('warehouse.lot-reporting');
    }
}
