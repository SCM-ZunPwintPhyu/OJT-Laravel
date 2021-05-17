@extends('layouts.frame')

@section('content')

<div class="row">
    <div class="col-lg-9" style="padding-top:20px"></div>
    <div class="col-lg-3" style="padding-top:20px">
        <a class="btn btn-primary btn-sm" href="{{ route('user_edit') }}"> Edit</a>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12" align="center">
        <a href=""><img src='{{ asset("./uploads/Profile/". Auth::user()->name . "/" . Auth::user()->name . ".PNG " ) }}' height="130px"
                width="130px" id="photo" style="border-radius:200px"></a>
        <h5>Profile</h5>
    </div>
</div><br><br>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="card">
            <div class="w3-card-4 w3-info  row">
                <div class="col-xs-6 col-sm-6 col-md-12">
                    <label><b>Name:{{Auth::user()->name}}</b></label>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="w3-card-4 w3-info row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label><b>Type:
                            <?php
                        if (Auth::user()->type == 0) {
                        echo "Admin";
                        } else {
                        echo "User";
                        }
                    ?>
                        </b></label>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="w3-card-4 w3-info row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label><b>Date of Birth:{{Auth::user()->dob}}</b></label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="card">
            <div class="w3-card-4 w3-info row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label><b>Email:{{Auth::user()->email}}</b></label>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="w3-card-4 w3-info row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label><b>Phone:{{Auth::user()->phone}}</b></label>
                </div>
            </div>
        </div>
        <div class="card" style="height:auto">
            <div class="w3-card-4 w3-info row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label  style="width:490px"><b>Address:{{Auth::user()->address}}</b></label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>

@stop