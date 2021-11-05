@extends('client.layout.layout')
@section('title')
    Login Page
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('gagal'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('gagal') }}
                            </div>
                        @endif
                      <blockquote class="blockquote mb-0">
                        <p class="text-center">Login Pengguna</p>
                        <form action="{{ route('client.login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password">
                            </div>
                            <button class="btn bg-blue text-white">LOGIN</button>
                        </form>
                        <a href="#">Belum Punya Akun?</a>
                      </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection