<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => '/v1',
], function (Router $router) {
    // // Permissions
    // $router->get('/intranet-permissions', [One\Intranet\Permission\IntranetPermissionController::class, 'list']);
    // $router->get('/intranet-permissions/{permission}', [One\Intranet\Permission\IntranetPermissionController::class, 'get']);

    // $router->post('/intranet-roles', [One\Intranet\Permission\IntranetRoleController::class, 'create']);
    // $router->get('/intranet-roles', [One\Intranet\Permission\IntranetRoleController::class, 'list']);
    // $router->get('/intranet-roles/{role}', [One\Intranet\Permission\IntranetRoleController::class, 'get']);
    // $router->put('/intranet-roles/{role}', [One\Intranet\Permission\IntranetRoleController::class, 'update']);
    // $router->delete('/intranet-roles/{role}', [One\Intranet\Permission\IntranetRoleController::class, 'delete']);

    // Intranet Users
    // $router->post('/intranet-users/{intranet_user}/avatar', [One\IntranetUserController::class, 'avatar']);
    // $router->delete('/intranet-users/{intranet_user}/avatar', [One\IntranetUserController::class, 'deleteAvatar']);
    // $router->post('/intranet-users/{intranet_user}/sync-roles', [One\IntranetUserController::class, 'syncRoles']);
    // $router->apiResource('intranet-users', One\IntranetUserController::class)->except('delete');

    // Portal Users
    $router->post('/users', [UserController::class, 'create']);
    $router->get('/users', [UserController::class, 'list']);
    $router->get('/users/{id}', [UserController::class, 'get']);
    $router->put('/users/{id}', [UserController::class, 'update']);
    $router->delete('/users/{id}', [UserController::class, 'delete']);
    // $router->post('/user/{id}/reset-password', [One\Intranet\UserController::class, 'resetPassword']);
});