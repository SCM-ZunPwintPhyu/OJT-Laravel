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

.switch {
    position: relative;
    display: inline-block;
    width: 45px;
    height: 22px;
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
    height: 15px;
    width: 15px;
    left: 1px;
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
    border-radius: 20px;
}

.slider.round:before {
    border-radius: 50%;
}

body {
    font-family: Arial, Helvetica, sans-serif;
}

/* The Modal (background) */
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
    height: 60%;
    margin-left: 30%;
}

/* The Close Button */
.close {
    color: #990000;
    margin-left: 95%;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
<div class="container">
    <form>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <div style="float:right">
                    <a class="btn btn-success btn-sm" href="{{ route('profile_create') }}"><span
                            class="glyphicon glyphicon-plus"></span>Add Profile</a>
                </div>
            </div>
        </div>
    </form>
    <br>

    <div style="overflow-x:auto;">
                <table class="table table-hover" style="text-shadow: 2px 2px 5px rgb(90, 216, 233);">
            <thead>
                <tr class="info">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="td">
                @foreach ($data as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->type}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action="{{ route('profile_destroy',$user->id)}}" method="post"
                            onsubmit="return confirm('Do you want to delete?');">
                            @csrf @method('DELETE')
                            <a class="btn btn-sm btn-success" href="{{ route('profile_show',$user->id)}}">
                                <i class="fas fa-eye" title="Show"></i></a>
                            </a>
                            <a class="btn btn-sm btn-primary" href="{{ route('profile_edit',$user->id)}}">
                                <i class="fas fa-edit" title="Edit"></i></a>
                            </a>
                            <button class="btn btn-sm btn-danger btn-sm" type="submit">
                                <i class="fa fa-fw fa-trash" title="Delete"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-center">
        <!--  -->
        </div>
                <div class="col-md-2" style="float:left">
            <p style="font-size:15px"> Count:: 1</p>
        </div>
                            </main>
                </div>
            </section>
            <!-- /.content -->
        </div>
        @endsection