@extends('layouts.app')

@section('content')
<h1>Create New Task</h1>

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul style="margin: 0px">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/tasks">
    <div class="form-group">
        @csrf
        <label for="title">Title:</label>
        <input class="form-control" name="title"/>

        <label for="description">Description:</label>
        <input class="form-control" name="description"/>
    </div>
    <div class="form-group" style="margin-top: 10px;">
        <button type="submit" class="btn btn-success">Create</button>
        <a href="/" class="btn btn-secondary">Cancel</a>
    </div>
</form>
@endsection