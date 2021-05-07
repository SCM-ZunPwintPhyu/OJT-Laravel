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
        <h4>Laravel OJT Project Show Post Detail</h4>
    </div>
    <form action="{{ url('post') }}" method="GET" >
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="Serach By Word..." value="">
            </div>
            <div class="col-md-1">
                <input type="submit" class="btn btn-primary btn-sm" value="Search">
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-2">
                <div style="float:right">
                    <a class="btn btn-success btn-sm" href="{{ url('post/create') }}"><span class="glyphicon glyphicon-plus"></span>Add Post</a>
                </div>
            </div>
        </div>
    </form>
    <br>
    <table class="table table-hover" style="text-shadow: 2px 2px 5px rgb(90, 216, 233);"> 
        <thead>
            <tr class="info">
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created</th>
                <th>Created User Id</th>
                <th>Updated User Id</th>
                <th>Deleted User Id</th>
                <th>Action</th>
            </tr>
        </thead>

    </table>
    <div>
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>
@endsection