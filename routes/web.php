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


Auth::routes();

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/login/{request}', 'Auth\LoginController@postLogin');

Route::group(['middleware'=> ['web','auth']],function(){

    Route::get('/home',function(){
        if(Auth::user()->admin==0)
        {
            return view('home');
        }
        else
        {
            $users['users'] = \App\User::all();
            return view('adminhome',$users);
        }
    });
    //postLogin

});

Route::group(['middleware'=> 'AuthenticateMiddleware'],function(){

/*Route::get('/createBoarding', function () {
    return view('createBoarding');
});*/

Route::get('/listBoarding', 'BoardingDetailsController@index')->name('home');

Route::get('/viewProfile', function () {
    return view('/viewProfile');
});

Route::get('/listUser', 'UserDetailsController@index')->name('home');
Route::get('/Profile', 'UserController@profile');
Route::post('/boardingpic{Picture_id}', 'BoardingDetailsController@changeBP');


Route::post('profile','UserController@update_profilepic');

Route::post('/confirm','BoardingDetailsController@store');
Route::get('/createBoarding', 'BoardingDetailsController@start');
Route::post('/newComplain','ComplainsController@store');

Route::get('/AllBoardings', function () {
    return view('AllBoardings');
});

Route::get('/admins', 'UserController@admin');



Route ::get('/viewProfileBoarding{boarding_no}','BoardingDetailsController@show');
Route ::get('/editBoarding{boarding_no}','BoardingDetailsController@edit');
Route ::put('/updateData{boarding_no}','BoardingDetailsController@update');

Route ::get('/deleteBoarding{boarding_no}','BoardingDetailsController@destroy');
Route ::get('/addComplain{boarding_no}','ComplainsController@form');

Route ::get('/deleteUser{id}','UserController@destroy');
Route ::get('/deactivateAccount{id}','UserController@destroy');

Route ::get('/viewUser{id}','UserController@show');

Route ::get('/EditProfile{id}','UserController@edit');
Route ::get('/changePassword{id}','UserController@Pchange');
Route ::post('/ChangeYourPassword{id}','UserController@passwordChange');

Route ::put('/updateProfile{id}','UserController@update');

Route::get('/findboarding', function () {
    return view('findboarding');
});

//Route::post('/find','BoardingDetailsController@find');

Route ::get('/commentView','CommentController@adminview');
Route ::get('/deleteComment{comment_id}','CommentController@deleteComment');
Route ::get('/usercomment','CommentController@usermail');

Route ::get('/blockuser{mail_id}','CommentController@blockuser');
Route ::get('/unblockuser{mail_id}','CommentController@unblockuser');
Route ::get('/complainsView','ComplainsController@viewComplain');

Route ::get('/receiveComplain{complain_id}','ComplainsController@receive');
Route ::get('/solvedComplain{complain_id}','ComplainsController@solve');
Route ::get('/deleteComplain{complain_id}','ComplainsController@deleteComplain');
Route ::get('/changeBoardingPicture{boarding_no}','BoardingDetailsController@changeBoardingpic');

Route::get('/systemView', function () {
    return view('welcome');
});

});

Route::get('/selectBoarding','BoardingDetailsController@allboardings');
Route::get('/viewBoarding{boarding_no}', 'BoardingDetailsController@easy');

Route::post('/addcomment','CommentController@store');

Route::get('/findboarding', function () {
    return view('findboarding');
});

Route::post('/find','BoardingDetailsController@find');

Route ::get('/search','BoardingDetailsController@search');
