<h1>タスク編集</h1>

{{-- バリデーションエラー表示 --}}
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>タイトル</label><br>
        <input type="text" name="title" value="{{ old('title', $task->title) }}">
    </div>

    <div>
        <label>詳細</label><br>
        <textarea name="description">{{ old('description', $task->description) }}</textarea>
    </div>

    <button type="submit">更新</button>
</form>

<hr>

{{-- 削除フォーム --}}
<form action="{{ route('tasks.destroy', $task) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
</form>

<br>
<a href="{{ route('tasks.index') }}">タスク一覧に戻る</a>