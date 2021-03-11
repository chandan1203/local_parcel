@extends('admin.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection
@section('main')

</style>

<h1 class="text-center">Outbound Process</h1>
<form action="">
    <input type="text" placeholder="Please Put cursor Here!" class="custom-input">
    <div class="text-center">
        <button type="submit" class="block">Outbounded</button>
    </div>
</form>

@stop
