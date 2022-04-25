@extends('visitor.master')

@section('content')

<body>
    <!-- <img class="wave" src="images/loper/.png"> -->
    <div class="container-loper">
        <div class="img">
            <img src="images/loser/loser.svg">
        </div>
        <div class="login-content">
            <form method="POST" action="{{ route('postregister') }}">
                @csrf
                <h2 class="title-loper">Register {{ $type_tampil }}</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Nama</h5>
                        <input type="text" id="name" class="input @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="input-div one">
                    <div class="i">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="input-div pass">
                    <div class="i">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="input-div pass">
                    <div class="i">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Confirm Password</h5>
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <input type="hidden" name="type" value="{{ $type }}">

                <button type="submit" class="btn-loper" value="masuk">Register</button>
            </form>
        </div>
    </div>
</body>
@endsection