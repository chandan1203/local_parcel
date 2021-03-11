<?php

namespace App\Repositories;

use App\Hub;
use App\Area;
use App\Warehouse;
use Illuminate\Foundation\Auth\User;


class WarehouseRepository
{

    public function model()
    {
        //return YourModel::class;
    }

    public function all()
    {
        $warehouses = Warehouse::orderBy('id','desc')->get();
        return view('admin.warehouses.index', compact('warehouses'));
    }

    public function store(array $data)
    {
        // dd($data);
        Warehouse::create($data);
        return redirect()->route('warehouse.index')->with('success','Warehouse added successfully');
    }

    public function edit($id)
    {
        $users = User::where('role',3)->get();
        $warehouse = Warehouse::findOrFail($id);
        $areas = Area::all();
        return view('admin.warehouses.edit', compact('warehouse','areas','users'));
    }

    public function update($id, array $data)
    {
        Warehouse::findOrFail($id)->update($data);
        return redirect()->route('warehouse.index')->with('success','Warehouse added successfully');
    }

    public function delete($id)
    {
        Warehouse::findOrFail($id)->delete();
        return redirect()->back()->with('Warehouse Deleted Successfully');
    }

    public function search(array $data)
    {
        $search = $data['name'];
        if($search != ''){
        $warehouses = Warehouse::where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('incharge_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('incharge_phone', 'LIKE', '%'.$search.'%')
                        ->orderBy('id','desc')
                        ->paginate(10);
        }else{
            $warehouses = Warehouse::orderBy('id','desc')
            ->paginate(10);
        }
        return view('admin.warehouses.index',compact('warehouses','search'));
    }

}
