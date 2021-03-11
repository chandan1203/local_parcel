
@extends('admin.layout')

@section('title') Permission @stop

@section('main')

<h1><center>Permissions @if($permissions) : {{$permissions->total()}} @endif</center></h1>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<section class="col-xs-12">

    {{-- {!! Form::open(['class'=>'form form-inline', 'method' =>'post', 'url'=> action('Permissions@searchIndex')]) !!} --}}
    <form action="{{action('Permissions@searchIndex')}}" class="form form-inline" method="post">
        <div class="form-group">
            {{-- {!! Form::label('name', 'Name: ') !!} --}}
            <label for="name">Name: </label>
            {{-- {!! Form::text('name', old('name') , ['class'=>'form-control']) !!} --}}
            <input type="text" name="name" value="{{ old('name')}}" class="form-control">
        </div>

        <div class="form-group">
            {{-- {!! Form::label('from', 'From: ') !!} --}}
            <label for="from">From: </label>
            {{-- {!! Form::text('from', old('from') , ['class'=>'form-control datepicker']) !!} --}}
            <input type="text" name="from" class="from-control datepicker" value="{{ old('from')}}">
        </div>

        <div class="form-group">
            {{-- {!! Form::label('to', 'To: ') !!} --}}
            <label for="to">To: </label>
            {{-- {!! Form::text('to', old('to') , ['class'=>'form-control datepicker']) !!} --}}
            <input type="text" name="to" value="{{ old('to')}}" class="from-control datepicker">
        </div>

        {{-- {!! Form::submit('search', ['class'=>'btn btn-info']) !!} --}}
        <input type="submit" value="search" class="btn btn-info">
    </form>
    {{-- {!! Form::close() !!} --}}

    <hr>
</section>

<secion class="col-xs-12">
    {{-- {!! Form::open(['url'=>action('Permissions@autoUpdate'), 'method'=>'POST', 'role'=>'form']) !!} --}}
    <form action="{{ action('Permissions@autoUpdate')}}" method="POST">
        <button class="badge badge-primary" type="submit">Update Action list</button>
    </form>
    {{-- {!! Form::close() !!} --}}
</secion>

<section class="col-sm-11">
@if($errors->any())

    <h4>Please check:</h4>

    <ul>
        @foreach($errors->all() as $error)

            <li>{{$error}}</li>

        @endforeach
    </ul>
    <hr>

@endif
</section>

<section class="col-sm-11">

    <table class="table table-responsive">
        <thead>
            <tr>
				<th>Id</th>
				<th>Name</th>
				<th>Created at</th>
				<th>Updated at</th>
                <th>Show</th>
                <th>Modify</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @if($permissions)
                @foreach($permissions as $permission)
                    <tr>
						<td>{{$permission->id}}</td>
						<td>{{$permission->name}}</td>
						<td>{{$permission->created_at}}</td>
						<td>{{$permission->updated_at}}</td>
                        <td>
                            {{-- {!! views('permissions',$permission->id, '<span class=\'fa fa-expand\'></span>', ['class'=>'btn btn-default btn-sm btn-rounded']) !!} --}}
                            <a href="{{ route('permissions.show',$permission->id)}}" class="btn btn-default btn-sm btn-rounded"><span class='fa fa-expand'></span></a>
                        </td>
                        <td>
                            {{-- {!! edits('permissions', $permission['id'], '<span class=\'fa fa-pencil\'></span>', ['class'=>'btn btn-default btn-sm btn-rounded']) !!} --}}
                            <a href="{{ route('permissions.edit',$permission->id)}}" class="btn btn-default btn-sm btn-rounded"><span class='fa fa-edit'></span></a>

                        </td>
                        <td>
                            {{-- {!! deletes('permissions', $permission['id'], '<span class=\'fa fa-times\'></span>', ['class'=>'btn btn-default btn-sm btn-rounded']) !!} --}}

                            <a href="{{ route('permissions.destroy',$permission->id)}}" class="btn btn-default btn-sm btn-rounded"><span class='fa fa-trash'></span></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {!! $permissions->render() !!}
</section>

@stop
