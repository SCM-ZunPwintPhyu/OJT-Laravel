@extends('layouts.frame')

@section('content')
<div class="container">
    <form class="form-style-9" method="post" action="{{ route('conf_create')}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <ul>
            <li>
                <label style="float:left">Title*</label>
                <input type="text" name="title" class="field-style field-full align-none" placeholder="Title"
                    value="{{ old('title') }}" />
                <span style="color:red">{!! $errors->first('title','<small>:message</small>')!!} </span>
            </li>
            <li>
                <label style="float:left">Description*</label>
                <textarea class="field-style field-full align-none" name="description" rows="5"
                    placeholder="Description">{{ old('description') }}</textarea>
                <span style="color:red">{!! $errors->first('description','<small>:message</small>')!!} </span>
            </li><br>
            <li>
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-1 col-sm-9 col-xs-9">
                        <a href="{{ route('post') }}" class="btn btn-info btn-sm">Back</a>
                    </div>
                    <div class="col-md-1 col-sm-9 col-xs-9">
                        <a href="{{ route('post_create') }}" class="btn btn-danger btn-sm">Clear</a>
                    </div>
                    <div class="col-md-1 col-sm-3 col-xs-3">
                        <input type="submit" class="btn btn-success btn-sm" value="Confirm" />
                    </div>
                </div>
            </li>
        </ul>
    </form>
</div>
@endsection