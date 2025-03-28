@extends('adminlte::page')

@section('title', 'Cadastrar Novo Adotante')

@section('content_header')
    <h1>Cadastrar Novo Adotante</h1>
@endsection

@section('content')
    <!-- Form to register a new adopter -->
    <form action="{{ route('adopters.store') }}" method="POST">
        @csrf

        <!-- Dropdown to select an animal -->
        <div class="mb-3">
            <label for="animal_id" class="form-label">Animal</label>
            <select class="form-select" id="animal_id" name="animal_id" required>
                <option value="">Selecione um animal</option>
                @foreach ($animals as $animal)
                    <option value="{{ $animal->id }}">
                        {{ $animal->name }} (Abrigo: {{ $animal->shelter->name ?? 'N/A' }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="street" class="form-label">Rua</label>
            <input type="text" class="form-control" id="street" name="street" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>

        <div class="mb-3">
            <label for="state" class="form-label">Estado</label>
            <input type="text" class="form-control" id="state" name="state" required>
        </div>

        <div class="mb-3">
            <label for="adoption_date" class="form-label">Data de Adoção</label>
            <input type="date" class="form-control" id="adoption_date" name="adoption_date" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
