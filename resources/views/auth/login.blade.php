@extends('layouts.login-app')

@section('content')

<div class="login-body">
    <div class="card-body" style="max-width: 400px">
        <div class="sign-in-form">
            <h2>Sign in</h2>
            <form action="{{ route('loginProccess') }}" method="post">
                @csrf
                <input type="email" placeholder="Email" name="email" id="email" required>
                <input type="password" placeholder="Password" name="password" id="password" required>
                <button type="submit">Sign In</button>
            </form>
            <input class="form-check-input" type="checkbox" id="remember-me">
            <label class="form-check-label" for="remember-me"> Remember Me </label>
          
            <p class="sign-up-text">Don't have an account? <a href="#">Sign up</a></p>
        </div>
    </div>
 
</div>
    
@endsection