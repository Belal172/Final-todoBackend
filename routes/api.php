<?php
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Todo\TodoController;
use App\Http\Middleware\AdminRole;
use App\Http\Middleware\RoleCheck;
use App\Http\Middleware\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//Public Routes
route::post('/login', [UserController::class, 'login']);
route::get('/login', [UserController::class, 'login']);
route::post('/signup', [UserController::class, 'signup']);

route::group(['middleware' => "auth:sanctum"], function () {
    //all the routes goes here for authentication
    route::get('/logout', [UserController::class, 'logout']);

    //route::apiResource('todos',TodoController::class);
    route::get('show-todos', [TodoController::class, 'index']);
    route::post('create-todos', [TodoController::class, 'store']);
    route::put('update-todos', [TodoController::class, 'update']);
    route::delete('delete-todos', [TodoController::class, 'destroy']);

    // Route::get('/admin', function () {
//     return response()->json(['message' => 'Welcome to the Admin Dashboard']);
// })->middleware(['auth:sanctum', AdminRole::class]);


    // Route::get('/dash', function () {
//     return response()->json(['message' => 'Welcome to the user Dashboard']);
// })->middleware(['auth:sanctum',UserRole::class]);

    Route::middleware(['auth:sanctum', RoleCheck::class])->group(function () {
        Route::get('/dash', function () {
            return response()->json(['messahe' => 'Welcome to user dashboard']);

        });

        Route::get('/admin', function () {
            return response()->json(['messahe' => 'Welcome to Admin dashboard']);
        });
    });

});


