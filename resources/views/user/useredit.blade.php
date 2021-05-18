@extends('layouts.frame')

@section('content')
<div class="container">
    <form class="form-style-9" method="post" action="{{ route('personalconf_edit', Auth::user()->id)}}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <ul>
            <li>
                <label style="float:left">Name</label>
                <input type="text" name="name" class="field-style field-full align-none" value="{{ old('name',Auth::user()->name) }}" />
                <span style="color:red">{!! $errors->first('name','<small>:message</small>')!!} </span>
            </li>
            <li>
                <label style="float:left">Email</label>
                <input type="email" name="email" class="field-style field-full align-none" value="{{ old('email',Auth::user()->email) }}" />
                <span style="color:red">{!! $errors->first('email','<small>:message</small>')!!} </span>
            </li>
            <li>
                <label style="float:left">Type</label>
                <select class="form-control" name="type" disabled>
                    <option value="{{ old('type',Auth::user()->type) }}">
                        <?php
                        if (Auth::user()->type == 0) {
                        echo "Admin";
                        } else {
                        echo "User";
                        }
                        ?>
                    </option>
                    <option value="0">Admin</option>
                    <option value="1">User</option>
                </select>
            </li>
            <li>
                <label style="float:left">Phone</label>
                <input type="number" name="phone" class="field-style field-full align-none" value="{{ old('phone',Auth::user()->phone) }}" />
                <span style="color:red"> </span>
            </li>
            <li>
                <label style="float:left">Date of Birth</label>
                <input type="date" name="dob" class="field-style field-full align-none" value="{{ old('dob',Auth::user()->dob) }}" />
                <span style="color:red"> </span>
            </li>
            <li>
                <label style="float:left">Address</label>
                <textarea class="field-style field-full align-none" name="address" rows="5">{{ old('address',Auth::user()->address) }}</textarea>
                <span style="color:red"> </span>
            </li>
            <li>
                <a href="{{ route('user_changepass', Auth::user()->id)}}" class="" style="float:left">Change Password</a>
            </li>
            <li>
                <label style="float:left">Profile Photo</label>
                    <input type='file' onchange="readURL(this);" name="profile" class="field-style field-full align-none" value="{{ old('profile') }}"/>
                <img id="blah" src='{{ asset("./uploads/Profile/". Auth::user()->name . "/" . Auth::user()->name . ".PNG " ) }}' alt="your image" />
            </li>
            <br>
            <li>
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-1 col-sm-9 col-xs-9">
                        <a href="{{ route('user_show') }}" class="btn btn-info btn-sm">Back</a>
                    </div>
                    <div class="col-md-1 col-sm-9 col-xs-9">
                        <a href="{{ route('user_edit') }}" class="btn btn-danger btn-sm">Clear</a>
                    </div>
                    <div class="col-md-1 col-sm-3 col-xs-3">
                        <input type="submit" class="btn btn-success btn-sm" value="Create" />
                    </div>
                </div>
            </li>
        </ul>
    </form>
</div>
@endsection