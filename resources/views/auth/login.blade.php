@extends('layouts.login-app')

@section('title', 'Login Admin')
@section('content')

<div class="login-body">
    <div class="card-body" style="max-width: 450px">

        @error('errors')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        @error('throttle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="sign-in-form">

            <form action="{{ route('loginProccess') }}" method="post">
                @csrf
                <div class="container-xxl">
                    <div class="authentication-wrapper authentication-basic container-p-y">
                      <div class="authentication-inner">
                        <!-- Register -->
                            <!-- Logo -->
                            <div class="app-brand justify-content-center">
                         
                            </div>
                            <!-- /Logo -->
                            <h4 class="mb-2">Welcome to Login Admin !</h4>
                            <p class="mb-4">Please sign-in to your account</p>
              
                            <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                              <div class="mb-3">
                                <label for="email" class="form-label d-flex">Email</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="email"
                                  name="email"
                                  placeholder="Enter your Email"
                                  autofocus
                                />
                              </div>
                              <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                  <label class="form-label" for="password">Password</label>
                                  <a href="auth-forgot-password-basic.html">
                                    <small>Forgot Password?</small>
                                  </a>
                                </div>
                                <div class="input-group input-group-merge">
                                  <input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="********"
                                    aria-describedby="password"
                                  />
                                </div>
                              </div>
                              <div class="mb-3">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="remember-me" />
                                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                              </div>
                              <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                              </div>
                            </form>
              
                            <p class="text-center">
                              <span>New on our platform?</span>
                              <a href="auth-register-basic.html">
                                <span>Create an account</span>
                              </a>
                            </p>
                          </div>
                        <!-- /Register -->
                      </div>
                  </div>
            </form>

        </div>
    </div>
 
</div>
    
@endsection