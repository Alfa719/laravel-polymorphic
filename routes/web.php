<?php

use App\Models\Post;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // Make new post
    $post = Post::create([
        'user_id' => 3,
        'title' => 'First Post'
    ]);
    $video = Video::create([
        'title' => 'FIrst Video'
    ]);

    // Test Polymorphic use Post
    $post->comments()->create([
        'user_id' => 5,
        'body' => "This Body Comment First"
    ]);
    // Make Comment use Video
    $video->comments()->create([
        'user_id' => 3,
        'body' => 'This Body Comment Second'
    ]);
    return view('welcome');
});
