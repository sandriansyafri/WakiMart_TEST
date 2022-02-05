@extends('layouts.auth.main')

@section('title')
Log In
@endsection
@section('content')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ asset('admin-lte') }}/index2.html" class="h1"><b>Waki</b>Mart</a>
        </div>
        <div class="card-body">

            @if (session('status_error'))
            <div class="alert alert-danger">
                <p class="lead p-0 m-0">
                    {{ session('status_error') }}
                </p>
            </div>
            @elseif($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group list-group-item p-0  border-0 bg-transparent">
                    @foreach ($errors->all() as $error)
                    <li class="list-group-item p-0 bg-transparent border-0 text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @else
            <p class="login-box-msg">Sign in to start your session</p>
            @endif

            <form action="" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-8">
                        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection