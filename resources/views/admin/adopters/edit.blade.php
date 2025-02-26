@extends('adminlte::page')

@section('title', 'Editar Adotante')

@section('content_header')
    <h1>Editar Adotante</h1>
@endsection

@section('content')
    <!-- Form to update adopter details -->
    <form action="{{ route('adopters.update', $adopter->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Dropdown to select an animal -->
        <div class="mb-3">
            <label for="animal_id" class="form-label">Animal</label>
            <select class="form-select" id="animal_id" name="animal_id" required>
                <option value="">Selecione um animal</option>
                @foreach ($animals as $animal)
                    <option value="{{ $animal->id }}" {{ $adopter->animal_id == $animal->id ? 'selected' : '' }}>
                        {{ $animal->name }} (Abrigo: {{ $animal->shelter->name ?? 'N/A' }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $adopter->name }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $adopter->phone }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $adopter->email }}">
        </div>

        <div class="mb-3">
            <label for="street" class="form-label">Rua</label>
            <input type="text" class="form-control" id="street" name="street" value="{{ $adopter->street }}"
                required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ $adopter->city }}" required>
        </div>

        <div class="mb-3">
            <label for="state" class="form-label">Estado</label>
            <input type="text" class="form-control" id="state" name="state" value="{{ $adopter->state }}"
                required>
        </div>

        <div class="mb-3">
            <label for="adoption_date" class="form-label">Data de Adoção</label>
            <input type="date" class="form-control" id="adoption_date" name="adoption_date"
                value="{{ $adopter->adoption_date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
@endsection
