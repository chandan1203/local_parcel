@extends('admin.layout')

@section('main')

<section class="container">

<h3>Create New Warehouse</h3>

<form action="{{ action('WarehouseController@update',$warehouse->id)}}" class="form" method="POST">
    @csrf

    <input type="hidden" name="user_id" id="user_id">
    <div class="form-group">
        {!! Form::label('incharge_phone','Incharge Phone: ') !!}



        <select name="incharge_phone" id="incharge_phone" class="form-control">
            <option value="">Select Phone</option>
            @foreach ($users as $item)
                <option value="{{ $item->phone }}"  {{ $item->phone == @$warehouse->user->phone ? 'selected' : '' }}>{{ $item->phone }}</option>
            @endforeach
        </select>

        @if ($errors->has('incharge_phone'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('incharge_phone') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('incharge_name','Incharge Name: ') !!}
        <input type="text" class="form-control" id="incharge_name" name="incharge_name" value="{{ @$warehouse->user->username }}">
        @if ($errors->has('incharge_name'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('incharge_name') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('name','Name: ') !!}
        {!! Form::text('name', $warehouse->name , ['class'=>'form-control']) !!}

        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>

    {{-- <div class="form-group">
        {!! Form::label('admin_user_id','Admin: ') !!}
        {!! Form::text('admin_user_id', old('admin_user_id'), ['class'=>'form-control']) !!}

        @if ($errors->has('admin_user_id'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('admin_user_id') }}</strong>
        </span>
        @endif
    </div> --}}

    <div class="form-group">
        {!! Form::label('area_id','Area Name: ') !!}
        <select name="area_id" id="area_id" class="form-control">
            <option value="">Select Area</option>
            @foreach ($areas as $item)
                <option value="{{ $item->id }}" {{ $item->id == $warehouse->area_id ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('hub_id','Hub Name: ') !!}
        <select name="hub_id" id="hub_id" class="form-control">
            <option value="{{ $warehouse->hub_id }}">{{ $warehouse->hub->name }}</option>
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('capacity','Capacity: ') !!}
        {!! Form::text('capacity', $warehouse->capacity , ['class'=>'form-control']) !!}
        @if ($errors->has('capacity'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('capacity') }}</strong>
        </span>
        @endif
    </div>

    {{-- <div class="form-group">
        {!! Form::label('incharge_name','Incharge Name: ') !!}
        {!! Form::text('incharge_name', $warehouse->incharge_name, ['class'=>'form-control']) !!}
        @if ($errors->has('incharge_name'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('incharge_name') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('incharge_phone','Incharge Phone: ') !!}
        {!! Form::text('incharge_phone', $warehouse->incharge_phone, ['class'=>'form-control']) !!}
        @if ($errors->has('incharge_phone'))
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('incharge_phone') }}</strong>
        </span>
        @endif
    </div> --}}

    <div class="form-group">
        {!! Form::submit('Update', ['class'=>'form-control btn btn-info']) !!}
    </div>
</form>

</section>

<script>
$(function(){
    var area = $('#area_id');
    var hub = $('#hub_id');

    // hub.attr('disabled','disabled');

    area.change(function(){
        var id = $(this).val();
        if(id){
            // hub.attr('disabled','disabled')
            $.get('{{ url('admin/warehouse/create?area_id=') }}'+id)
                .success(function(data){
                    var s ='<option value="">Select</option>';
                    console.log(s);
                    data.forEach(function(row){
                        s +='<option value="'+row.id+'">'+row.name+'</option>'
                    })

                    // hub.removeAttr('disabled');
                    hub.html(s);
                })
        }


    });



})

</script>

<script>
$(function(){
    var phone = $('#incharge_phone');
    var name = $('#incharge_name');
    var user = $('#user_id');

    // name.attr('disabled','disabled');

    phone.change(function(){
        var phone = $(this).val();
        console.log(phone)
        if(phone){
            name.attr('disabled','disabled')
            $.get('{{ url('admin/warehouse/create?phone=') }}'+phone)
            .success(function(data){
                console.log(data)
                data.forEach(function(row){
                    s = row.username;
                        console.log(s);
                    p = row.id;
                    console.log(p);
                })
                name.removeAttr('disabled');
                document.getElementById('incharge_name').value = s;
                // name.html(s);
                document.getElementById('user_id').value = p;
                // user.html(p);
            })
        }



    });



})

</script>

@stop
