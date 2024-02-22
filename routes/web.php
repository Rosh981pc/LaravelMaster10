<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


Route::get('/tasks/{id}', function($id){
    
    return view('showTask', [
        'task' => \App\Models\Task::findOrFail($id)
    ]);
})->name('tasks.show');

Route::get('/', function () {
    return view('index',[
        'tasks'=> \App\Models\Task::all()
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
