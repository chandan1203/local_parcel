@extends('admin.layout')

@section('main')

<section class="container">

<h3>Edit Hub</h3>


{!! Form::open( ['method'=>'patch', 'url'=> action('HubController@update', $hub->id)]) !!}
    @csrf
    <div class="form-group">
        {!! Form::label('name','Name: ') !!}
        {!! Form::text('name', $hub->name , ['class'=>'form-control']) !!}

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
                <option value="{{ $item->id }}" {{ $hub->area_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {!! Form::label('incharge_name','Incharge Name: ') !!}
        {!! Form::text('incharge_name', $hub->incharge_name , ['class'=>'form-control']) !!}

        @if ($errors->has('incharge_name'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('incharge_name') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('incharge_phone','Incharge Phone: ') !!}
        {!! Form::text('incharge_phone', $hub->incharge_phone , ['class'=>'form-control']) !!}
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
                <option value="1" {{ $hub->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $hub->status == 0 ? 'selected' : '' }}>Deactive</option>
        </select>
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class'=>'form-control btn btn-info']) !!}
    </div>
{!! Form::close() !!}

</section>

@stop
