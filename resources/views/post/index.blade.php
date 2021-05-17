@extends('layouts.frame')
@section('content')
<div class="container">
    <?php 
        $title= isset($_GET['title'])?$_GET['title']:'';
        $description= isset($_GET['description'])?$_GET['description']:'';
        $created_user_id= isset($_GET['created_user_id'])?$_GET['created_user_id']:'';
    ?>
    <form action="{{ url('post') }}" method="GET">
        <div class="row">
            <div class="col-md-2">
                <input type="search" name="title" class="form-control-sm" placeholder="Serach By Title..."
                    value="{{ $title}}">
            </div>
            <div class="col-md-2" style="margin-left:10px">
                <input type="search" name="description" class="form-control-sm" placeholder="Serach By Description..."
                    value="{{ $description}}">
            </div>
            <div class="col-md-2" style="margin-left:10px">
                <input type="search" name="created_user_id" class="form-control-sm"
                    placeholder="Serach By Created User..." value="{{ $created_user_id}}">
            </div>
            <div class="col-md-2">
                <input type="submit" class="btn btn-primary btn-sm" value="Search">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <div style="float:right;">
                    <a class="btn btn-success btn-sm" href="{{ url('post/create') }}"><span
                            class="glyphicon glyphicon-plus"></span>Add Post</a>
                </div>
            </div>
            <div class="col-md-1" style="width:200px;margin-top:2%">
                <a class="btn btn-warning" href="{{ route('show_upload_file') }}"><span
                        class="glyphicon glyphicon-plus"></span> Upload </a>
            </div>
            <div class="col-md-2" style="margin-top:2%">
                <a class="btn btn-info" href="{{ route('export') }}"><span class="glyphicon glyphicon-plus"></span>
                    Download </a>
            </div>
        </div>
    </form>
    <br>
    <div style="overflow-x:auto;">
        @if(count($data)>0)
        <table class="table table-hover" style="text-shadow: 2px 2px 5px rgb(90, 216, 233);">
            <!-- For Admin Condition -->
            <?php
              if (Auth::user()->type == 0) {
              ?>
            <thead>
                <tr class="info">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created User</th>
                    <th>Updated User</th>
                    <th>Created Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="td">
                @foreach ($data as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>
                        <div type="button" data-toggle="modal" data-target="#exampleModal">
                            {{ Str::limit($post->title, 10) }}
                            </diiv>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$post->title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Title:{{$post->title}}</p>
                                            <p>Description:{{$post->description}}</p>
                                            <p>Created User:{{$post->created_user_id}}</p>
                                            <p>Updated User:{{$post->updated_user_id}}</p>
                                            <p>Created Time:{{$post->created_at}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
                    <td>{{ Str::limit($post->description, 40) }}</td>
                    <td>
                        <label class="switch">
                            <input data-id="{{$post->id}}" data-size="small" class="toggle-class" type="checkbox"
                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                data-off="InActive" {{ $post->status ? 'checked' : '' }}>
                            <span class="slider round"></span>
                        </label>
                    </td>
                    <td>{{$post->created_user_id}}</td>
                    <td>{{$post->updated_user_id}}</td>
                    <td>{{$post->created_at}}</td>
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
                <?php
                } else {
                ?>
                <!-- For User Condition-->
                <thead>
                    <tr class="info">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created User</th>
                        <th>Updated User</th>
                        <th>Created Time</th>
                    </tr>
                </thead>
            <tbody class="td">
                @foreach ($data as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <!-- <td>{{ $post->title}}</td> -->
                    <td>
                        <div type="button" data-toggle="modal" data-target="#exampleModal">
                            {{ Str::limit($post->title, 10) }}
                            </diiv>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="false">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$post->title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="false" style="color:red">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Title:{{$post->title}}</p>
                                            <p>Description:{{$post->description}}</p>
                                            <p>Created User:{{$post->created_user_id}}</p>
                                            <p>Updated User:{{$post->updated_user_id}}</p>
                                            <p>Created Time:{{$post->created_at}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"
                                                aria-hidden="false">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
                    <td>{{ Str::limit($post->description, 40) }}</td>
                    <td>
                        <label class="switch">
                            <input data-id="{{$post->id}}" data-size="small" class="toggle-class" type="checkbox"
                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                data-off="InActive" {{ $post->status ? 'checked' : '' }}>
                            <span class="slider round"></span>
                        </label>
                    </td>
                    <td>{{$post->created_user_id}}</td>
                    <td>{{$post->updated_user_id}}</td>
                    <td>{{$post->created_at}}</td>
                </tr>

                @endforeach
                <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
    @else
    <h4 class="h4 pt-5 pb-3 text-info">Posts Not Found!....</h4>
    @endif
    <!-- For Pagination -->
    <div style="float:right">
    {!! $data->appends(request()->input())->links() !!}
    </div>
    <!-- For Count -->
    <div class="col-md-2" style="float:left">
        <!-- <p style="font-size:15px"> Count::</p> -->
    </div>
</div>
@endsection