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
    <form action="{{ route('task.destroy', ['task'=> $task->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
    </form>
</div>
@endsection