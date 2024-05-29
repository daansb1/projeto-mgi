<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*Route::get('/users', function (Request $request) {
    return response()->json([
        'status' => true,
        'message' => "Listar usuários",
    ],200);
});*/



Route::get('/users', [UserController::class, 'index']); // Para chamar a API método GET http://127.0.0.1:8000/api/users?page=2 está com paginação 10 registros por página
//Route::get('/users/', [UserController::class, 'show']); // GET http://127.0.0.1:8000/api/users/37
Route::post('/users', [UserController::class, 'store']); // POST http://127.0.0.1:8000/api/users/



