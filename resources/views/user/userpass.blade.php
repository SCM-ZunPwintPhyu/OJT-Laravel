@extends('layouts.frame')
@section('content')

<div class="row">
    <div class="col-lg-3">
        <div class="pull-left">
            <p style="font-size:18px;">Change Password</h1>
        </div>
    </div>
</div>

<form method="post" action="{{ route('user_update_pass', Auth::user()->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div style="width:800px">
            <label style="float:left;padding-left:15%">Name:</label>
            <input type="text" name="name" class="field-style field-full align-none form-control"
                value="{{Auth::user()->name}}" style="margin-left:15%" />
        </div>
        <div style="width:800px">
            <label style="float:left;padding-left:15%">Email:</label>
            <input type="email" name="email" class="field-style field-full align-none form-control"
                value="{{Auth::user()->email}}" style="margin-left:15%" />
        </div>
        <div style="width:800px">
            <label style="float:left;padding-left:15%">Old Password:</label>
            <input type="password" name="password" class="field-style field-full align-none form-control"
                value="{{Auth::user()->password}}" style="margin-left:15%" disabled />
        </div>

        <div style="width:800px">
            <label style="float:left;padding-left:15%">New Password:</label>
            <input type="password" name="password" class="field-style field-full align-none form-control" value=""
                style="margin-left:15%" />
        </div>
        <div style="width:800px">
            <label style="float:left;padding-left:15%">Confirm New Password:</label>
            <input type="password" name="password_confirmation" class="field-style field-full align-none form-control"
                value="" style="margin-left:15%" />
            <span style="color:red">{!! $errors->first('password_confirmation','<small>:message</small>')!!} </span>
        </div>


        <div class="col-lg-9" style="padding-top:20px">
            <div class="pull-left">
                <a href="{{ route('user_show') }}" class="btn btn-info btn-sm">Back</a>
                <a href="{{ route('user_changepass',$data->id) }}" class="btn btn-danger btn-sm">Clear</a>
                <!-- <a class="btn btn-primary btn-sm" href="{{ route('user_show') }}"> Clear</a> -->
                <button type="submit" class="btn btn-success btn-sm">Confirm</button>
            </div>
        </div>
    </div>
</form>
@stop