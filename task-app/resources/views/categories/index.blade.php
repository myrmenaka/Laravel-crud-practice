@extends('layouts.app')

@section('content')
<h2 class="mb-4">カテゴリ一覧</h2>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-3">
    <a href="{{ route('categories.create') }}" class="btn btn-pink">新規カテゴリ作成</a>
</div>

<div class="card shadow-sm">
    <table class="table table-hover mb-0">
        <thead class="table-pink">
            <tr>
                <th>ID</th>
                <th>カテゴリ名</th>
                <th>操作</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-outline-pink btn-sm">編集</a>

                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-pink btn-sm"
                                onclick="return confirm('本当に削除しますか？')">
                                削除
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
