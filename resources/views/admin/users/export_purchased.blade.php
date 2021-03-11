@extends('admin.layout')

@section('main')
<section class="panel-body">
    <h1 class="page-title text-center">Download Offers List</h1>
   <!--  <small class="alert alert-warning">Max 10,000 data will be downloaded at a time.</small> -->
</section>
<center>{!! errors($errors) !!}</center>


<section class="panel-body">
    {!! Form::open([ 'url'=> action('Users@postPurchasedExport'), 'method'=> 'post', 'autocomplete'=>'off' ]) !!}
    
    <div class="form-group col-sm-4">
        {!! Form::label('joined_after', 'From date') !!}
        {!! Form::text('joined_after', old('joined_after') , ['class'=> 'form-control datepicker'] ) !!}
    </div>
    
    <div class="form-group col-sm-4">
        {!! Form::label('joined_before', 'End date') !!}
        {!! Form::text('joined_before', old('joined_before') , ['class'=> 'form-control datepicker'] ) !!}
    </div>
    
    <!-- <div class="form-group col-sm-3">
        {!! Form::label('format', 'Format') !!}<br />
        <input type="radio" name="format" value="xlsx"/> Excel (xlsx)
        <input type="radio" name="format" value="xls"/> Excel (xls)
        <input type="radio" name="format" value="csv" checked /> CSV
    </div> -->
    <div class="form-group col-sm-4">
    {!! Form::label('', '') !!}<br />
    {!! Form::submit('Download', ['class'=> 'btn btn-info btn-block']) !!}
    </div>
    
    {!! Form::close() !!}
</section>

@stop