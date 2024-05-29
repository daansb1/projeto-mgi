<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiContaRequest;
use App\Models\Conta;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Exception;

class UserController extends Controller
{

    public function index() : JsonResponse
    {
        // Recupera os usuários do banco de dados, ordenado pelo id em ordem decrescente, paginados
        $users = Conta::orderBy('id', 'DESC')->paginate();

        // Retorna os usuários recuperados como uma resposta Json
        return response()->json([
            'status' => true,
            'message' => $users,
        ],200);
    }


    /**
     * @param Conta $user
     * @return JsonResponse
     *
     * // Exibe os detalhes de um usuário especifíco.
     *
     */
    public function show(Conta $user)
    {
        // Retorna os usuários recuperados como uma resposta Json
        return response()->json([
            'status' => true,
            'user' => $user,
        ],200);
    }

    public function store(ApiContaRequest $request)
    {
        //Inicia transação para inserir dados da API no banco
        DB::beginTransaction();

        try {

           $user =  Conta::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'confirm_password' => $request->confirm_password,
            ]);

           DB::commit();

            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "usuário cadastrado com sucesso",
            ],201);

        } catch (Exception $e){

            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "usuário não cadastrado",
            ],400);

        }
    }
}
