<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index() {
        $tasks = Task::orderBy('completed_at', 'ASC')
            ->orderBy('id', 'DESC')->get();
        
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create() {
        return view('tasks.create');
    }

    public function store() {
        $description = request('description');
        $title = request('title');
        if($description == null){
            $description = 'No description.';
        }

        request()->validate([
            'description' => 'max:255',
            'title' => 'required|max:255',
        ]);

        Task::create([
            'description' => $description,
            'title' => $title,
        ]);

        return redirect('/');
    }

    public function update($id) {
        $task = Task::where('id', $id)->first();
        $task->completed_at = now();
        $task->save();

        return redirect('/');
    }

    public function delete($id) {
        $task = Task::Where('id', $id)->first();
        $task->delete();

        return redirect('/');
    }
} 
