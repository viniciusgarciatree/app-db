@extends('layouts.layout')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success mt-1 mb-1 pt-1 pb-1">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="row g-2 pt-2 ps-1 pe-1">
    @if(isset($dataBase->id))
        <form action="{{ route('user-data-base.update',$entUserDataBase->id) }}" method="POST" class="row g-1">
            @csrf
            @method('PUT')
    @else
        <form action="{{ route('user-data-base.store') }}" method="POST" class="row g-1">
            @csrf
    @endif
        <div class="col-5">
            <input type="text" name="nome" value="{{ isset($entUserDataBase->nome) ? $entUserDataBase->nome : "" }}" class="form-control form-control-sm" placeholder="Nome:">
        </div>
        <div class="col-5">
            <input type="text" name="senha" value="{{ isset($entUserDataBase->senha) ? $entUserDataBase->senha : "" }}"" class="form-control form-control-sm" placeholder="Senha:">
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-outline-success btn-sm" 
                data-bs-toggle="tooltip" data-bs-placement="top" title="Adicionar / Salvar"
            > <i class="bi bi-plus-lg"></i> / <i class="bi bi-save"></i></button>
        </div>
    </form>
</div>


<div class="table-responsive-sm me-1 mt-2" data-bs-spy="scroll" data-bs-offset="1" tabindex="0">
<table class="table table-sm table-hover ms-1 mt-0 pt-0" id="contaTable">
    <thead>
    <tr>
        <th scope="col-1">#</th>
        <th scope="col-9">Nome</th>
        <th scope="col-2">Ação</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $value)
    <tr>
        <td class="col-1">{{ ++$key }}</td>
        <td class="col-9">{{ $value->nome }}</td>
        <td class="col-2">
            <form action="{{ route('user-data-base.destroy',$value->id) }}" method="POST">
                <a class="btn btn-outline-primary btn-sm" href="{{ route('user-data-base.edit',$value->id) }}"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"
                ><i class="bi bi-pencil-square"></i></a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Remover"
                ><i class="bi bi-trash"></i></button>
            </form>
        </td>
    </tr>    
    @endforeach
    
  </tbody>
  </table>
</div>

@endsection