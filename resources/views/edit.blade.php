@extends('layouts.app')

@section('title', 'Edit task')

@section('content')
    @include('reusableForm', ['task'=>$task])
@endsection