@extends('layouts.frame')

@section('content')
<style>
.table .thead-light th {
    color: white;
    background-color: #28739E;
    box-sizing: border-box;
    font-size: 18;
    font-family: 'Times New Roman', Times, serif;
}

td {
    font-size: 15;
    font-family: 'Times New Roman', Times, serif;
}

th {
    font-size: 15;
    font-family: 'Times New Roman', Times, serif;
}

.button {
    -moz-box-shadow: inset 0px 1px 0px 0px #3985B1;
    -webkit-box-shadow: inset 0px 1px 0px 0px #3985B1;
    box-shadow: inset 0px 1px 0px 0px #3985B1;
    background-color: #ffffff;
    border: 1px solid #17445E;
    display: inline-block;
    cursor: pointer;
    color: black;
    padding: 8px 18px;
    text-decoration: none;
    font: 12px Arial, Helvetica, sans-serif;
}
</style>
<div class="container">
    <div align="center" style="text-shadow: 2px 2px 5px #FAB10C;">
        <h4>Post's Detail</h4>
    </div>
    
    <div>
        <div class="col-md-2">
           Herer is post detail 
        </div>
        <div class="col-md-8">
        <img src="https://pbs.twimg.com/profile_images/1163911054788833282/AcA2LnWL_400x400.jpg"
                            class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>
@endsection