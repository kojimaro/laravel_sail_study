<?php

use Illuminate\Support\Facades\Route;

Route::get('/s3', App\Livewire\Aws\S3IamRoleTest::class);
Route::get('/ses', App\Livewire\Aws\SesTest::class);
