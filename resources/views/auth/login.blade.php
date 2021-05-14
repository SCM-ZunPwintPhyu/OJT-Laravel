@extends('layouts.app')
@section('content')
<div class="container">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
    <div class="login-header">
        <p><span style="color:red;font-size:2em">Laravel</span>&nbsp; OJT Project</p>
    </div>
    <div class="login">
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
                <a href="{{ route('welcome') }}"><br><br><br>
                    <input type="button" value="Cancel" class="cancel-button" />
                </a>&nbsp;
                <input type="submit" value="Login" class="login-button" />
        </form>
    </div>
</div>
</div>
@endsection