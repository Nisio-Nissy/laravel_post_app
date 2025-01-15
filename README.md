# Laravel Post App

Laravel Post App は、投稿管理の基本機能を備えたシンプルなアプリケーションです。  
認証機能やCRUD処理、検索機能など、Laravelを使用した基本的なWebアプリケーションの構築スキルを学ぶことを目的としています。

## 主な機能
- **ログイン認証**（自作認証機能）
- **投稿管理**（CRUD: 作成、表示、編集、削除）
- **検索機能**（キーワード検索）
- **ページネーション**（投稿一覧の分割表示）
- **リレーションとSQL設計**

## 使用技術
- Laravel 10.x
- MySQL
- HTML / CSS
- Bootstrap（または他のCSSフレームワークを使用している場合）

## セットアップ手順
1. このリポジトリをクローンします:
   ```bash
   git clone https://github.com/Nisio-Nissy/laravel_post_app.git
   cd laravel_post_app

2. 必要な依存パッケージをインストールします:
    ```bash
    composer install
    npm install
    npm run dev

3. .env.example を .env にコピーし、環境変数を設定します:
    ```bash
    cp .env.example .env

4. アプリケーションキーを生成します:
    ```bash
    php artisan key:generate

5. マイグレーションとデータの初期化を実行します:
    ```bash
    php artisan migrate --seed

6. ローカル開発サーバーを起動します:
    ```bash
    php artisan serve

## 今後の改善点
- UI/UXの向上
- APIを活用した機能の追加
- ユーザーごとのカスタマイズ機能




