<?php

use Illuminate\Http\Request;
use App\Movies;
use App\Genres;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * @queryParam  genre optional - The id of the genre of the movies returned - if not specified all movies will be returned
 * @queryParam  current optional- The id of the current movie that is displayed
 */
Route::get('/movies/{genre?}/{current?}', function($genre = null, $current = null) {
    return is_null($genre) ?
            Movies::all() : // no genre, return all
            Movies::where([
                ['genre_id', '=', $genre],
                ['id', '!=', $current]
            ])->firstOrFail(); // return one from given genre
});

/**
 * @bodyParam  title required - The title of the movie
 * @bodyParam  desc required - The descriptions of the movie
 * @bodyParam  image required - The image of the movie
 * @bodyParam  genre_id required - The id of the movies genre
 */
Route::post('/movies', function(Request $request) {
    return Movies::create($request->all());
});

/**
 * @queryParam  id required - The id of the movie to be deleted
 */
Route::delete('/movies/{id}', function($id) {
    return Movies::destroy($id);
});

/**
 * @queryParam  id required - The id of the movie to be updated
 */
Route::put('/movies/{id}', function($id) {
    $movie = Movies::find($id);
    if($movie) {
        $movie->update(request()->all());
        return $movie;
    } else {
        return response()->noContent();
    }
});

Route::get('/genres', function() {
    return Genres::all();
});

