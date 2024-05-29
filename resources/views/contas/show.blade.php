
@extends('layout.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Visualizar</span>
            <span>
                <a href="{{route('conta.index')}}"  type="button" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{route('conta.edit', ['conta' => $conta->id])}}" class="btn btn-warning btn-sm ">Editar</a>
            </span>
        </div>

       <x-alert />

        <div class="card-body">

            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{$conta->id}}</dd>
                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9">{{$conta->name}}</dd>
                <dt class="col-sm-3">E-mail</dt>
                <dd class="col-sm-9">{{$conta->email}}</dd>
                <dt class="col-sm-3">Data de Criação</dt>
                <dd class="col-sm-9">{{\Carbon\Carbon::parse($conta->created_at)->format('d/m/Y')}}</dd>
                <dt class="col-sm-3">Data de Modificação</dt>
                <dd class="col-sm-9">{{\Carbon\Carbon::parse($conta->updated_at)->format('d/m/Y')}}</dd>
            </dl>

        </div>
    </div>
@endsection

