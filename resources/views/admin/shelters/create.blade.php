@extends('adminlte::page')

@section('title', 'Cadastrar Abrigo')

@section('content_header')
    <h1>Cadastrar Novo Abrigo</h1>
@endsection

@section('content')
    <!-- Form to register a new shelter -->
    <form action="{{ route('shelters.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="street" class="form-label">Rua</label>
            <input type="text" name="street" id="street" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Cidade</label>
            <input type="text" name="city" id="city" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="state" class="form-label">Estado</label>
            <input type="text" name="state" id="state" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="responsible_name" class="form-label">Nome do Responsável</label>
            <input type="text" name="responsible_name" id="responsible_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telefone</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" name="cnpj" id="cnpj" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
