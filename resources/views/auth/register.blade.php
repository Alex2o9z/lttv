@extends('client.layouts.master_auth')
@section('title','Đăng kí thành viên mới')
@section('content')

    <div class="sign section--bg" data-bg="{{asset('public/frontend/img/section/section.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- registration form -->
                        <form class="sign__form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <a href="{{ route('home') }}" class="sign__logo">
                                <!-- <img src="img/logo.svg" alt=""> -->
                                <h1><span class="logo-text-1">LT</span><span class="logo-text-2">tv</span></h1>
                            </a>

                            <div class="sign__group">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="sign__group">
                                <input type="text" name="name" class="sign__input @error('name') is-invalid @enderror" placeholder="Name"  value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>

                            <div class="sign__group">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="sign__group">
                                <input type="email" name="email" class="sign__input @error('email') is-invalid @enderror" placeholder="Email"  value="{{ old('email') }}" required autocomplete="email">
                            </div>

                            <div class="sign__group">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="sign__group">
                                <input type="password" name="password" class="sign__input @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                            </div>

                            <div class="sign__group">
                                <input id="password-confirm" type="password" class="sign__input" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                            </div>

                            <div class="sign__group sign__group--checkbox">
                                <input id="remember" name="remember" type="checkbox" checked="checked">
                                <label for="remember">Đồng ý với  <a href="#">Điều khoản và Chính sách của LTtv</a></label>
                            </div>
                            
                            <button type="submit" class="sign__btn" type="button">Đăng kí</button>

                            <span class="sign__text">Đã có tài khoản? <a href="signin.html">Đăng nhập nào!</a></span>
                        </form>
                        <!-- registration form -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content-backup')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
