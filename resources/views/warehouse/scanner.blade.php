@extends('admin.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection
@section('main')
<h1 class="text-center">Inbound/Outbound Process</h1>
<form action="">
    <div class="row">
        <div class="col-md-8">
            <input type="text" placeholder="Please Put cursor Here!" class="custom-input" id='scanner-input'>
        </div>
        <div class="col-md-4">
            <select name="" id="" class="custom-input">
                <option value="">Inbound</option>
                <option value="">Outbound</option>
            </select>
        </div>


</div>
    <div class="text-center">
        <button type="submit" class="block">SUBMIT</button>
    </div>
</form>
<script>
    $(function() {
  $('#scanner-input').focus().select();
});
</script>
@stop
