@extends('admin.layout')

@section('main')

<section class="container">

<h3>Edit lot</h3>

{!! Form::open( ['method'=>'patch', 'url'=> action('LotController@update',$lot->id)]) !!}
    @csrf
    <div class="form-group">
        {!! Form::label('lot_name','Lot Name: ') !!}
        {!! Form::text('lot_name', $lot->lot_name, ['class'=>'form-control']) !!}

        @if ($errors->has('lot_name'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('lot_name') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('capacity','Capacity: ') !!}
        {!! Form::text('capacity', $lot->capacity, ['class'=>'form-control']) !!}
        @if ($errors->has('capacity'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('capacity') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('prefix','Prefix: ') !!}
        {!! Form::text('prefix', $lot->prefix, ['class'=>'form-control']) !!}
        @if ($errors->has('prefix'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('prefix') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('qr_code_generate','QR Code: ') !!}
        {!! Form::text('qr_code_generate',$lot->qr_code_generate , ['class'=>'form-control']) !!}
        @if ($errors->has('qr_code_generate'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('qr_code_generate') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class'=>'form-control btn btn-info']) !!}
    </div>
    {!! Form::close() !!}

</section>

@stop
