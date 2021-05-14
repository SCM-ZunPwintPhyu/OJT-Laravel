@extends('layouts.frame')
@section('content')
<div class="container">
    <!-- Add Button -->
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
    <!-- User Form -->
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
        <div class="col-md-2" style="float:left">
            <p style="font-size:15px"> Count:: {{$count}}</p>
        </div>
        </main>
    </div>
    </section>
    <!-- /.content -->
</div>
@endsection