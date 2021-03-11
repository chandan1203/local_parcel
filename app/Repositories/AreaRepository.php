<?php

namespace App\Repositories;
use App\Area;

class AreaRepository
{
    public function all()
    {
        $areas = Area::orderBy('id','desc')->paginate(10);

        return view('admin.areas.index',compact('areas'));
    }

    public function store(array $data)
    {

        Area::create($data);
        return redirect()->route('area.index')->with('success','Area added successfully');
    }
    public function update($id, array $data)
    {
        // dd($data);
        Area::find($id)->update($data);
        return redirect()->route('area.index')->with('success','Area updated successfully');
    }
    public function delete($id)
    {
        Area::findOrFail($id)->delete();
        return redirect()->back()->with('success','Area deleted successfully');
    }

    public function find(array $data)
    {
        $search = $data['name'];
        $status = $data['status'];

        if($search != ''){
        $areas = Area::where('name', 'LIKE', '%'.$search.'%')
                        ->orderBy('id','desc')
                        ->paginate(10);
        }
        elseif($status != '')
        {
            $areas = Area::where('status', $status)
                        ->orderBy('id','desc')
                        ->paginate(10);
        }else{
            $areas = Area::orderBy('id','desc')
            ->paginate(10);
        }
        return view('admin.areas.index',compact('areas','search'));
    }

}
