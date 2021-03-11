<?php

namespace App\Repositories;

use App\Area;
use App\Hub;

//use Your Model

/**
 * Class HubRepository.
 */
class HubRepository
{
    public function all()
    {
        $hubs = Hub::orderBy('id','desc')
        ->paginate(10);

        return view('admin.hubs.index',compact('hubs'));
    }

    public function create()
    {
        $areas = Area::where('status', 1)->orderBy('name','asc')->get();
        return view('admin.hubs.create',compact('areas'));
    }

    public function save(array $data)
    {
        Hub::create($data);
        return redirect()->route('hub.index')->with('success','Hub Added successfully');
    }

    public function edit($id)
    {
        $areas = Area::orderBy('name','asc')->get();
        $hub = Hub::find($id);
        return view('admin.hubs.edit',compact('hub','areas'));
    }

    public function update($id, array $data)
    {
        Hub::find($id)->update($data);
        return redirect()->route('hub.index')->with('success','Hub updated successfully');
    }

    public function find(array $data)
    {
        $search = $data['name'];
        $status = $data['status'];
        if($search != ''){
        $hubs = Hub::where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('incharge_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('incharge_phone', 'LIKE', '%'.$search.'%')
                        ->orderBy('id','desc')
                        ->paginate(10);
        }
        elseif($status != '')
        {
            $hubs = Hub::where('status', $status)
                        ->orderBy('id','desc')
                        ->paginate(10);
        }else{
            $hubs = Hub::orderBy('id','desc')
            ->paginate(10);
        }
        return view('admin.hubs.index',compact('hubs','search'));
    }

    public function delete($id)
    {
        Hub::find($id)->delete();
        return redirect()->back()->with('success','Hub deleted successfully');
    }
}
