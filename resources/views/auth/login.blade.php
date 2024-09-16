@extends('layouts.login-app')

@section('title', 'Login Admin')
@section('content')

<div class="login-body">
    <div class="card-body" style="max-width: 400px">

        @error('errors')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        @error('throttle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="sign-in-form">

            <h2>Admin Login</h2>

            <form action="{{ route('loginProccess') }}" method="post">
                @csrf
                
                <input type="email" placeholder="Email" name="email" id="email" required>

                <input type="password" placeholder="Password" name="password" id="password" required>

                <button type="submit">Sign In</button>
            </form>

        </div>
    </div>
 
</div>
    
@endsection