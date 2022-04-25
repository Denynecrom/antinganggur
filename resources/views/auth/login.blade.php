@extends('visitor.master')

@section('content')

<body>
    <!-- <img class="wave" src="images/loper/.png"> -->
    <div class="container-loper">
        <div class="img">
            <img src="images/loser/loser.svg">
        </div>
        <div class="login-content">
            <form action="/postlogin" method="POST">
                @csrf
                <img src="images/loper/avatar2.svg">
                <h2 class="title-loper">Masuk Akun {{ $type_tampil }}</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="text" name="email" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" name="password" class="input">
                    </div>
                </div>
                {{-- <a href="#" class="forgot-password">Forgot Password?</a> --}}
                <input type="hidden" name="type" value="{{ $type }}">
                <button type="submit" class="btn-loper" value="masuk">Masuk</button>
                <h6>Buat Akun Baru</h6>
                <a href="/register?type={{ $type }}" class="btn-loper2">Daftar Disini</a>
                @if (session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @endif
            </form>
        </div>
    </div>
</body>
@endsection