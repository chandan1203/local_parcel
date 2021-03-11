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
    <h2 class="page-title text-center">Area List</h2>

</section>
<section class="col-xs-12">

    {{-- {!! Form::open(['class'=>'form form-inline', 'method' =>'post', 'url'=> action('Permissions@searchIndex')]) !!} --}}
    <form action="{{action('AreaController@search')}}" class="form form-inline" method="post">
        @csrf
        <div class="form-group">
            {{-- {!! Form::label('name', 'Name: ') !!} --}}
            <label for="name">Name: </label>
            {{-- {!! Form::text('name', old('name') , ['class'=>'form-control']) !!} --}}
            <input type="text" name="name" value="{{ @$search }}" class="form-control">
            <select name="status" id="" class="form-control">
                <option value="">Search Status</option>
                <option value="1">Active</option>
                <option value="0">Deactive</option>
            </select>
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
            <th>Name</th>
            <th>Level Color</th>
            <th>Generate Color</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($areas as $key => $area)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $area->name }}</td>
            <td>{{ $area->level_color }}</td>
            <td>{{ $area->generate_level }}</td>
            <td>
            @if ($area->status == 1)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">Deactive</span>
            @endif
            </td>
            <td class="text-center">
                <a href="{{ route('area.edit',$area->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a> |
                <a onclick="return confirm('Are you sure?')" href="{{ url('admin/area/destroy',$area->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>
{{ $areas->links() }}

@stop
