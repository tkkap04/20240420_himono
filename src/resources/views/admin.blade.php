@extends('layouts.app')

@if(Auth::check())

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('action')
    <form class="logout__form" action="/logout" method="post">
    @csrf
        <buttons class="header-inner__action-button-submit" type="submit">logout</buttons>
    </form>
@endsection

@section('content')
<div class="admin">
    <h2 class="page-title">Admin</h2>
    <!-- 検索フォーム -->
    <form class="admin__search-form" action="/admin/search" method="get">
    @csrf
        <div class="admin__search-form__item">
            <!-- キーワード検索 -->
            <div class="admin__search-form__item-text">
                <input class="admin__search-form__item-text-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
            </div>
            <!-- 性別検索 -->
            <div class="admin__search-form__item-gender">
                <select class="admin__search-form__item-gender-input" name="gender" id="gender">
                    <option value="" disabled selected>性別</option>
                    <option value="all">全て</option>
                    @foreach($contacts as $contact)
                        @if($contact->gender)
                            <option value="{{ $contact->gender }}">{{ $contact['gender'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <!-- カテゴリ検索 -->
            <div class="admin__search-form__item-category">
                <select class="admin__search-form__item-category-input" name="category_id" >
                    <option value="" disabled selected>お問い合わせの種類</option>
                    @foreach($contacts as $contact)
                        @if($contact->category)
                            <option value="{{ $contact->category_id }}">{{ $contact->category->content }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <!-- 日付検索 -->
            <div class="admin__search-form__item-date">
                <input class="admin__search-form__item-date-input" type="date" name="search_date">
            </div>
            <!-- 検索ボタン -->
            <div class="admin__search-form__bottun-search">
                <button class="admin__search-form__button-submit" type="submit" >検索</button>
            </div>
            <div class="admin__search-form__bottun-reset">
                <button class="admin__search-form__button-reset" type="reset" >リセット</button>
            </div>
        </div>
    </form>
    
    <!-- 中段 -->
    <div class="middle">
        <!-- エクスポート -->
        <div class="middle__csv">
            <div class="middle__csv-button">
                <p>エクスポート</p>
            </div>

        </div>

        <!-- ページネーション -->
        <div class="middle__pagination">
            @if ($contacts->onFirstPage())
            <a class="middle__pagination-box">
                <div class="middle__pagination-number">&lt;</div>
            </a>
            @else
            <a class="middle__pagination-box"  href="{{ $contacts->previousPageUrl() }}" rel="prev">
                <div class="middle__pagination-number">&lt;</div>
            </a>
            @endif

            @for ($i = 1; $i <= $contacts->lastPage(); $i++)
                @if ($i == $contacts->currentPage())
                <a class="middle__pagination-box--current">
                    <div class="middle__pagination-number">{{ $i }}</div>
                </a>
                @else
                <a class="middle__pagination-box"  href="{{ $contacts->url($i) }}">
                    <div class="middle__pagination-number">{{ $i }}</div>
                </a>
                @endif
            @endfor

            @if ($contacts->hasMorePages())
            <a class="middle__pagination-box"  href="{{ $contacts->nextPageUrl() }}" rel="next">
                <div class="middle__pagination-number">&gt;</div>
            </a>
            @else
            <a class="middle__pagination-box">
                <div class="middle__pagination-number">&gt;</div>
            </a>
            @endif
        </div>
    </div>

    <!-- 検索結果表示 -->
    <div class="admin-list">
        <table class="admin-list__table">
            <tr class="admin-list__table-header">
                <th class="admin-list__table-header__item-name">お名前</th>
                <th class="admin-list__table-header__item-gender">性別</th>
                <th class="admin-list__table-header__item-email">メールアドレス</th>
                <th class="admin-list__table-header__item-category">お問い合わせの種類</th>
                <th class="admin-list__table-header__item-detail">　　</th>
            </tr>

            @foreach($contacts as $contact)
            <tr class="admin-list__table-row">
                <td class="admin-list__table-header__description">{{ $contact['last_name'] }}　{{ $contact['first_name'] }}</td>
                <td class="admin-list__table-header__description">{{ $contact['gender'] }}</td>
                <td class="admin-list__table-header__description">{{ $contact['email'] }}</td>
                <td class="admin-list__table-header__description">{{ $contact->category->content }}</td>
                <td class="admin-list__table-header__description">
                    <label class="admin-list__table-header__description-button" for="modal-toggle" onclick="openModal()">詳細</label>
                </td>
            </tr>
            @endforeach
        </table>

        <!-- モーダル -->
        @foreach($contacts as $contact)
        <div class="modal" id="modal" onclick="closeModalOutside(event)">
            <div class="modal-content" onclick="event.stopPropagation()">
                <label class="modal-close" for="modal-toggle" onclick="closeModal()">&times;</label>
                
                <table class="delete-table"> 
                    <tr class="delete-table__row">
                        <th class="delete-table__head">お名前</th>
                        <td colspan="2" class="delete-table__content">
                            <input class="delete-table__input" type="hidden" value="{{ $contact['id']}}" >{{ $contact['last_name'] }}  {{ $contact['first_name' ] }} </td>
                    </tr>

                    <tr class="delete-table__row">
                        <th class="delete-table__head">性別</th>
                        <td class="delete-table__content">
                            <input class="delete-table__input" type="hidden" value="{{ $contact['id']}}" >{{ $contact['gender'] }} </td>
                    </tr>

                    <tr class="delete-table__row">
                        <th class="delete-table__head">メールアドレス</th>
                        <td class="delete-table__content">
                            <input class="delete-table__input" type="hidden" value="{{ $contact['id']}}" >{{ $contact['email'] }} </td>
                    </tr>

                    <tr class="delete-table__row">
                        <th class="delete-table__head">電話番号</th>
                        <td colspan="3" class="delete-table__content">
                            <input class="delete-table__input" type="hidden" value="{{ $contact['id']}}" >{{ $contact['tell1'] }}{{ $contact['tell2'] }}{{ $contact['tell3' ]}} </td>
                    </tr>

                    <tr class="delete-table__row">
                        <th class="delete-table__head">住所</th>
                        <td class="delete-table__content">
                            <input class="delete-table__input" type="hidden" value="{{ $contact['id']}}" >{{ $contact['address']}} </td>
                    </tr>

                    <tr class="delete-table__row">
                        <th class="delete-table__head">建物名</th>
                        <td class="delete-table__content">
                            <input class="delete-table__input" type="hidden" value="{{ $contact['id']}}" >{{ $contact['building'] }} </td>
                    </tr>

                    <tr class="delete-table__row">
                        <th class="delete-table__head">お問い合わせの種類</th>
                        <td class="delete-table__content">
                            <input class="delete-table__input" type="hidden" value="{{ $contact['id']}}" >{{ $contact->category->content }} </td>
                    </tr>

                    <tr class="delete-table__row-detail">
                        <th class="delete-table__head">お問い合わせ内容</th>
                        <td class="delete-table__content">
                            <input class="delete-table__input" type="hidden" value="{{ $contact['id']}}" >{{ $contact['detail'] }} </td>
                    </tr>
                </table>
                    <div class="delete-form__button-content">
                        <form class="delete-form" action="/admin/delete" method="post">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="id" value="{{ $contact['id'] }}" class="delete-form__button-submit-box">
                        <button class="delete-form__button-submit" type="submit">削除</button>
                    </div>
                </div>
            </div>
            <script src="{{ asset('js/modal.js') }}"></script>
            @endforeach
        </div>
    </div>
</div>
@endsection

@endif