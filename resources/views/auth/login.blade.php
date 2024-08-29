@extends('layouts.login-app')

@section('title', 'Login Admin')
@section('content')

<div class="login-body">
    <div class="card-body" style="max-width: 400px">
        <div class="sign-in-form">
            <h2>Admin Login</h2>

            <form action="{{ route('loginProccess') }}" method="post">
                @csrf
                
                <input type="email" placeholder="Email" name="email" id="email" required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="password" placeholder="Password" name="password" id="password" required>
                @error('Password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <button type="submit">Sign In</button>
            </form>

        </div>
    </div>
 
</div>
    
@endsection