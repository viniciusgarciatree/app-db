@extends('layouts.layout')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success mt-1 mb-1 pt-1 pb-1">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="row g-2 pt-2 ps-1 pe-1">
    @if(isset($dataBase->id))
        <form action="{{ route('data-base.update',$dataBase->id) }}" method="POST" class="row g-1">
            @csrf
            @method('PUT')
    @else
        <form action="{{ route('data-base.store') }}" method="POST" class="row g-1">
            @csrf
    @endif
        <div class="col-3">
            <input type="text" name="descricao" value="{{ isset($dataBase->descricao) ? $dataBase->descricao : "" }}" class="form-control form-control-sm" placeholder="Descrição:">
        </div>
        <div class="col-3">
            <input type="text" name="host" value="{{ isset($dataBase->host) ? $dataBase->host : "" }}"" class="form-control form-control-sm" placeholder="Host Name:">
        </div>
        <div class="col-1">
            <input type="text" name="port" value="{{ isset($dataBase->port) ? $dataBase->port : "3306" }}"" class="form-control form-control-sm" placeholder="Porta:">
        </div>
        <div class="col-3">
            <input type="text" name="base" value="{{ isset($dataBase->base) ? $dataBase->base : "" }}"" class="form-control form-control-sm" placeholder="Data Base:">
        </div>
        <div class="col-1">
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
        <th scope="col-3">Descrição</th>
        <th scope="col-2">Host Name</th>
        <th scope="col-1">Porta</th>
        <th scope="col-3">Data Base</th>
        <th scope="col-2">Ação</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $value)
    <tr>
        <td class="col-1">{{ $value->id }}</td>
        <td class="col-3">{{ $value->descricao }}</td>
        <td class="col-2">{{ $value->host }}</td>
        <td class="col-1">{{ $value->port }}</td>
        <td class="col-2">{{ $value->base }}</td>
        <td class="col-1">
            <form action="{{ route('data-base.destroy',$value->id) }}" method="POST">
                <a class="btn btn-outline-primary btn-sm" href="{{ route('data-base.edit',$value->id) }}"
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