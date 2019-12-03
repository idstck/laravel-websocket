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

use App\Events\TaskStatusUpdated;

class Task
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}


Route::get('/', function () {
    return view('welcome');
});

Route::get('/update', function () {
    TaskStatusUpdated::dispatch(new Task(1));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
