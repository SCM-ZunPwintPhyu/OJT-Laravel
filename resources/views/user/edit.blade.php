@extends('layouts.frame')

@section('content')
<style>
.form-style-9 {
    max-width: 1000px;
    background: #FAFAFA;
    padding: 30px;
    margin: 50px auto;
    box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
    border-radius: 10px;
    border: 6px solid white;
}

.form-style-9 ul {
    padding: 0;
    margin: 0;
    list-style: none;
}

.form-style-9 ul li {
    display: block;
    margin-bottom: 10px;
    min-height: 35px;
}

.form-style-9 ul li .field-style {
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    padding: 8px;
    outline: none;
    border: 1px solid #B0CFE0;
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0all.30s ease-in-out;

}

.form-style-9 ul li .field-style:focus {
    box-shadow: 0 0 5px #B0CFE0;
    border: 1px solid #B0CFE0;
}

.form-style-9 ul li .field-split {
    width: 49%;
}

.form-style-9 ul li .field-full {
    width: 100%;
}

.form-style-9 ul li input.align-left {
    float: left;
}

.form-style-9 ul li input.align-right {
    float: right;
}

.form-style-9 ul li textarea {
    width: 100%;
    height: 100px;
}

.switch {
    position: relative;
    display: inline-block;
    width: 54px;
    height: 25px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 17px;
    width: 17px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked+.slider {
    background-color: #2196F3;
}

input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
    border-radius: 24px;
}

.slider.round:before {
    border-radius: 50%;
}
</style>
<div class="container">
<form class="form-style-9" method="post" action="{{ route('profile_update', $data->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<ul>
            <li>
                <label style="float:left">Name</label>
                <input type="text" name="name" class="field-style field-full align-none" value="{{ $data->name }}" />
                <span style="color:red">{!! $errors->first('name','<small>:message</small>')!!} </span>
            </li>
            <li>
                <label style="float:left">Email</label>
                <input type="email" name="email" class="field-style field-full align-none" value="{{ $data->email }}"/>
                <span style="color:red"> </span>
            </li>
            <li>
                <label style="float:left">Type</label>
                <input type="text" name="type" class="field-style field-full align-none" value="{{ $data->type }}" />
                <span style="color:red"> </span>
            </li>
            <li>
                <label style="float:left">Phone</label>
                <input type="text" name="phone" class="field-style field-full align-none" value="{{ $data->phone }}" />
                <span style="color:red"> </span>
            </li>
            <li>
                <label style="float:left">Date of Birth</label>
                <input type="date" name="dob" class="field-style field-full align-none" value="{{ $data->dob }}" />
                <span style="color:red"> </span>
            </li>
            <li>
                <label style="float:left">Address</label>
                <input type="text" name="address" class="field-style field-full align-none" value="{{ $data->address }}" />
                <span style="color:red"> </span>
            </li> 
            <li>
                <label style="float:left">Password:</label>
                <input type="password" name="password" class="field-style field-full align-none" value="{{ $data->password }}"/>
                <span style="color:red"> </span>
                <!-- <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" placeholder="Password" class="form-control" name="password">
                </div> -->
            </li>
            <li>
                <label style="float:left">Confirm Password:</label>
                <input type="password" name="confirm-password" class="field-style field-full align-none" value="{{ $data->password }}" />
                <span style="color:red"> </span>
                <!-- <div class="form-group">
                    <strong>Confirm Password:</strong>
                    <input type="password" placeholder="Confirm Password" class="form-control" name="confirm-password">
                </div> -->
            </li>
            <li>
                <label style="float:left">Profile Photo</label>
                <input type="file" name="profile" class="field-style field-full align-none" value="{{ $data->profile }}" />
                <span style="color:red"> </span>
            </li>
            <br>
            <li>
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-1 col-sm-9 col-xs-9">
                        <a href="{{ route('profile')}}" class="btn btn-danger btn-sm">Cancel</a>
                    </div>
                    <div class="col-md-1 col-sm-3 col-xs-3">
                        <input type="submit" class="btn btn-success btn-sm" value="Save" />
                    </div>
                </div>
            </li>
        </ul>
    </form>
</div>
@endsection