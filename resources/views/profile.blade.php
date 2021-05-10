@extends('layouts.frame')
@section('title', 'Profile Detail')

@section('content_header')
    
@stop

@section('content')
<style>
    body{
    margin-top:20px;
    background:#FAFAFA;
}

.card {
    /* box-shadow: 3px 5px #E0F9FC; */
    box-shadow: 5px 5px 5px grey;
    background-color: white;
    height:80px;
    padding:20px;
}
p,label{
    /* padding-left: 30px; */
    align-self: center;
    font-size: 16px;
}
img{
    align-items:"center";
}
          
</style>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
           <a class="btn btn-primary  glyphicon glyphicon-edit" href="{{ route('profile.edit',Auth::user()->id) }}">Edit</a>
    </div>
</div> --}}
<div class="row">
<h5 style="padding-left:9%">Profile</h5>
</div><br><br>
<div class="row">
      <div class="col-md-1"></div>
      <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="card" >
            <div class="w3-card-4 w3-info w3-center row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                <label><b>Name : {{ Auth::user()->name }}</b></label>
                </div>
            </div>
        </div>
       </div>
       <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="card" >
            <div class="w3-card-4 w3-info w3-center row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label><b>Email:{{ Auth::user()->email }}</b></label>
                </div>
            </div>
        </div>
       </div>
       <div class="col-md-1"></div>
  </div>

@stop


@section('css')
    
@stop


@section('js')
     <script> 
         $(document).ready(function() {

                setTimeout(function() {
                    $(".alert-success").fadeOut(3000);
                }, 3000);

            });
     </script>
@stop