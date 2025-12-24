<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('/admin/users', \App\Livewire\Admin\UserManagement::class)
        ->name('admin.users')
        ->middleware(['role:Administrador']);

    Route::get('/admin/roles', \App\Livewire\Admin\RoleManagement::class)
        ->name('admin.roles')
        ->middleware(['role:Administrador']);
});
