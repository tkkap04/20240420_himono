@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}" />
@endsection

@section('action')
<div class="header-inner__action-button">
    <a class="header-inner__action-button-submit" href="/login">login</a>
</div>
@endsection

@section('content')
<div class="register">
    <h2 class="page-title">Register</h2>
    <div class="register-form">
        <form class="register-form__input" action="/register" method="post">
        @csrf
            <div class="register-form__input-box-top">
                <div class="register-form__input-box">
                    <p class="register-form__input-title">お名前</p>
                    <p class="input-form__error">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <input class="register-form__input-item" type="text" name="name" placeholder="例: 山田　太郎" value="{{ old('name') }}">

                <div class="register-form__input-box">
                    <p class="register-form__input-title">メールアドレス</p>
                    <p class="input-form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <input class="register-form__input-item" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                
                <div class="register-form__input-box">
                    <p class="register-form__input-title">パスワード</p>
                    <p class="input-form__error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <input class="register-form__input-item" type="password" name="password" placeholder="例: coachtech1106">
            </div>
            <div class="register-form__input-box-bottom">
                <button class="register-form__input-submit" type="submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection