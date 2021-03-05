<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
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
Route::get('/insert', function() {
DB::insert('insert into welcome(Name, DateOfBirth, GPA, Advisor) values(?, ?, ?, ?)', ['Ыбырай', '1841-01-01', '3.0', 'Григорьев']);
});

Route::get('/select', function() {
$result = DB::select('select * from welcome');
foreach ($result as $posts) {
	echo "Name is:".$posts->Name;
	echo "<br>";
	echo "Date is:".$posts->DateOfBirth;
}
});

Route::get('/update', function(){
	$updated=DB::update('update welcome set Name="Ыбырай Алтынсарин" where id = ?', [1]);
	return $updated;
} );

Route::get('/delete', function() {
	$deleted = DB::delete('delete from welcome where id=?',[1]);
		return $deleted;

});

///Model
//Reading data
Route::get('/read', function() {
	$posts=Student::all();
	foreach($posts as $post) {
		echo $post->Name;
		echo "<br>";
	}
});




//Inserting data
Route::get('/insert2', function() {
	$post = new Student;
	$post->Name = "IJN Akagi";
	$post->DateOfBirth = "1925-04-22";
	$post->GPA = '3.0';
	$post->Advisor = 'Yamamoto';
	$post->save();
});

///Updatind data
Route::get('/basicupdate', function() {
	$post=Student::find(1);
	$post = new Student;
	$post->Name='IJN Kaga';
	$post->DateOfBirth='1934-01-01';
	$post->GPA = '3.1';
	$post->Advisor = 'Yamato';
	$post->save();
}); 

///Deleting data
Route::get('/basicdelete', function() {
	$post=Student::find(1);
	$post = new Student;
	$post->delete();
}); 

