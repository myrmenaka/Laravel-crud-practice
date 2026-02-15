@extends('layouts.app')

@section('content')
<h2 class="mb-4">カテゴリ新規作成</h2>

<div class="card p-4 shadow-sm">
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">カテゴリ名</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-pink">作成</button>
        <a href="{{ route('categories.index') }}" class="btn btn-outline-pink">戻る</a>
    </form>
</div>
@endsection
