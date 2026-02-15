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

### 生成されたすると、`database/migrations/xxxx_create_tasks_table.php` に、カラムとデータを追加  
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

---
---

## ■ categoriesテーブル作成

```
cd task-app
```
```
php artisan make:migration create_categories_table
```
migrate実行
```
php artisan migrate
```
## ■ Categoryモデル作成
```
php artisan make:model Category
```
リレーション記述
```
class Category extends Model
{
    protected $fillable = ['name'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
```
※ 1対多の親側

## ■ tasksテーブルに外部キー追加するマイグレーション
```
php artisan make:migration add_category_id_to_tasks_table
```
```
$table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
```
→ 外部キー制約 null許可 +  
onDelete('set null') → 親削除時子は残して、外部キーのみNULL
```
php artisan migrate
```
## ■ Taskモデルにリレーション追加
```
public function category()
{
    return $this->belongsTo(Category::class);
}
```
※ 1対多の子側

## ■ FormRequest作成
```
php artisan make:request TaskRequest
```
'title'、'description'の他、  
既存カテゴリと新規カテゴリのバリデーション記述  

## コントローラー編集
- 使用モデル、FormRequestのuse文追加  
    ※ 忘れがちになってるから注意  
- store/update : カテゴリ作成ロジック  
- index : キーワード + カテゴリ検索  
- create/edit : categoriesを渡す  

## ■ Blade編集
- `index.blade.php` : 検索フォーム追加 + カテゴリ表示  
- `create.blade.php` : カテゴリ選択 + 新規カテゴリ作成  
- `edit.blade.php` : カテゴリ編集  










































