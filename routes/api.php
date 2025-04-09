<?php
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Todo\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::post('/login',[UserController::class,'login']);
route::get('/login',[UserController::class,'login']);
route::post('/signup',[UserController::class,'signup']);
route::group(['middleware'=>"auth:sanctum"],function(){
//all the routes goes here for authentication
route::get('/logout',[UserController::class,'logout']);

//route::apiResource('todos',TodoController::class);
route::get('show-todos',[TodoController::class,'index']);
route::post('create-todos',[TodoController::class,'store']);
route::put('update-todos',[TodoController::class,'update']);
route::delete('delete-todos',[TodoController::class,'destroy']);

});
route::get('/dash',function(){
    return view('admin.dashboard');
});
