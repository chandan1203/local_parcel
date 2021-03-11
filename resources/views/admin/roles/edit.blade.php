@extends('admin.layout')

@section('main')

<section class="container">

<h3>Modify role</h3>


{{-- {!! Form::open( ['method'=>'patch', 'url'=> action('Roles@update', ['id'=>$role->id]) ]) !!} --}}
<form action="{{ route('roles.update', $role->id)}}" method="PATCH">
@csrf
    <div class="form-group">
        {{-- {!! Form::label('rolename','Name: ') !!} --}}
        <label for="rolename">Name: </label>
        {{-- {!! Form::text('name', $role->name , ['class'=>'form-control']) !!} --}}
        <input type="text" name="name" value="{{ $role->name}}" class="form-control">
    </div>
    
    <div class="form-group">
        {{-- {!! Form::label('active','active: ') !!} --}}
        <label for="active">Active: </label>
        {{-- {!! Form::select('active', ['inactive','active'], $role->active , ['class'=>'form-control']) !!} --}}
        <select name="active" id="" class="form-control">
            <option value="0">inactive</option>
            <option value="1">active</option>
        </select>
    </div>

    <div class="form-group">
        {{-- {!! Form::submit('Add role', ['class'=>'form-control btn btn-info']) !!} --}}
        <input type="submit" value="Add role" class="form-control btn btn-info">
    </div>
</form>
{{-- {!! Form::close() !!} --}}

@if($errors->any())
    <hr>
    <ul class="container">
        @foreach($errors->all() as $error)
        
            <li>{{$error}}</li>
        
        @endforeach
    </ul>

@endif

</section>

@stop