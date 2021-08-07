@extends('auth.layout')
@section('content')
<div class="container h-100">
    <div class="row h-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">Reset password</h1>
                    <p class="lead">
                        Enter your email to reset your password.
                    </p>
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
                        <b>password sent successfully</b>
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
                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-4">
                            <form action= {{ route('password.reset') }} method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email">
                                </div>
                                @error('email')
                                <i style="color: red; font-size:small">{{ $message }}</i>
                            @enderror
                                <div class="text-center mt-3">
                                    {{-- <a href="index.html" class="btn btn-lg btn-primary">Reset password</a> --}}
                                     <button type="submit" class="btn btn-lg btn-primary">Reset password</button> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection