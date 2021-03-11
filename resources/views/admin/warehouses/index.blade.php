@extends('admin.layout')

@section('main')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif


@if($errors->any())

    <h4>Please check:</h4>

    @foreach($errors as $error)

        <li>{{$error}}</li>

    @endforeach

    <hr>

@endif

<section class="col-sm-12">

    <h2 class="page-title text-center">Warehouse List</h2>

</section>

<section class="col-md-12">


    <form action="{{action('WarehouseController@search')}}" class="form form-inline" method="post">
        @csrf
        <div class="form-group">
            {{-- {!! Form::label('name', 'Name: ') !!} --}}
            <label for="name">Search: </label>
            {{-- {!! Form::text('name', old('name') , ['class'=>'form-control']) !!} --}}
            <input type="text" name="name" value="{{ @$search }}" class="form-control">

        {{-- {!! Form::submit('search', ['class'=>'btn btn-info']) !!} --}}
        <input type="submit" value="search" class="btn btn-info">
    </form>


    <hr>
</section>


<table class="table">
    <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Area Name</th>
            <th>Hub Name</th>
            <th>Capacity</th>
            <th>Incharge Name</th>
            <th>Incharge Phone</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($warehouses as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ @$item->area->name }}</td>
                <td>{{ $item->hub->name }}</td>
                <td>{{ $item->capacity }}</td>
                <td>{{ $item->incharge_name }}</td>
                <td>{{ $item->incharge_phone }}</td>
                <td class="text-center">
                    <a href="{{ route('warehouse.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a> |
                    <a onclick="return confirm('Are you sure?')" href="{{ url('admin/warehouse/destroy',$item->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>

@stop
