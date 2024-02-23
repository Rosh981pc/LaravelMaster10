<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/tasks/create', 'create')->name('task.create');

Route::get('/tasks/edit/{task}', function(Task $task){
    
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function(Task $task){
    
    return view('showTask', [
        'task' => $task
    ]);
})->name('tasks.show');

Route::post('/tasks', function(TaskRequest $request){
    // $data = $request->validated();
    // $task = new Task;
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show',['task'=> $task->id])->with('success','Task created successfully');
})->name('task.store');

Route::put('/tasks/{task}', function(Task $task, TaskRequest $request){
    // $data = $request->validated();

    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();
    $task->update($request->validated());

    return redirect()->route('tasks.show',['task'=> $task->id])->with('success','Task updated successfully');
})->name('task.update');

Route::delete('/tasks/delete/{task}', function(Task $task){
    $task->delete();
    return redirect()->route('home')->with('success','Task deleted successfully');
})->name('task.destroy');

Route::get('/', function () {
    return view('index',[
        'tasks'=> Task::latest()->get()
    ]);
})->name('home');

Route::get('/goHome', function () {
    return redirect()->route('home');
});

Route::get('/nameEx/{name}', function ($name) {
    return 'Hello '.$name;
});

Route::fallback(function (){//funcion 404
    return 'No existe HDTP';
});
