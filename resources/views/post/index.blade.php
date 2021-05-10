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
</style>
<div class="container">
    <div align="center" style="text-shadow: 2px 2px 5px #FAB10C;">
        <!-- <h4>Laravel OJT Project Post</h4> -->
    </div>
    <form action="{{ url('post') }}" method="GET">
        <div class="row">
            <div class="col-md-2">
                <input type="search" name="name" class="form-control-sm" placeholder="Serach By Word..." value="">
            </div>
            <div class="col-md-1">
                <input type="submit" class="btn btn-primary btn-sm" value="Search">
            </div>
            <div class="col-md-7"></div>
            <div class="col-md-2">
                <div style="float:right">
                    <a class="btn btn-success btn-sm" href="{{ url('post/create') }}"><span
                            class="glyphicon glyphicon-plus"></span>Add Post</a>
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
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created Time</th>
                    <th>Created User</th>
                    <th>Updated User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="td">
                @foreach ($data as $post)
                <tr>
                    <td>1</td>
                    <td>{{ $post->title}}</td>
                    <td>{{$post->description}}</td>
                    <!-- <td> <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </td> -->
                    <td>
                        <input data-id="{{$post->id}}" class="toggle-class" type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"
                            {{ $post->status ? 'checked' : '' }}>
                    </td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->created_user_id}}</td>
                    <td>{{$post->updated_user_id}}</td>
                    <td>
                        <form action="{{ route('post_destroy',$post->id)}}" method="post"
                            onsubmit="return confirm('Do you want to delete?');">
                            @csrf @method('DELETE')
                            <a class="btn btn-sm btn-primary" href="{{ route('post_edit',$post->id)}}">
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
        <div>
            <div class="col-md-2">
                {!! $data->appends(request()->input())->links() !!}

            </div>
            <div class="col-md-8">
            </div>
            <div class="col-md-2">
                <p style="font-size:15px"> Count:: {{$count}}</p>
            </div>
        </div>
        <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeStatus',
                    data: {
                        'status': status,
                        'user_id': user_id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })
        </script>
        @endsection