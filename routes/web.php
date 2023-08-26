<?php

use App\Http\Controllers\UserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'user'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

// Route::group([
//     'prefix' => '/v1',
// ], function (Router $router) {
//     // // Permissions
//     // $router->get('/intranet-permissions', [One\Intranet\Permission\IntranetPermissionController::class, 'list']);
//     // $router->get('/intranet-permissions/{permission}', [One\Intranet\Permission\IntranetPermissionController::class, 'get']);

//     // $router->post('/intranet-roles', [One\Intranet\Permission\IntranetRoleController::class, 'create']);
//     // $router->get('/intranet-roles', [One\Intranet\Permission\IntranetRoleController::class, 'list']);
//     // $router->get('/intranet-roles/{role}', [One\Intranet\Permission\IntranetRoleController::class, 'get']);
//     // $router->put('/intranet-roles/{role}', [One\Intranet\Permission\IntranetRoleController::class, 'update']);
//     // $router->delete('/intranet-roles/{role}', [One\Intranet\Permission\IntranetRoleController::class, 'delete']);

//     // Intranet Users
//     // $router->post('/intranet-users/{intranet_user}/avatar', [One\IntranetUserController::class, 'avatar']);
//     // $router->delete('/intranet-users/{intranet_user}/avatar', [One\IntranetUserController::class, 'deleteAvatar']);
//     // $router->post('/intranet-users/{intranet_user}/sync-roles', [One\IntranetUserController::class, 'syncRoles']);
//     // $router->apiResource('intranet-users', One\IntranetUserController::class)->except('delete');

//     // Portal Users
//     $router->post('/users', [UserController::class, 'create']);
//     $router->get('/users', [UserController::class, 'list']);
//     // $router->get('/user/{id}', [One\Intranet\UserController::class, 'get']);
//     // $router->put('/user/{id}', [One\Intranet\UserController::class, 'update']);
//     // $router->post('/user/{id}/reset-password', [One\Intranet\UserController::class, 'resetPassword']);
// });
