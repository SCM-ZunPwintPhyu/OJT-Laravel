@extends('layouts.frame')

@section('content')
<div class="container">
    <form class="form-style-9" method="post" action="{{ route('profile_update', $data->id)}}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <ul>
            <li>
                <label style="float:left">Name</label>
                <input type="text" name="name" class="field-style field-full align-none" value="{{ old('name',$data->name) }}" />
                <span style="color:red">{!! $errors->first('name','<small>:message</small>')!!} </span>
            </li>
            <li>
                <label style="float:left">Email</label>
                <input type="email" name="email" class="field-style field-full align-none" value="{{ old('email',$data->email) }}" />
                <span style="color:red">{!! $errors->first('email','<small>:message</small>')!!} </span>
            </li>
            <li>
                <label style="float:left">Type</label>
                <select class="form-control" name="type">
                    <option value="{{ old('type',$data->type) }}">
                        <?php
                        if ($data->type == 0) {
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
                <input type="number" name="phone" class="field-style field-full align-none" value="{{ old('phone',$data->phone) }}" />
                <span style="color:red"> </span>
            </li>
            <li>
                <label style="float:left">Date of Birth</label>
                <input type="date" name="dob" class="field-style field-full align-none" value="{{ old('dob',$data->dob) }}" />
                <span style="color:red"> </span>
            </li>
            <li>
                <label style="float:left">Address</label>
                <textarea class="field-style field-full align-none" name="address"
                    rows="5">{{ old('address',$data->address) }}</textarea>
                <span style="color:red"> </span>
            </li>
            <li>
                <a href="{{ route('change_pass', $data->id)}}" class="" style="float:left">Change Password</a>
            </li>
            <li>
                <label style="float:left">Profile Photo</label>
                <input type="file" name="profile" class="field-style field-full align-none"
                    value="{{ old('profile',$data->profile) }}" />
                <span style="color:red"> </span>
            </li>
            <li>
                <a href=""><img src='{{ asset("./uploads/Profile/$data->name/$data->name.PNG " ) }}' height="90px"
                        width="90px" id="photo" style="float:left"></a>
            </li>
            <br>
            <li>
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-1 col-sm-9 col-xs-9">
                        <a href="{{ route('profile') }}" class="btn btn-info btn-sm">Back</a>
                    </div>
                    <div class="col-md-1 col-sm-9 col-xs-9">
                        <a href="{{ route('profile_edit',$data->id) }}" class="btn btn-danger btn-sm">Clear</a>
                    </div>
                    <div class="col-md-1 col-sm-3 col-xs-3">
                        <input type="submit" class="btn btn-success btn-sm" value="Confirm" />
                    </div>
                </div>
            </li>
        </ul>
    </form>
</div>
@endsection