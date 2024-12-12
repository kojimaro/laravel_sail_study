<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\Scraps\ScrapList::class);
Route::get('/presigned-url', App\Livewire\Aws\PresignedUrl::class);
