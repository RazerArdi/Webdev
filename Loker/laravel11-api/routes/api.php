<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\JobController;
use App\Jobs\SendEmailJob;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Routes

Route::get('/index', [PostController::class, 'index']);
Route::post('/store', [PostController::class, 'store']);
Route::get('/collective/{id}', [PostController::class, 'show']);
Route::put('/update/{post}', [PostController::class, 'update']);
Route::delete('/destroy/{post}', [PostController::class, 'destroy']);


Route::get('/jobs/show', [JobController::class, 'index']);
Route::post('/jobs/store', [JobController::class, 'store']);
Route::get('/show/{job}', [JobController::class, 'show']);
Route::put('/updateJOB/{job}', [JobController::class, 'update']);
Route::delete('/destroy/{job}', [JobController::class, 'destroy']);



Route::get('/test-email', function () {
    // Membuat payload
    $payload = json_encode([
        'task' => 'send_email',
        'to' => 'user2@example.com',
        'subject' => 'Hello',
        'body' => 'Welcome to our service!'
    ]);

    // Men-dispatch job
    SendEmailJob::dispatch($payload);

    return 'Job dispatched!';
});
