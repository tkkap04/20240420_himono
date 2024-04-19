@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}" />
@endsection

@section('action')
<div class="header-inner__action-button">
    <a class="header-inner__action-button-submit" href="/register">register</a>
</div>
@endsection

@section('content')
<div class="login">
    <h2 class="page-title">Login</h2>
    <div class="login-form">
        <form class="login-form__input" action="/login" method="post">
        @csrf
            <div class="login-form__input-box-top">
                <div class="login-form__input-box">
                    <p class="login-form__input-title">メールアドレス</p>
                    <p class="input-form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <input class="login-form__input-item" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                
                <div class="login-form__input-box">
                    <p class="login-form__input-title">パスワード</p>
                    <p class="input-form__error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <input class="login-form__input-item" type="password" name="password" placeholder="例: coachtech1106">
            </div>
            <div class="login-form__input-box-bottom">
                <button class="login-form__input-submit" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection