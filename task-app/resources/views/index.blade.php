<h1>タスク一覧</h1>

<a href="{{ route('tasks.create') }}">新規タスク作成</a>

{{-- 成功メッセージ --}}
@if (session('success'))
    <p style='color: green;'>{{ session('success') }}</p>
@endif

<ul>
    @foreach ($tasks as $task)
        <li>
            <strong>{{ $task->title }}</strong><br>
            {{ $task->description }}
            
            <br>

            {{-- 編集  --}}
            <a href="{{ route('tasks.edit', $task->id) }}">編集</a>

            {{-- 削除 --}}
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
            </form>
        </li>
        <hr>
    @endforeach
</ul>

{{-- ページネーション --}}
{{ $tasks->links() }}
