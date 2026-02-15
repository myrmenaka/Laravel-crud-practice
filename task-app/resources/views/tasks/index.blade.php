@extends('layouts.app')

@section('content')
<h2 class="mb-4">タスク一覧</h2>

{{-- 成功メッセージ --}}
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- 検索フォーム --}}
<div class="card p-3 mb-4 shadow-sm">
    <form method="GET" action="{{ route('tasks.index') }}" class="row g-3">

        <div class="col-md-4">
            <input type="text" name="keyword" class="form-control"
                   value="{{ request('keyword') }}" placeholder="キーワード">
        </div>

        <div class="col-md-4">
            <select name="category_id" class="form-select">
                <option value="">すべてのカテゴリ</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <button type="submit" class="btn btn-pink w-100">検索</button>
        </div>

    </form>
</div>

{{-- 一覧 --}}
<div class="card shadow-sm">
    <table class="table table-hover mb-0">
        <thead class="table-pink">
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>説明</th>
                <th>カテゴリ</th>
                <th>操作</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->category->name ?? '未分類' }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-outline-pink btn-sm">編集</a>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-pink btn-sm"
                            onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
