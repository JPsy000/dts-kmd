<?php

use App\Http\Controllers\DocTypeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ForwardController;
use App\Http\Controllers\GoToController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ReceiveController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/view', function () {
    return view('users.view');
});

Auth::routes();

// Dashboard Routes
Route::get('/home', [HomeController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);

//************ ADMIN SIDE ************//

// Office Routes
Route::get('/admin-office', [OfficeController::class, 'index']);
// To add new office
Route::post('/add-office', [OfficeController::class, 'store']);
// To get the id of office data and/or edit the data
Route::post('/getOffice', [OfficeController::class, 'getOffice']);
// To delete the data
Route::delete('/deleteOffice/{id}', [OfficeController::class, 'destroy']);

// Position Routes
Route::get('/admin-position', [PositionController::class, 'index']);
// To add new position
Route::post('/add-position', [PositionController::class, 'store']);
// AJAX: Get positions by office
Route::get('/get-positions/{office_id}', [PositionController::class, 'getPositionsByOffice']);
// To get the id of position data and/or edit the data
Route::post('/getPosition', [PositionController::class, 'getPosition']);
// To delete the data
Route::delete('/deletePosition/{id}', [PositionController::class, 'destroy']);

// Users List Routes
Route::get('/admin-userslist', [UserController::class, 'index']);
// To add new user  
Route::post('/add-user', [UserController::class, 'store']);

//************// ADMIN SIDE //************//

// *********************************************************************************************************//

//************ USER SIDE ************//

// Document Routes
Route::get('/user-document', [DocumentController::class, 'index']);
// To add new Document Type
Route::post('/add-doctype', [DocTypeController::class, 'store']);
//To add new Document
Route::post('/add-document', [DocumentController::class, 'store']);
// To upload the attachment of the document
Route::post('/update-file/{id}', [DocumentController::class, 'updateFile']);
// To get the id of document data and/or edit the data
Route::post('/getDocument', [DocumentController::class, 'getDocument']);
// To delete the data
Route::delete('/deleteDocument/{id}', [DocumentController::class, 'destroy']);
// To view the document
Route::get('/view-document/{id}', [DocumentController::class, 'viewDocs']);
// To select where office to forward the document
Route::get('/review-document/{id}', [ForwardController::class, 'index']);
// To forward the document
Route::post('/forward-documents', [ForwardController::class, 'store']);
// To go to the document from sidebar Received
Route::get('/received-documents', [GoToController::class, 'goToReceived']);
// To view the incoming documents
Route::get('/incoming-documents', [GoToController::class, 'GoToIncoming']);
// To receive the document
Route::get('/receive-document/{id}', [ReceiveController::class, 'index']);
Route::post('/save-receive', [ReceiveController::class, 'DocTrackUpdate']);
// To forward the received document
Route::get('/received-forward/{id}', [ReceiveController::class, 'receivedForward']);
Route::post('receivedForward-documents', [ReceiveController::class, 'store']);

// To go to the outgoing documents
Route::get('/outgoing-documents', [GoToController::class, 'goToOutgoing']);
// To go to completed documents
Route::get('/completed-documents', [GoToController::class, 'goToComplete']);

// To track the document    
Route::get('/track-document', [TrackController::class, 'index']);

//************ USER SIDE ************//