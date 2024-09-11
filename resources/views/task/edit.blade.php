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
                    <h1 class="text-center mb-4">Edit Task </h1>
                    <form action="{{ route('update', $task) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Task Title" value="{{ $task->title }}"  required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="description" class="form-control" placeholder="Task Description" value="{{ $task->description }}" required>
                        </div>                        
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
            </div>
        </div>
    </div>
              
</div>
@endsection
