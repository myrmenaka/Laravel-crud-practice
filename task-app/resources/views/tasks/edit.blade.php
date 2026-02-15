@extends('layouts.app')

@section('content')
<h2 class="mb-4">タスク編集</h2>

{{-- エラー表示 --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card p-4 shadow-sm">
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">タイトル</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title', $task->title) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">説明</label>
            <textarea name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">カテゴリ</label>
            <select name="category_id" class="form-select">
                <option value="">選択してください</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">新規カテゴリ</label>
            <input type="text" name="new_category" class="form-control"
                   value="{{ old('new_category') }}">
        </div>

        <button type="submit" class="btn btn-pink w-100">更新</button>
    </form>
</div>

@endsection
