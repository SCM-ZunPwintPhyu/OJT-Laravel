@extends('layouts.frame')

@section('content')
<div class="container">
    <form class="form-style-9" method="post" action="{{ route('post_update', $post->id)}}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <ul>
            <li>
                <label style="float:left">Title*</label>
                <input type="text" name="title" class="field-style field-full align-none"
                    value="{{ old('title',$post->title) }}" />
                <span style="color:red">{!! $errors->first('title','<small>:message</small>')!!} </span>
            </li>
            <li>
                <label style="float:left">Description*</label>
                <textarea class="field-style field-full align-none" name="description"
                    rows="5">{{ old('description',$post->description) }}</textarea>
                <span style="color:red">{!! $errors->first('description','<small>:message</small>')!!} </span>
            </li><br>

            <li>
                <div class="form-group {{ $errors->first('status', 'has-error') }}" style="float:left">
                    <label>Status</label>
                    <label class="switch" name="status" id="status">
                        @if($post->status !== 0 )
                        <input type="checkbox" name="status" id="status" checked>
                        @else
                        <input type="checkbox" name="status" id="status">
                        @endif
                        <span class="slider round"></span>
                    </label>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-1 col-sm-9 col-xs-9">
                        <a href="{{ route('post') }}" class="btn btn-info btn-sm">Cancel</a>
                    </div>
                    <div class="col-md-1 col-sm-3 col-xs-3">
                        <input type="submit" class="btn btn-success btn-sm" value="Create" />
                    </div>
                </div>
            </li>
        </ul>
    </form>
</div>
@endsection