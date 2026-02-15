# LARAVEL-CRUD-APP

[Demo Video(2026-01-31)](https://youtu.be/f4Vi5kJff5I)  
[Demo Video(2026-02-15)](https://youtu.be/FtNuGI3m3LU)  

## [更新ログ](./CHANGELOG.md)  

## task-app
簡易タスク管理アプリ

## Description

このアプリは、Laravel を使った CRUD（作成・読み取り・更新・削除）の学習用タスク管理アプリです。  
タスクとカテゴリを管理でき、検索機能やカテゴリ別フィルタも備えています。

## 機能一覧

### タスク機能
- タスクの新規作成 
- タスクの編集 
- タスクの削除 
- タスク一覧表示 
- キーワード検索 
- カテゴリ別フィルタ 
### カテゴリ機能 
- カテゴリの新規作成 
- カテゴリの編集 
- カテゴリの削除 
- カテゴリ一覧表示 
- タスク作成・編集時にカテゴリを選択可能 
- カテゴリ削除時、紐づくタスクの `category_id` は自動で `null`（未分類）に設定

## 使用技術

・PHP 8.2.30  
・Laravel 12.44.0  
・SQLite  
・Node.js v24.12.0  
・npm 11.6.2  
・vite（CSS/JS ビルド）  
・Bootstrap 5

## セットアップ手順

### リポジトリをクローン
```bash
git clone https://github.com/myrmenaka/Laravel-crud-practice.git
cd task-app
```

### PHP依存パッケージのインストール
```bash
composer install
```

### 環境ファイルの作成
```bash
 cp .env.example .env
```

### アプリケーションキーの作成
```bash
php artisan key:generate
```

### データベース設定（SQLiteファイルを作成）
```
touch database/database.sqlite
```

### `.env` をSQLite用に設定
```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

### マイグレーションを実行してテーブル作成
```bash
php artisan migrate
```

## フロントエンド
### 依存関係インストール
```
npm install
```
### 開発サーバー起動
```
npm run dev
```

## サーバー起動
```
php artisan serve  
http://localhost:8000/tasks  
```

## 画面一覧
・タスク一覧  
・タスク作成  
・タスク編集  
・カテゴリ一覧  
・カテゴリ作成  
・カテゴリ編集  

## 今後の拡張予定
・タスクの並び替え  
・API化  
・認証機能（ログイン）

## 目的
Laravel の基本的な CRUD 処理、
バリデーション、
FormRequest の分離、
Vite の利用、
外部キー制約の理解
などを実践的に学ぶためのプロジェクト

---
---