@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="confirm">
    <h2 class="page-title">Confirm</h2>
    <div class="confirm-content">
        <form class="confirm-form" action="/confirm" method="post">
            @csrf
            <table class="confirm-table"> 
                <tr class="confirm-table__row">
                    <th class="confirm-table__head">お名前</th>
                    <td colspan="2" class="confirm-table__content">
                        <input class="confirm-table__input" type="text" value="{{ $contact['last_name'] ?? '' }} . {{ $contact['first_name' ] ?? '' }}" readonly></td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__head">性別</th>
                    <td class="confirm-table__content">
                        <input class="confirm-table__input" type="text" value="{{ $contact['gender'] ?? ''}}" readonly> </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__head">メールアドレス</th>
                    <td class="confirm-table__content">
                        <input class="confirm-table__input" type="text" value="{{ $contact['email'] ?? '' }}" readonly> </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__head">電話番号</th>
                    <td colspan="3" class="confirm-table__content">
                        <input class="confirm-table__input" type="text" value="{{ $contact['tell1'] ?? '' }}{{ $contact['tell2'] ?? ''}}{{ $contact['tell3' ] ?? ''}} "readonly> </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__head">住所</th>
                    <td class="confirm-table__content">
                        <input class="confirm-table__input" type="text" value="{{ $contact['address'] ?? ''}}" readonly> </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__head">建物名</th>
                    <td class="confirm-table__content">
                        <input class="confirm-table__input" type="text" value="{{ $contact['building'] ?? ''}}" readonly> </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__head">お問い合わせの種類</th>
                    <td class="confirm-table__content">
                        <input class="confirm-table__input" type="text" value="{{ $contact['category_id'] ?? ''}}" readonly> </td>
                </tr>

                <tr class="confirm-table__row-detail">
                    <th class="confirm-table__head">お問い合わせ内容</th>
                    <td class="confirm-table__content">
                        <input class="confirm-table__input" type="text" value="{{ $contact['detail'] ?? ''}}" readonly> </td>
                </tr>
            </table>
            <div class="confirm-form__button-content">
                <div class="confirm-form__button-submit-box">
                    <button class="confirm-form__button-submit" type="submit">送信</button>
                </div>
                <div class="confirm-form__button-return-box">
                    <a class="confirm-form__button-return" href="/">修正</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection