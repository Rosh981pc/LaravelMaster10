@extends('layouts.app')

@section('title', isset($task) ? 'Edit task' : 'New task')

@section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8rem;
    }
</style>
@endsection

@section('content')
<form method="POST" action=" {{ isset($task) ? route('task.update', ['task'=>$task->id]) : route('task.store') }} "> 
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div>
        <label for="title">
            Title
        </label>
        </br>
        @error('title')
        <!-- <p class="error-message">Tittle needed!</p> -->
        <p class="error-message">{{$message}}</p>
        @enderror
        <input text="" name="title" id="title" value="{{$task->title ?? old('title')}}"/>
    </div>
    <div>
        <label for="description">
            Description
        </label>
        </br>
        @error('description')
        <p class="error-message">Description needed!</p>
        @enderror
        <textarea text="" name="description" rows="5" id="description">{{$task->description ?? old('description')}}</textarea>
    </div>
    <div>
        <label for="long_description">
            Long description
        </label>
        </br>
        <textarea text="" name="long_description" rows="10" id="long_description">{{$task->long_description ?? old('long_description')}}</textarea>
    </div>
    <div>
        <button type="submit">
            @isset($task)
            Update task
            @else
            Add task
            @endisset
        </button>
    </div>
</form>
@endsection