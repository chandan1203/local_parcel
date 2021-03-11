@extends('admin.layout')

@section('main')

<section class="container">

<h3>Create New Hub</h3>

<form action="{{ action('HubController@store')}}" class="form" method="POST">
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
        {!! Form::label('area_id','Area Name: ') !!}
        <select name="area_id" id="" class="form-control">
            <option value="">Select Area</option>
            @foreach ($areas as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('incharge_name','Incharge Name: ') !!}
        {!! Form::text('incharge_name', old('incharge_name'), ['class'=>'form-control']) !!}
        @if ($errors->has('incharge_name'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('incharge_name') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('incharge_phone','Incharge Phone: ') !!}
        {!! Form::text('incharge_phone', old('incharge_phone'), ['class'=>'form-control']) !!}
        @if ($errors->has('incharge_phone'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('incharge_phone') }}</strong>
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
        {!! Form::submit('Add Hub', ['class'=>'form-control btn btn-info']) !!}
    </div>

</form>

</section>

@stop
