<?php

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

Route::get('/', 'LandingsController@index');

Route::get('/visits', function () {
    $visits = \App\Visit::all();
    
    return view('visits', compact('visits'));
});

Route::get('/visits/json', function () {
    return response()->json(\App\Visit::all());
});

Route::get('/visits/csv', function () {
    $visits = \App\Visit::all()->toArray();

    array_unshift($visits, array_keys($visits[0]));

    $callback = function () use ($visits) {
        foreach ($visits as $visit) {
            foreach ($visit as $key => $val) {
                echo str_replace('"', '\"', $val) . ',';
            }
            echo "\n";
        }
    };

    return response()->streamDownload($callback, 'visits.csv');

});

Route::get('/create', function () {

    return view('create');
});
