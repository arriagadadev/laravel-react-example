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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Get User Types
Route::get('/user-types', 'UserTypeController@getUserTypes');

//Get Users
Route::get('/users', 'UserController@getUsers');

//Admin Tickets
Route::get('/admin/tickets', 'TicketController@getTickets');
Route::post('/admin/ticket', 'TicketController@storeTicket');
Route::put('/admin/ticket', 'TicketController@editTicket');
Route::delete('/admin/ticket/{id}', 'TicketController@deleteTicket');

//User Tickets
Route::get('/tickets', 'TicketController@getMyTickets');
Route::put('/request-ticket', 'TicketController@requestTicket');