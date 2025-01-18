@extends('adminlte::page')

@section('title', 'Editar Abrigo')

@section('content_header')
    <h1>Editar Abrigo</h1>
@endsection

@section('content')
    <!-- Form to edit an existing shelter -->
    <form action="{{ route('shelters.update', $shelter->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" value="{{ $shelter->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="street" class="form-label">Rua</label>
            <input type="text" name="street" id="street" value="{{ $shelter->street }}" class="form-control"
                required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Cidade</label>
            <input type="text" name="city" id="city" value="{{ $shelter->city }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="state" class="form-label">Estado</label>
            <input type="text" name="state" id="state" value="{{ $shelter->state }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="responsible_name" class="form-label">Nome do Responsável</label>
            <input type="text" name="responsible_name" id="responsible_name" value="{{ $shelter->responsible_name }}"
                class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telefone</label>
            <input type="text" name="phone" id="phone" value="{{ $shelter->phone }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" name="cnpj" id="cnpj" value="{{ $shelter->cnpj }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
@endsection
