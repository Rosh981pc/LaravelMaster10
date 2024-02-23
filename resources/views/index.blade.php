@extends('layouts.app')
@section('title', 'LIST OF TASKS')
@section('content')
    @forelse($tasks as $task)
    <div>        
        <h3>{{$task->title}}</h3>
        <p>Created at: {{$task->created_at}}</p>
        <p>Description:<br/>{{$task->description}}</p>
        <a href="{{route('tasks.show', ['task' => $task->id])}}">Ver mas..</a>
        @if($task->completed)
        <h4 style="color: green;">COMPLETED</h4>
        @else
        <h4 style="color: red;">NOT COMPLETED</h4>
        @endif
        <hr>
    </div>
    @empty
    <h3>No tasks!</h3>
    @endforelse
@endsection