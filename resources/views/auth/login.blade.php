@extends('layouts.app')

@section('content')
<div class="container">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
    <div class="login-header">
            <h5>Laravel OJT Project</h5>
    </div>
    <div class="login"><br><br>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login-form">
                <h3>&nbsp; E-Mail:</h3>
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Here@gmail.com">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <h3>&nbsp; Password:</h3>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="*********">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <a class="sign-up" href="{{ route('register') }}">Sign Up!</a>


                <!-- <div class="row">
                    <div class="col-sm-6 col-form-label">
                    <a href="http://localhost/ojt_project/public/"><br><br><br>
                        <input type="button" value="Cancel" class="cancel-button" />
                    </a>
                    </div>
                    <div class="col-sm-6 col-form-label">
                    <a href="http://localhost/ojt_project/public/"><br><br><br>
                        <input type="button" value="Cancel" class="cancel-button" />
                    </a>
                    </div>
                    <div class="col-sm-6 col-form-label">
                        <input type="submit" value="Login" class="login-button" />
                    </div>
                </div> -->

                <a href="http://localhost/ojt_project/public/"><br><br><br>
                    <input type="button" value="Cancel" class="cancel-button" />
                </a>&nbsp;
                <input type="submit" value="Login" class="login-button" />
        </form>
    </div>
</div>
</div>
@endsection