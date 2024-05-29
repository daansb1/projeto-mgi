
@extends('layout.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Editar</span>
            <span>
                <a href="{{route('conta.index')}}"  type="button" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{route('conta.show', ['conta' => $conta->id])}}" class="btn btn-primary btn-sm ">Visualizar</a>
            </span>
        </div>

        {{--Verifica se existe sessão success/error--}}
        <x-alert />


        <div class="card-body">

            <form action="{{route('conta.update', ['conta' => $conta->id ])}}" method="post" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome" value="{{old('name', $conta->name)}}">
                </div>

                <div class="col-12">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="E-mail" value="{{old('email', $conta->email)}}">
                </div>

                <div class="col-12">
                    <label for="password" class="form-label">Alterar Senha:</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Senha" value="{{old('password', $conta->password)}}">
                </div>

                <div class="col-12">
                    <label for="confirm_password" class="form-label">Confirmar Senha:</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirmar Senha" value="{{old('confirm_password', $conta->confirm_password)}}">
                </div>

                <div class="col-12">
                     <button type="submit" class="btn btn-warning  btn-sm">Salvar</button>
                </div>

            </form>

        </div>
    </div>
@endsection

