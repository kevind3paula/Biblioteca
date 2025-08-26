<?php

use App\Exports\LivrosExport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        route::get('/livros', function() { return view('livros'); } )->name('livros');
        route::get('/livros/export', function () {
            return Excel::download(new LivrosExport, 'livros.xlsx');
        })->name('livros.export');
        route::get('/editoras', function() { return view('editoras'); } )->name('editoras');
        route::get('/autores', function() { return view('autores'); } )->name('autores');
});
