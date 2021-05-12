@extends('layouts.frame')
@section('content')

<div class="row">
    <div class="col-lg-3">
        <div class="pull-left">
            <p style="font-size:18px;">Change Password</h1>
        </div>
    </div>
</div>

<!-- 
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif -->


<form method="post" action="{{ route('profile_update', $data->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div style="width:800px">
            <label style="float:left;padding-left:15%">Name:</label>
            <input type="text" name="name" class="field-style field-full align-none form-control"
                value="{{$data->name}}" style="margin-left:15%" />
        </div>
        <div style="width:800px">
            <label style="float:left;padding-left:15%">Email:</label>
            <input type="email" name="email" class="field-style field-full align-none form-control"
                value="{{$data->email}}" style="margin-left:15%" />
        </div>
        <div style="width:800px">
            <label style="float:left;padding-left:15%">Old Password:</label>
            <input type="password" name="password" class="field-style field-full align-none form-control"
                value="{{$data->password}}" style="margin-left:15%" disabled />
        </div>

        <div style="width:800px">
            <label style="float:left;padding-left:15%">New Password:</label>
            <input type="password" name="password" class="field-style field-full align-none form-control" value=""
                style="margin-left:15%" />
        </div>
        <div style="width:800px">
            <label style="float:left;padding-left:15%">Confirm New Password:</label>
            <input type="password" name="password" class="field-style field-full align-none form-control" value=""
                style="margin-left:15%" />
        </div>


        <div class="col-lg-9" style="padding-top:20px">
            <div class="pull-left">
                <button type="submit" class="btn btn-success btn-sm">Change</button>
                <a class="btn btn-primary btn-sm" href="{{ route('profile') }}"> Clear</a>
            </div>
        </div>
    </div>
</form>
@stop


@section('css')

@stop


@section('js')
<script>
console.log('Hi!');
</script>
@stop