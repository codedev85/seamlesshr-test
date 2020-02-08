<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::post('store/courses','CourseController@storeCourses');
// Route::get('open', 'DataController@open');
Route::get('courses', 'CourseController@getCourses');
Route::post('register/course','CourseController@registerCourse');
Route::get('user/enrolment','CourseController@dateUserEnrolled');
//specify exc type on the api url xlsx
Route::get('/downloadExcel/{type}','CourseController@exportData');


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');



});
