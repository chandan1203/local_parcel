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
    <h2 class="page-title text-center">lot List</h2>

</section>
<section class="col-xs-12">

    {{-- {!! Form::open(['class'=>'form form-inline', 'method' =>'post', 'url'=> action('Permissions@searchIndex')]) !!} --}}
    <form action="{{action('LotController@search')}}" class="form form-inline" method="post">
        @csrf
        <div class="form-group">
            {{-- {!! Form::label('name', 'Name: ') !!} --}}
            <label for="name">Name: </label>
            {{-- {!! Form::text('name', old('name') , ['class'=>'form-control']) !!} --}}
            <input type="text" name="name" value="{{ @$search }}" class="form-control">
            {{-- <select name="status" id="" class="form-control">
                <option value="">Search Status</option>
                <option value="1">Active</option>
                <option value="0">Deactive</option>
            </select> --}}
        </div>

        {{-- {!! Form::submit('search', ['class'=>'btn btn-info']) !!} --}}
        <input type="submit" value="search" class="btn btn-info">
    </form>
    {{-- {!! Form::close() !!} --}}

    <hr>
</section>


<table class="table">
    <thead>
        <tr>
            <th>SL</th>
            <th>Lot Name</th>
            {{-- <th>Warehouse Name</th> --}}
            <th>Capacity</th>
            <th>Prefix</th>
            <th>QR Code</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lots as $key => $lot)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $lot->lot_name }}</td>
            {{-- <td>{{ $lot->warehouse_id }}</td> --}}
            <td>{{ $lot->capacity }}</td>

            <td>{{ $lot->prefix }}</td>
            <td>{{ $lot->qr_code_generate }}</td>
            <td class="text-center">
                <a href="{{ route('lot.edit',$lot->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a> |
                <a onclick="return confirm('Are you sure?')" href="{{ url('lot/delete',$lot->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>
{{ $lots->links() }}

@stop
