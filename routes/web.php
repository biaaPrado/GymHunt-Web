<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::View('/', 'home')->name('home');

Route::View('/feed', 'feed')->name('feed');

Route::Get('/feed/posts/{id}', [PostController::class, 'index'])->name('post');

Route::Get('/perfil/{id}', [ProfileController::class, 'index'])->name('perfil');

Route::get('/perfil', function(){
    return view('perfilUser', ['user' => App\Models\User::find(1)]);
})->name('perfilUser');

Route::get('/academia', function(){
    return view('perfilGym');
})->name('perfilGym');

Route::get('/avaliações', function(){
    return view('avaliacoesGym');
})->name('avaliacoesGym');

Route::get('/gerandoAvaliação', function(){
    return view('comentario');
})->name('comentario');

Route::get('/explore', function() {
    return view('location.explore');
});

Route::get('/gym-card', App\Http\Livewire\Gym\View::class);

require __DIR__.'/auth.php';
