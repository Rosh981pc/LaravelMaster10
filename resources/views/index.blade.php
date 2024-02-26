@extends('layouts.app')

@section('title', 'LIST OF TASKS')

@section('content')
    <nav class="py-4">
        <a class="text-lg" href="{{route('task.create')}}">Add a new task</a>
    </nav>
    @forelse($tasks as $task)
    <div>        
        <a @class([ 'line-through'=>$task->completed])>
            {{$task->title}} 
        </a>
        <p>Created at: {{$task->created_at}}</p>
        <a class="font-bold" href="{{route('tasks.show', ['task' => $task->id])}}">Ver mas..</a>
        <hr>
    </div>
    @empty
    <h3>No tasks!</h3>
    @endforelse
    @if($tasks->count())
        <nav class="py-3">
            {{$tasks->links()}}
        </nav>
    @endif

@endsection