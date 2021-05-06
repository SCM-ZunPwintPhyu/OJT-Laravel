@extends('layouts.app')

@section('content')
<div class="container">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
    <div class="login-header">
        <h5>Laravel OJT Project</h5>
    </div>
    <div class="login">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="login-form">
                <!-- For Name -->
                <h3>&nbsp; Name:</h3>
                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Mrs. Name">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <!-- For Email -->
                <h3>&nbsp; E-Mail:</h3>
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email"  placeholder="Here@gmail.com">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <!-- For Password -->
                <h3>&nbsp; Password:</h3>
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                     required autocomplete="new-password"  placeholder="***********">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <h3>&nbsp; Confirm Password:</h3>
                <input id="password-confirm" type="password" name="password_confirmation"
                required autocomplete="new-password"  placeholder="***********">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <a href="http://localhost/ojt_project/public/"><br><br><br>
                    <input type="button" value="Cancel" class="cancel-button" />
                </a>&nbsp;
                <input type="submit" value="Register" class="login-button" />
        </form>
    </div>
</div>
</div>
@endsection