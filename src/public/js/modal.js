// モーダルを開く関数
function openModal() {
    document.getElementById("modal").style.display = "block";

    // モーダル外のクリックイベントを追加
    document.addEventListener("click", closeModalOutside);
}

// モーダルを閉じる関数
function closeModal() {
    document.getElementById("modal").style.display = "none";

    // モーダル外のクリックイベントを削除
    document.removeEventListener("click", closeModalOutside);
}

// モーダル外のクリックイベントハンドラー
function closeModalOutside(event) {
    // クリックされた要素がモーダルでない場合にモーダルを閉じる
    if (event.target.id === "modal") {
        closeModal();
    }
}