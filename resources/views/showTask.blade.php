@extends('layouts.app')
@section('title')
TASK {{$task->id}}
@endsection
@section('content')
<h1>{{$task->title}}</h1>
<p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>
<p>{{$task->description}}</p>
@if($task->long_description)
<p>{{$task->long_description}}</p>
@endif
@if($task->completed)
<h2 style="color: green;">COMPLETED</h2>
@else
<h2 style="color: red;">NOT COMPLETED</h2>
@endif
<div>
    <a href="{{route('home')}}">Back</a>
    <br/>
    <a href="{{route('tasks.edit',['task'=>$task->id])}}">Edit</a>
    <br/>
</div>
<div>
    <form action="{{ route('task.changeStatus', ['task'=> $task->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit">Mark as {{$task->completed ? 'not completed' : 'completed' }}</button>
    </form>
</div>
<div>
    <form action="{{ route('task.destroy', ['task'=> $task->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
    </form>
</div>
@endsection