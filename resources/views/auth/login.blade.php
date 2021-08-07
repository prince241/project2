

@extends('auth.layout')
@section('content')
    
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="../../../app-assets/images/pages/login.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            
                                            <div class="card-title">
                                                <h4 class="mb-0">Login</h4>
                                                @if (session()->has('success'))
                                                <div class="alert alert-success">
                                                    <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
                                                    <b>Success:</b>
                                                    @if (is_array(session('success')))
                                                    <ul class='m-0'>
                                                        @foreach(session('success') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                    @else
                                                    {{ session('success') }}
                                                    @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <p class="px-2">Welcome back, please login to your account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form action="{{ route('login') }}" class="client-side-validation form-horizontal" method="POST">
                                                    @csrf
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" name="email" class="form-control" id="email" placeholder="Email" required >
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="email">Email</label>
                                                        @error('email')
                                                        <i style="color: red; font-size:small">{{ $message }}</i>
                                                    @enderror
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" name="password" class="form-control" id="user-password" placeholder="Password" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                      
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                        @error('password')
                                                        <i style="color: red; font-size:small">{{ $message }}</i>
                                                    @enderror

                                                        </div>
                                                        <div class="text-right"><a href="{{ route('password.reset') }}" class="card-link">Forgot Password?</a></div>

                                                    </div>
                                                    <a href="{{ route('register') }}" class="btn btn-outline-primary float-left btn-inline">Register</a>
                                                    
                                                    <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
                                            <div class="divider">  
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection
