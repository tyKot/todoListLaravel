<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tasks = User::find(Auth::id())->tasks()->get();
        // dd($tasks);
        return view('index', ['tasks' => $tasks]);
    }

    public function viewTask($id)
    {
        $task = Task::findOrFail($id);
        return view('task_view', compact('task'));
    }



    public function addTaskPage()
    {
        return view('task_add');
    }

    public function create(TaskRequest $request)
    {
        $user_id = Auth::id();
        Task::create([
            'user_id' => $user_id,
            'name' => $request->task_name,
            'description' => $request->task_description,
        ]);
        $request->session()->flash('success', 'Задание добавлено в список задач');
        return to_route('index');
    }



    public function edit($id)
    {
        $task_edit = Task::findOrFail($id);
        return view('task_edit', compact('task_edit'));
    }
    public function postEdit(TaskRequest $request)
    {
        Task::findOrFail($request->id)->update([
            'name' => $request->task_name,
            'description' => $request->task_description,
        ]);
        $request->session()->flash('success', 'Задание обновлено');
        return to_route('index');
    }



    public function delete($id)
    {
        Task::findOrFail($id)->delete();
        session()->flash('success', 'Задание удалено');
        return to_route('index');
    }
}
