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
use Illuminate\Support\Facades\Request;



Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function() {
    return view('/about');
});

Route::get('teams', function() {
         
    $path = $_SERVER['DOCUMENT_ROOT']."/data.php";
    include_once ($path);
    $teams = [];
    $sql = "SELECT * FROM Teams";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
        array_push($teams,$row['Team Name']);
    }
    return view('/teams', compact('teams'));
});

Route::post('/addteam',function(Request $request){
    $path = $_SERVER['DOCUMENT_ROOT']."/data.php";
    include_once ($path);
    $name = Request::get('name');
    $sql = "INSERT INTO `Teams` (`Team Name`) VALUES ('".$name."')";
    
    if (mysqli_query($conn,$sql) === TRUE) {
        echo "New record created successfully";
        return redirect ('/teams');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
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
