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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function() {
    return view('/about');
});

Route::get('teams', function() {
    $teams = ['Dalton Ducks', 'Almondbury Alligators', 'Lepton Lions', 'Rawthorpe Ravens', 'Moldgreen Marauders', 'Fartown Foxes', 'Dewsbury Devils', 'The Mirfield Royales', 'Kirkheaton Kings', 'Golcar Giants', 'Kirkburton Thunderers', 'Stocksmoor Harriers', 'Linthewaite Tornados', 'Thorncliff Top eleven', 'Shelley Strikers', 'Brockholes Bandits'];
    return view('/teams', compact('teams'));
});

Route::get('fixtures', function() {
    return view('/fixtures');
});

Route::get('loginpage', function() {
    return view('/loginpage');
});

Route::get('registerteam', function() {
    return view('/registerteam');
});
