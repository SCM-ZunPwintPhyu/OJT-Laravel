@extends('layouts.frame')
@section('content')
<div class="container">
    <?php 
        $name= isset($_GET['name'])?$_GET['name']:'';
        $email= isset($_GET['email'])?$_GET['email']:'';
        $created_at= isset($_GET['created_at'])?$_GET['created_at']:'';
    ?>
    <!-- Add Button -->
    <form action="{{ url('profile') }}" method="GET">
        <div class="row">
            <div class="col-md-2">
                <input type="search" name="name" class="form-control-sm" placeholder="Serach By Name..."
                    value="{{ $name}}">
            </div>
            <div class="col-md-2" style="margin-left:10px">
                <input type="search" name="email" class="form-control-sm" placeholder="Serach By Email..."
                    value="{{ $email}}">
            </div>
            <!-- <div class="col-md-2" style="margin-left:10px">
                <input type="date" name="created_at" class="form-control-sm"
                    placeholder="Serach By Created User..." value="{{ $created_at}}">
            </div> -->
            <div class="col-md-2">
                <input type="submit" class="btn btn-primary btn-sm" value="Search">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <div style="float:right">
                    <a class="btn btn-success btn-sm" href="{{ route('profile_create') }}"><span
                            class="glyphicon glyphicon-plus"></span>Add Profile</a>
                </div>
            </div>
        </div>
    </form>
    <br>
    <!-- User Form -->
    <div>
        <table class="table table-hover" style="text-shadow: 2px 2px 5px rgb(90, 216, 233);">
            <thead>
                <tr class="info">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="td">
                @foreach ($data as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        <div type="button" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
                            <a href="#">{{ Str::limit($user->name, 10) }}</a>
                            </diiv>

                            <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="false">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$user->name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="false" style="color:red">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Title:{{$user->name}}</p>
                                            <p>Description:{{$user->email}}</p>
                                            <p>Created Time:{{$user->created_at->format('d/m/Y')}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"
                                                aria-hidden="false">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
                    <td>
                        <?php

                        if ($user->type == 0) {
                        echo "Admin";
                        } else {
                        echo "User";
                        }
                        ?>
                    </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->format('d/m/Y')}}</td>
                    <td>{{$user->updated_at->format('d/m/Y')}}</td>
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
        <div style="float:right">
            {!! $data->appends(request()->input())->links() !!}
        </div>
        <div class="col-md-2" style="float:left">
            <p style="font-size:15px"> Count:: {{$data->count()}}</p>
        </div>
        </main>
    </div>
    </section>
    <!-- /.content -->
</div>
@endsection