@extends('layouts.auth.main')

@section('title')
Register
@endsection

@section('content')
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" role="button" class="h1"><b>Waki</b>Mart</a>
        </div>
        <div class="card-body">

            @if (session('status_success'))
            <div class="alert alert-success">
                <p class="lead p-0 m-0">
                    {{ session('status_success') }}
                </p>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group list-group-item p-0  border-0 bg-transparent">
                    @foreach ($errors->all() as $error)
                    <li class="list-group-item p-0 bg-transparent border-0 text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @else
            <p class="login-box-msg">Register a new membership</p>
            @endif

            <form method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Full name" name="name" value="{{ old('name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
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
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-8">
                        <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
@endsection