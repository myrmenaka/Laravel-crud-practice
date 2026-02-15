<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task App</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- css --}}
    @vite(['resources/css/style.css', 'resources/js/app.js'])

</head>

<body class="container py-4">

<header class="mb-4">
    <h1 class="mb-3">Task App</h1>

    <nav class="mb-3">
        <a href="{{ route('tasks.index') }}" class="btn btn-outline-pink me-2">一覧</a>
        <a href="{{ route('tasks.create') }}" class="btn btn-pink">新規作成</a>
        <a href="{{ route('categories.index') }}" class="btn btn-outline-pink">カテゴリ管理</a>
    </nav>

    <hr>
</header>

<main>
    @yield('content')
</main>

</body>
</html>
