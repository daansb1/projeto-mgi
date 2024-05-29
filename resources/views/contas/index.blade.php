
@extends('layout.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Listar</span>
            <span>
                <a href="{{route('conta.create')}}">
                    <button type="button" class="btn btn-success btn-sm">Cadastrar</button>
                </a>
            </span>
        </div>

        <x-alert />

        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Data Inserção</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($contas as $conta)
                    <tr>
                        <th>{{$conta->id}}</th>
                        <td>{{$conta->name}}</td>
                        <td>{{$conta->email}}</td>
                        <td>{{ \Carbon\Carbon::parse($conta->created_at)->format('d/m/Y')}}</td>
                        <td class="d-md-flex justify-content-center">
                            <a href="{{route('conta.show', ['conta' => $conta->id])}}" type="button" class="btn btn-primary btn-sm me-1">Visualizar</a>
                            <a href="{{route('conta.edit', ['conta' => $conta->id])}}"type="button" class="btn btn-warning btn-sm me-1">Editar</a>
                            <form id="formExcluir{{$conta->id}}"  action="{{ route('conta.destroy', ['conta' => $conta->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm me-1" onclick="confirmarExclusao(event, {{$conta->id}})">
                                    Apagar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <span style="color: #FF2D20">Nenhuma conta encontrada</span>
                @endforelse
                </tbody>
            </table>
            {{ $contas->onEachSide(0)->links() }}
        </div>
    </div>
@endsection

