@extends('layouts.app')

@section('content')

<div class="row" style="margin-bottom: 10px;">
    <div class="col">
        <h1>Task List</h1>
    </div>
    <div class="col d-flex justify-content-end" style="align-items: center;">
        <a href="/tasks/create" class="btn btn-primary">New Task</a>
    </div>
</div>

@if($tasks->isEmpty())
    <p id="no-tasks-msg">You haven't created any tasks yet. <a href="/tasks/create">Click here</a> to create one.</p>
@else
    @foreach($tasks as $task)
    <div class="card" style="margin-bottom: 10px;">
        <div class="card-body">
            <div id="task">
                <h5 class="font-weight-bold" style="font-weight: bold;">
                    @if($task->isCompleted())
                        <span class="badge badge-pill" style="background-color:green;">Completed</span>
                    @endif

                    {{$task->title}}
                </h5>
                <p id="task-description">
                    {{$task->description}}
                </p>
                @if($task->isCompleted())
                    <form action="/tasks/{{$task->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-outline-danger" input="submit">Delete</a>
                    </form>
                @else
                    <div class="col d-flex" style="align-items: center;">
                        <form action="/tasks/{{$task->id}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <button class="btn btn-secondary" input="submit" style="margin-right:5px;">Done</a>
                        </form>
                        <form action="/tasks/{{$task->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-outline-danger" input="submit">Delete</a>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
@endif

@endsection