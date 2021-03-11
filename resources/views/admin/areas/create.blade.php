@extends('admin.layout')

@section('main')

<section class="container">

<h3>Create New Area</h3>

<form action="{{ action('AreaController@store')}}" class="form" method="POST">
    @csrf
    <div class="form-group">
        {!! Form::label('name','Name: ') !!}
        {!! Form::text('name', old('name'), ['class'=>'form-control']) !!}

        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('level_color','Level Color: ') !!}
        {!! Form::text('level_color', old('level_color'), ['class'=>'form-control']) !!}
        @if ($errors->has('level_color'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('level_color') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('generate_level','Generate Level: ') !!}
        {!! Form::text('generate_level', old('generate_level'), ['class'=>'form-control']) !!}
        @if ($errors->has('generate_level'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('generate_level') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('status','Status: ') !!}
        <select name="status" id="" class="form-control">
            <option value="">Select Status</option>
                <option value="1">Active</option>
                <option value="0">Deactive</option>
        </select>
    </div>

    <div class="form-group">
        {!! Form::submit('Add Area', ['class'=>'form-control btn btn-info']) !!}
    </div>
</form>

</section>

@stop
