<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


use App\Http\Controllers\api\v2\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);


Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', [AuthController::class, 'getUser']);

    Route::post('/upload-profile-pic', [AuthController::class, 'upload']);

    

    Route::get('/get_user_roles', [AuthController::class, 'getUserRoles']);

    Route::get('/get_user_has_roles', [AuthController::class, 'getUserHasRole']);

});




use App\Http\Controllers\api\v2\SliderController;

Route::get('/sliders', [SliderController::class, 'index']);


use App\Http\Controllers\api\v2\GenreController;

Route::get('/genres', [GenreController::class, 'index']);


use App\Http\Controllers\api\v2\SongController;

Route::get('/songs/by-genre/{genreId}', [SongController::class, 'getSongsByGenre']);


Route::get('/songs/home', [SongController::class, 'homePageData']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/play-song', [SongController::class, 'playSong']);

    Route::post('/songs/upload', [SongController::class, 'store']);

    Route::get('/songs/uploaded', [SongController::class, 'songsByUser']);

});

use App\Http\Controllers\api\v2\PlaylistController;

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/playlist', [PlaylistController::class, 'index']);

    Route::post('/submit-playlist', [PlaylistController::class, 'store']);

    Route::delete('/delete-playlist', [PlaylistController::class, 'destroy']);

});


use App\Http\Controllers\api\v2\SongNotificationController;

Route::get('/song-notifications', [SongNotificationController::class, 'index']);


use App\Http\Controllers\api\v2\LikeController;

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/like', [LikeController::class, 'store']);

});


use App\Http\Controllers\api\v2\CommentController;

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/comment', [CommentController::class, 'index']);

    Route::post('/submit-comment', [CommentController::class, 'store']);

});
