@extends('layouts.frame')

@section('content')
<div class="container">
    <!-- <form class="form-style-9" method="post" action="{{ route('profile_create') }}" enctype="multipart/form-data"
        autocomplete="false"> -->
    <form class="form-style-9" method="post" action="{{ route('userconf_create')}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="_token" value="mqblqz3d3DPukIC32buh1IOO8GX3vseCiBUlHTke">
        <ul>
            <li>
                <label style="float:left">Name</label>
                <input type="text" name="name" class="field-style field-full align-none" placeholder="Name"
                    value="{{ old('name') }}" />
                <span style="color:red">{!! $errors->first('name','<small>:message</small>')!!} </span>
            </li>
            <li>
                <label style="float:left">Email</label>
                <input type="email" name="email" class="field-style field-full align-none" placeholder="Email"
                    value="{{ old('email') }}" />
                <span style="color:red">{!! $errors->first('email','<small>:message</small>')!!} </span>
            </li>
            <li>
                <div class="form-group">
                    @csrf
                    <label style="float:left">Type</label>
                    <select class="form-control" name="type" value="{{ old('type') }}">
                        <option value="{{ old('type') }}">{{ old('type') }}</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>

                </div>
            </li>
            <li>
                <label style="float:left">Phone</label>
                <input type="number" name="phone" class="field-style field-full align-none" placeholder="Phone"
                    value="{{ old('phone') }}" />
            </li>
            <li>
                <label style="float:left">Date of Birth</label>
                <input type="date" name="dob" class="field-style field-full align-none" placeholder="Date of Birth"
                    value="{{ old('dob') }}" />
            </li>
            <li>
                <label style="float:left">Address</label>
                <textarea class="field-style field-full align-none" name="address" rows="5"
                    placeholder="Address">{{ old('address') }}</textarea>
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
                <input type='file' onchange="readURL(this);" name="profile" class="field-style field-full align-none" value="{{ old('profile') }}"/>
                <img id="blah" src="http://placehold.it/180" alt="your image" />
            </li>
            <li>
                <div class="row" style="margin-top:100px">
                    <div class="col-md-9"></div>
                    <div class="col-md-1 col-sm-9 col-xs-9">
                        <a href="{{ route('profile') }}" class="btn btn-info btn-sm">Back</a>
                    </div>
                    <div class="col-md-1 col-sm-9 col-xs-9">
                        <a href="{{ route('profile_create') }}" class="btn btn-danger btn-sm">Clear</a>
                    </div>
                    <div class="col-md-1 col-sm-3 col-xs-3">
                        <!-- <input type="submit" class="btn btn-success btn-sm" value="Confirm" /> -->
                        <input type="submit" class="btn btn-success btn-sm" value="Create" />
                    </div>
                </div>
            </li>
        </ul>
    </form>
</div>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
