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
    $teamsresult = [];
    $sql = "SELECT * FROM Teams";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
       array_push($teamsresult,$row);
    }
    
    return view('/teams', compact('teamsresult'));
});

Route::post('/addteam',function(Request $request){
    $path = $_SERVER['DOCUMENT_ROOT']."/data.php";
    include_once ($path);
    $name = Request::get('name');
    $sql = "INSERT INTO `Teams` (`TeamName`) VALUES ('".$name."')";
    
    if (mysqli_query($conn,$sql) === TRUE) {
        echo "New record created successfully";
        return redirect ('/teams');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
});

Route::post('/deleteteam',function(Request $request){
    $path = $_SERVER['DOCUMENT_ROOT']."/data.php";
    include_once ($path);
    $id = Request::get('FixtureId');
    $sql = "DELETE FROM `PastFixtures` WHERE FixtureId =".$id;
    
    if (mysqli_query($conn,$sql) === TRUE) {
        echo "record deleted successfully";
        return redirect ('/fixtures');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
});


Route::post('editteam',function(Request $request){
    $team = Request::all();
    return view('/editteam',compact('team'));
});

Route::post('updateteam',function(Request $request){
    $path = $_SERVER['DOCUMENT_ROOT']."/data.php";
    include_once ($path);
    $id = Request::get('Id');
    $name = Request::get('Name');
    $sql = "UPDATE Teams SET TeamName='".$name."' WHERE TeamId=".$id."";
    
    if (mysqli_query($conn,$sql) === TRUE) {
        echo "record updated successfully";
        return redirect ('/teams');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
});

Route::get('fixtures', function() {
    
    $path = $_SERVER['DOCUMENT_ROOT']."/data.php";
    include_once ($path);
    $fixtures = [];
    $sql = "SELECT pf.FixtureId as `FixtureId`,t.TeamName as `HomeTeamName`,pf.HomeTeamScore,te.TeamName as `AwayTeamName`,pf.AwayTeamScore FROM PastFixtures pf INNER JOIN Teams t ON t.TeamId = pf.HomeTeamId INNER JOIN Teams te ON te.TeamId = pf.AwayTeamId";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
        array_push($fixtures,$row);
    }
    return view('/fixtures', compact('fixtures'));
});


Route::get('loginpage', function() {
    return view('/loginpage');
});

Route::get('registerteam', function() {
    return view('/registerteam');
});
