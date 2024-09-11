@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-body">
                <div class="container mt-5">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">{{$errors->first()}}</div>
                @endif
                    <h1 class="text-center mb-4">Task List</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Email user</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Completed</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)                            
                                <tr>
                                    <td>{{ $task->users->email }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->completed == 1 ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <a href="{{ route('task.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('destroy', $task) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form method="post"  action="{{ route('store') }}" class="card card-body">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Task Title1" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="description" class="form-control" placeholder="Task Description" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Assigned User email" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Add Task</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
