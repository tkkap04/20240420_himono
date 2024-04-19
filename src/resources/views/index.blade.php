@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="contact">
    <div class="content">
        <h2 class="page-title">Contact</h2>
    </div>
    <form class="input-form" action="/contacts/confirm" method="post">
    @csrf
        <table class="input-form__table">
            <tr class="input-form__table-row">
                <th class="input-form__table-head">お名前<span class="input-form__table-head--red">※</span></th>
                <td class="input-form__table__input--name">
                    <input class="input-form__table__input" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 山田">
                    
                    <input class="input-form__table__input" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 太郎">
                </td>
            </tr>
                <tr>
                    <td>
                    <div class="input-form__error">
                        @error('last_name')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="input-form__error">
                        @error('first_name')
                            {{ $message }}
                        @enderror
                    </div>
                    </td>
                </tr>

            <tr class="input-form__table-row">
                <th class="input-form__table-head">性別<span class="input-form__table-head--red">※</span>
                </th>
                <td class="input-form__table__input--gender">
                    <label class="input-form__table-gender" >
                    <input class="input-form__table-select" type="radio" name="gender" value="male" value="{{ old('gender') }}" checked />
                    <span class="custom-radio-btn"></span>
                    <span class="custom-radio-btn-tag">男性</span>
                    </label>
                                    
                <label class="input-form__table-gender">
                    <input class="input-form__table-select" type="radio" name="gender" value="female" value="{{ old('gender') }}" />
                    <span class="custom-radio-btn"></span>
                    <span class="custom-radio-btn-tag">女性</span>
                    </label>
                    
                    <label class="input-form__table-gender">
                    <input class="input-form__table-select" type="radio" name="gender" value="other" value="{{ old('gender') }}" />
                    <span class="custom-radio-btn"></span>
                    <span class="custom-radio-btn-tag">その他</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-form__error">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>
            

            <tr class="input-form__table-row">
                <th class="input-form__table-head">メールアドレス<span class="input-form__table-head--red">※</span>
                </th>
                <td>
                    <input class="input-form__table__input" type="email" name="email" value="{{ old('email') }}" placeholder="例: text@example.com">
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>
            

            <tr class="input-form__table-row">
                <th class="input-form__table-head">電話番号<span class="input-form__table-head--red">※</span>
                </th>
                <td class="input-form__table__input--tell">
                    <input class="input-form__table__input--tell1" type="tell" name="tell1" pattern="[0-9]{3}" value="{{ old('tell1') }}" placeholder="080" maxlength="5" >
                    <span class="input-form__hyphen">-</span>
                    
                    <input class="input-form__table__input--tell2" type="tell" name="tell2" pattern="[0-9]{4}" value="{{ old('tell2') }}" placeholder="1234" maxlength="5">
                    <span class="input-form__hyphen">-</span>
                                    
                    <input class="input-form__table__input--tell3" type="tell" name="tell3" pattern="[0-9]{4}" value="{{ old('tell3') }}" placeholder="5678" maxlength="5">
                </td>
            </tr>
            <tr>
                <td>
                    @if ($errors->has('tell1') || $errors->has('tell2') || $errors->has('tell3'))
                    <div class="input-form__error">
                        電話番号を入力してください
                    </div>
                    @endif
                </td>
            </tr>
            
            <tr class="input-form__table-row">
                <th class="input-form__table-head">住所<span class="input-form__table-head--red">※</span>
                </th>
                <td>
                    <input class="input-form__table__input" type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-form__error">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>
            
            <tr class="input-form__table-row">
                <th class="input-form__table-head">建物名
                </th>
                <td>
                    <input class="input-form__table__input" type="text" name="building" value="{{ old('building') }}" placeholder="千駄ヶ谷マンション101">
                </td>
            </tr>

            <tr class="input-form__table-row">
                <th class="input-form__table-head">お問い合わせの種類<span class="input-form__table-head--red">※</span>
                </th>
                <td>
                    <select class="input-form__table-category" name="category_id" value="{{ old('category_id') }}">
                            <option value="1">商品のお届けについて</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-form__error">
                        @error('category_id')
                            {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>
            
            <tr class="input-form__table-row">
                <th class="input-form__table-head">お問い合わせ内容<span class="input-form__table-head--red">※</span>
                </th>
                <td>
                    <textarea class="input-form__table__input" type="text" name="detail" value="{{ old('detail') }}" placeholder="お問い合わせ内容をご記載ください"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-form__error">
                        @error('detail')
                            {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>
        </table>

        <div class="input-form__button">
            <button class="input-form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection