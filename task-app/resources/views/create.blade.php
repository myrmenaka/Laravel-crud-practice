<h1>新規タスク作成</h1>

{{-- バリデーションエラーメッセージの表示 --}}
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div>
        <label>タイトル:</label>
        <input type="text" name="title" value="{{ old('title') }}" required>
    </div>
    <div>
        <label>詳細</label>
        <textarea name="description">{{ old('description') }}</textarea>
    </div>
    <button type="submit">登録</button>
</form>

<br>
<a href="{{ route('tasks.index') }}">タスク一覧へ戻る</a>
