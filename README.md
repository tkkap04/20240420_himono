# 20240420_himono
# アプリケーション名
FashionablyLate

## 環境構築
- Dockerのビルドからマイグレーション、シーディングまでを記述する
1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

## 使用技術(実行環境)
- Laravel Framework 8.83.27
- javascript

## ER図
< - - - 作成したER図の画像 - - - >
https://www.figma.com/file/19ETo8LgLI62PF9VaRRuXB/ER%E5%9B%B3?type=design&node-id=0-1&mode=design&t=DKtzm5KXGlVumqDD-0

## URL
- 開発環境：http://localhost/
- phpmyadmin：http://localhost:8080/