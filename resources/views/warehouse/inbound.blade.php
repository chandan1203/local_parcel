@extends('admin.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection
@section('main')
<h1 class="text-center">Inbound Process</h1>
<form action="">
    <input type="text" placeholder="Please Put cursor Here!" class="custom-input">
    <div class="text-center">
        <button type="submit" class="block">Inbounded</button>
    </div>
</form>

@stop
