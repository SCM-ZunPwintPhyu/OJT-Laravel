@extends('layouts.frame')

@section('content')
<div class="container">
    <form class="form-style-9" method="post" action="{{ route('profile_create') }}" enctype="multipart/form-data"
        autocomplete="false">
        <input type="hidden" name="_token" value="mqblqz3d3DPukIC32buh1IOO8GX3vseCiBUlHTke">
        <ul>
            <li>
                <label style="float:left">Name</label>
                <input type="text" name="name" class="field-style field-full align-none" placeholder="Name" />
                <span style="color:red">{!! $errors->first('name','<small>:message</small>')!!} </span>
            </li>
            <li>
                <label style="float:left">Email</label>
                <input type="email" name="email" class="field-style field-full align-none" placeholder="Email" />
                <span style="color:red">{!! $errors->first('email','<small>:message</small>')!!} </span>
            </li>
            <li>
                <div class="form-group">
                    @csrf
                    <label style="float:left">Type</label>
                    <select class="form-control" name="type">
                        <option value="">Select Type</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>

                </div>
            </li>
            <li>
                <label style="float:left">Phone</label>
                <input type="text" name="phone" class="field-style field-full align-none" placeholder="Phone" />
                <span style="color:red"> </span>
            </li>
            <li>
                <label style="float:left">Date of Birth</label>
                <input type="date" name="dob" class="field-style field-full align-none" placeholder="Date of Birth" />
                <span style="color:red"> </span>
            </li>
            <li>
                <label style="float:left">Address</label>
                <textarea class="field-style field-full align-none" name="address" rows="5" placeholder="Address" >{{ old('address') }}</textarea>
                <span style="color:red"> </span>
            </li>
            <li>
                <label style="float:left">Password:</label>
                <input type="password" name="password" class="field-style field-full align-none"
                    placeholder="Password" />
                <span style="color:red">{!! $errors->first('password','<small>:message</small>')!!} </span>
            </li>
            <li>
                <label style="float:left">Confirm Password:</label>
                <input type="password" name="confirm-password" class="field-style field-full align-none"
                    placeholder="Confirm Password" />
                <span style="color:red">{!! $errors->first('password','<small>:message</small>')!!} </span>
            </li>
            <li>
                <label style="float:left">Profile Photo</label>
                <input type="file" name="profile" class="field-style field-full align-none"
                    placeholder="Profile Photo" />
                <span style="color:red"> </span>
            </li>
            <br>
            <li>
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-1 col-sm-9 col-xs-9">
                        <a href="{{ route('profile') }}" class="btn btn-danger btn-sm">Clear</a>
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