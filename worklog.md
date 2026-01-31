# 作業ログ
※ Laravel Installer は無し

## ■ プロジェクト作成

### プロジェクトの生成
※ 作成するディレクトリに移動忘れずに  
```
composer create-project laravel/laravel task-app
```

### プロジェクト移動
```
cd task-app
```

※ .envは自動生成  

### プロジェクトへ移動
```
cd task-app
```

### アプリキー生成
```
php artisan key:generate
```

### 新規ターミナルでローカルサーバ起動
```
php artisan serve
```

## ■ マイグレーション

### tasksテーブルの作成
```
php artisan make:migration create_tasks_table --create=tasks
```

### 生成されたすると、database/migrations/xxxx_create_tasks_table.php に、カラムとデータを追加  
※今回のDB設計  
・id / int / primary key  
・title / string （タスク名）  
・description / text （タスク詳細）null可  
・created_at / timestamp  
・updated_at / timestamp  
```
$table->string('title');
$table->text('description')->nullable();
```
これだけ追加

### 記述後、マイグレーション実行
```
php artisan migrate
```
→ tasksテーブル作成完了

## ■ モデルとコントローラーの生成

### tasksテーブルに紐づくモデルとリソースコントローラーの作成
```
php artisan make:model Task -cr
```

## ■ モデル  app/Models/Task.php

### fillable追加
・title  
・description

## ■ コントローラー  app/Http/Controllers/TaskController.php

### TaskControllerに処理を追加
・タスク一覧表示（R）index  
・タスク新規登録（C）create/store  
・タスク編集（U）edit/update  
・タスク削除（D）destroy

## ■ ルーティング設定

### routes/web.php に追加
```
Route::resource('Task', TaskController::class);
```

## ■ Blade作成  resources/views/

・index.blade.php  
・create.blade.php  
・edit.blade.php  









































