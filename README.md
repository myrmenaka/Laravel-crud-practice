# LARAVEL-CRUD-APP

[Demo Video(https://youtu.be/f4Vi5kJff5I)](https://youtu.be/f4Vi5kJff5I)  

## 1. task-app
簡易タスク管理アプリ

## 2. Description

Laravel を使ったタスク管理アプリ  
CRUD の基本実装を学ぶためのシンプルなサンプルです

## 3. Features

・タスク一覧表示  
・新規作成  
・編集  
・削除  

## 4. Tech Stack

・PHP 8.2.30  
・Laravel 12.44.0  
・SQLite  
・Node.js v24.12.0
・npm 11.6.2
・vite

## 5. Installation

・リポジトリをクローン
```bash
git clone https://github.com/myrmenaka/Laravel-crud-practice.git
cd Laravel-crud-practice
```

・依存パッケージのインストール
```bash
composer install
```

・環境ファイルの作成
```bash
 cp .env.example .env
```

・アプリケーションキーの作成
```bash
php artisan key:generate
```

## 6. Database Setup

・SQLiteファイルを作成
```
touch database/database.sqlite
```

・`.env` をSQLite用に設定
```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

・マイグレーションを実行してテーブル作成
```bash
php artisan migrate
```

## 7. Run the Application
  
・php artisan serve  
・http://localhost:8000/tasks  

## 8. Directory Structure

### Migrate  
・[database/migrations/2026_01_31_060952_create_tasks_table.php](./task-app/database/migrations/2026_01_31_060952_create_tasks_table.php)  

### Model  
・[app/Models/Task.php](./task-app/app/Models/Task.php)  

### Controller  
・[app/Http/Controllers/TaskController.php](./task-app/app/Http/Controllers/TaskController.php)    

### Route  
・[routes/web.php](./task-app/routes/web.php)  

### Views  
・[resources/views/index.blade.php](./task-app/resources/views/index.blade.php)    
・[resources/views/create.blade.php](./task-app/resources/views/create.blade.php)    
・[resources/views/edit.blade.php](./task-app/resources/views/edit.blade.php)    

## 9. Validation Rules

・title: required, max:255  
・description: nullable, string  

※ FormRequestに未分離

## 10. Purpose
 
・Laravel CRUD の基礎理解  

## 11. License
MIT

---
---