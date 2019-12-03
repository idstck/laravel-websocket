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
    TaskStatusUpdated::dispatch(new Task(1));
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
