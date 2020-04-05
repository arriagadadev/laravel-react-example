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
})->middleware('auth');

Auth::routes();

/*
*   User Routes
*/
Route::group(['middleware' => ['auth', 'role:2']], function () {
    //Tickets
    Route::get('/tickets', 'TicketController@getMyTickets');
    Route::put('/request-ticket', 'TicketController@requestTicket');
});

/*
*   Admin Routes
*/
Route::group(['middleware' => ['auth', 'role:1']], function () {
    //Get User Types
    Route::get('/user-types', 'UserTypeController@getUserTypes');

    //Get Users
    Route::get('/users', 'UserController@getUsers');

    //Tickets
    Route::get('/admin/tickets', 'TicketController@getTickets');
    Route::post('/admin/ticket', 'TicketController@storeTicket');
    Route::put('/admin/ticket', 'TicketController@editTicket');
    Route::delete('/admin/ticket/{id}', 'TicketController@deleteTicket');
});