@extends('layouts.app')

@section('content')
<h2 class="mb-4">カテゴリ編集</h2>

<div class="card p-4 shadow-sm">
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">カテゴリ名</label>
            <input type="text" name="name" class="form-control"
                   value="{{ $category->name }}" required>
        </div>

        <button class="btn btn-pink">更新</button>
        <a href="{{ route('categories.index') }}" class="btn btn-outline-pink">戻る</a>
    </form>
</div>
@endsection
