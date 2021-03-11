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
    <h2 class="page-title text-center">Hub List</h2>

</section>
<section class="col-xs-12">

    {{-- {!! Form::open(['class'=>'form form-inline', 'method' =>'post', 'url'=> action('Permissions@searchIndex')]) !!} --}}
    <form action="{{action('HubController@search')}}" class="form form-inline" method="post">
        @csrf
        <div class="form-group">
            {{-- {!! Form::label('name', 'Name: ') !!} --}}
            <label for="name">Search: </label>
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
            <th>Area Name</th>
            <th>Incharge Name</th>
            <th>Incharge Phone</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($hubs as $key => $hub)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $hub->name }}</td>
            <td>{{ @$hub->area->name }}</td>
            <td>{{ $hub->incharge_name }}</td>
            <td>{{ $hub->incharge_phone }}</td>
            <td>
                @if ($hub->status == 1)
                    <span class="badge badge-success">Active</span>
                @else
                    <span class="badge badge-danger">Deactive</span>
                @endif
            </td>
            <td class="text-center">
                <a href="{{ route('hub.edit',$hub->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a> |
                <a onclick="return confirm('Are you sure?')" href="{{ url('admin/hub/destroy',$hub->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

{{ $hubs->links() }}
@stop
