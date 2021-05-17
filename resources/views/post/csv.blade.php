@extends('layouts.frame')

@section('content')
<div class="container">
    <form class="form-style-9" method="post" action="{{ route('upload_file')}}" enctype="multipart/form-data">
        @csrf
        <ul>
            <li>
                <label style="float:left">CSV File</label>
                <input type="file" name="uploadfile" class="field-style field-full align-none"
                    placeholder="Browse File" />
                @if( session( 'error' ) )
                <p class="error-msgs">{{ session()->get( 'error' ) }}</p>
                @endif
                @if($errors->any())
                <p class="error-msgs">{{ implode('', $errors->all(':message')) }}</p>
                @endif
            </li>
            <li>
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-1 col-sm-9 col-xs-9">
                        <a href="{{ route('post') }}" class="btn btn-info btn-sm">Back</a>
                    </div>
                    <div class="col-md-1 col-sm-9 col-xs-9">
                        <a href="{{ route('show_upload_file') }}" class="btn btn-danger btn-sm">Clear</a>
                    </div>
                    <div class="col-md-1 col-sm-3 col-xs-3">
                        <input type="submit" name="import" class="btn btn-success btn-sm" value="Confirm" />
                    </div>
                </div>
            </li>
        </ul>
    </form>
</div>
@endsection