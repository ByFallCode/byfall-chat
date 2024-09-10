<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserController as UserControllerAlias;
use App\Models\InitParam;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')->group(function () {
    App::bind("Params", function () {
        return InitParam::find(1);
    });
    Route::resource('users', UserController::class);

    Route::resource('roles', RoleController::class);

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/', [HomeController::class, 'home']);

    Route::post('changePassword', [UserController::class, 'changePassword']);

    Route::resource('typeDocuments', TypeDocumentController::class);

    Route::resource('documents', DocumentController::class);

    Route::get('back', [HomeController::class, 'back'])->name('back');

    Route::get('chat/', [ChatController::class, 'index'])->name('chat.index');

    Route::get('chat/send', [ChatController::class, 'send'])->name('chat.send');

    Route::get('chat/direct', [ChatController::class, 'direct'])->name('chat.direct');

    Route::get('chat/destroy/{id}', [ChatController::class, 'destroy']);

    Route::post('insertMessage', [ChatController::class, 'insertMessage'])->name('insertMessage');

});

