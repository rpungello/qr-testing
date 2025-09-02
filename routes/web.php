<?php

use App\Livewire\AddCode;
use App\Livewire\AddResource;
use App\Livewire\CreateProject;
use App\Livewire\ListProjects;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\ViewProject;
use App\Livewire\ViewResource;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('projects', ListProjects::class)->name('projects.index');
    Route::get('projects/create', CreateProject::class)->name('projects.create');
    Route::get('projects/{project}', ViewProject::class)->name('projects.view');
    Route::get('projects/{project}/add-resource', AddResource::class)->name('projects.add-resource');
    Route::get('resources/{resource}', ViewResource::class)->name('resources.view');
    Route::get('resources/{resource}/add-code', AddCode::class)->name('resources.add-code');
});

require __DIR__.'/auth.php';
