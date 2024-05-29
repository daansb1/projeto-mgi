<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Illuminate\Http\Request;
use Exception;


class ContaController extends Controller
{
    // Listar
    public function index()
    {

        // Recuperar os registros do banco de dados
        $contas =  Conta::orderByDesc('created_at')->paginate(10);

        // Carregar a view
        return view ('contas.index', ['contas' =>$contas]);
    }

    // Detalhes
    public function show(Conta $conta)
    {

        // Carregar a view
        return view ('contas.show', ['conta' => $conta]);
    }

    // Cadastrar
    public function create()
    {
        // Carregar a view
        return view ('contas.create');
    }


    // Cadastra no banco de dados
    public function store(ContaRequest $request)
    {

        // Validar formulario
        $request->validated();

        try {


            // Cadastrar no banco de dados na tabela contas os valores dos campos
            $conta = Conta::create($request->all());


            // Redirecionar o usuário, Sucesso!
            return redirect()->route('conta.show', ['conta' => $conta->id])->with('success', 'Cadastrado com sucesso');
        } catch (Exception $e) {

            return back()->withInput()->with('error', 'Registro não cadastrado por falha no sistema!');

        }
    }

    // Editar
    public function edit(Conta $conta)
    {

        // Carregar a view
        return view ('contas.edit', ['conta' => $conta]);
    }

    // Editar no banco de dados
    public function update(ContaRequest $request, Conta $conta)
    {
        // Validar Formulário
        $request->validated();

        try {

        $conta->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'confirm_password' => $request->confirm_password,
        ]);

        // Redirecionar o usuário, Sucesso!
        return redirect()->route('conta.show', ['conta' => $conta->id ])->with('success', 'Registro editado com sucesso');

        } catch (Exception $e) {

            return back()->withInput()->with('error', 'Registro não editada por falha no sistema!');

        }

    }

    // Deletar
    public function destroy(Conta $conta)
    {
        // Excluir o registro
        $conta->delete();


        // Redirecionar o usuário, Sucesso!
        return redirect()->route('conta.index')->with('success', 'Registro apagado com sucesso');
    }


}
