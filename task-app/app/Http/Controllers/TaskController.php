<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $categoryId = $request->category_id;

        $query = Task::query()->with('category');

        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        // カテゴリでの絞り込み
        if (!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        $tasks = $query->get();
        $categories = Category::all();

        return view('tasks.index', compact('tasks', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        // カテゴリの決定（既存 or 新規）
        if ($request->filled('new_category')) {
            $category = Category::create([
                'name' => $request->new_category
            ]);
            $categoryId = $category->id;
        } else {
            $categoryId = $request->category_id;
        }

        // タスクの作成
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $categoryId,
        ]);

        // 成功時メッセージ付きでリダイレクト
        return redirect()->route('tasks.index')->with('success', 'タスクが作成されました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $categories = Category::all();
        return view('edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        if ($request->filled('new_category')) {
            $category = Category::create([
                'name' => $request->new_category
            ]);
            $categoryId = $category->id;
        } else {
            $categoryId = $request->category_id;
        }

        // タスクの更新
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $categoryId,
        ]);

        return redirect()->route('tasks.index')->with('success', 'タスクが更新されました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // レコードの削除
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'タスクが削除されました。');
    }
}
