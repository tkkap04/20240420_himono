<div class="modal-container">
  <div class="modal-body">
    <button type="button" class="modal-close">close</button>
    <div class="modal-content">
        <table class="modal-table">
            <tr class="modal-table__row">
                <th class="modal-table__head">お名前</th>
                <td class="modal-table__dexcription">{{ $content->name }}</td>
            </tr>
            <tr class="modal-table__row">
                <th class="modal-table__head">性別</th>
                <td class="modal-table__dexcription">{{ $content->gender }}</td>
            </tr>
            <tr class="modal-table__row">
                <th class="modal-table__head">メールアドレス</th>
                <td class="modal-table__dexcription">{{ $content->email }}</td>
            </tr>
            <tr class="modal-table__row">
                <th class="modal-table__head">電話番号</th>
                <td class="modal-table__dexcription">{{ $content->tell }}</td>
            </tr>
            <tr class="modal-table__row">
                <th class="modal-table__head">住所</th>
                <td class="modal-table__dexcription">{{ $content->address }}</td>
            </tr>
            <tr class="modal-table__row">
                <th class="modal-table__head">建物名</th>
                <td class="modal-table__dexcription">{{ $content->buildiing }}</td>
            </tr>
            <tr class="modal-table__row">
                <th class="modal-table__head">お問い合わせの種類</th>
                <td class="modal-table__dexcription">{{ $content->category_id }}</td>
            </tr>
            <tr class="modal-table__row">
                <th class="modal-table__head">お問い合わせ内容</th>
                <td class="modal-table__dexcription">{{ $content->detail }}</td>
            </tr>
        </table>
    </div>
    <button type="submit">削除</button>
  </div>
</div>