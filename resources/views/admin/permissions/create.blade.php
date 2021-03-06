
@extends('admin.layout')

@section('title') Create new Permission @stop

@section('main')

<h1><center>Permissions</center></h1>


@if($errors->any())
<section class="col-sm-11">
    <h4>Please check:</h4>
    
    <ul>
        @foreach($errors->all() as $error)
        
            <li>{{$error}}</li>
        
        @endforeach
    </ul>
    <hr>
</section>    
@endif


<section class="col-sm-11">

<h3>Create Permission</h3>


{{-- {!! Form::open( ['url'=> action('Permissions@store'), 'class'=>'form form-horizontal', 'enctype'=>'multipart/form-data' ]) !!} --}}

<form action="{{ action('Permissions@store')}}" class="form form-horizontal" enctype="multipart/form-data" method="POST">
@csrf
    
        <div class="form-group">
            <label for="name">Name: </label>
            {{-- {!! Form::text('name', old('name') , ['class'=>'form-control']) !!} --}}
            <input type="text" name="name" value="App\Http\Controllers\" class="form-control">
        </div>
            
    <div class="form-group">
        {{-- {!! Form::submit('Save Permission', ['class'=>'form-control btn btn-info']) !!} --}}
        <input type="submit" value="Save Permission" class="form-control btn btn-info">
    </div>
</form>
{{-- {!! Form::close() !!} --}}


</section>

@stop
        