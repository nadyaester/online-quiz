<?php

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

Auth::routes([
  'reset'=>false,
  'verify'=>false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'isAdmin'], function(){
  Route::get('/', function () {
      return view('admin.index');
  });

  Route::resource('quiz', 'App\Http\Controllers\QuizController');
  Route::resource('classroom', 'App\Http\Controllers\ClassController');
  Route::resource('user', 'App\Http\Controllers\UserController');
  Route::resource('question', 'App\Http\Controllers\QuestionController');
  Route::get('/quiz/{id}/questions', 'App\Http\Controllers\QuizController@question')->name('quiz.question');

  Route::get('exam/assign', 'App\Http\Controllers\ExamController@create');
  Route::post('exam/assign', 'App\Http\Controllers\ExamController@assignExam')->name('exam.assign');
  Route::get('exam/class', 'App\Http\Controllers\ExamController@classExam')->name('view.exam');
  Route::post('exam/remove', 'App\Http\Controllers\ExamController@removeExam')->name('exam.remove');

});