@extends('adminlte::page')

@section('content')
    <h1>Editar Animal</h1>

    <form action="{{ route('animals.update', $animal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $animal->name }}" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Idade</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ $animal->age }}" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gênero</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="Macho" {{ $animal->gender == 'Macho' ? 'selected' : '' }}>Macho</option>
                <option value="Fêmea" {{ $animal->gender == 'Fêmea' ? 'selected' : '' }}>Fêmea</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="breed" class="form-label">Raça</label>
            <input type="text" class="form-control" id="breed" name="breed" value="{{ $animal->breed }}" required>
        </div>
        <div class="mb-3">
            <label for="size" class="form-label">Tamanho</label>
            <select class="form-select" id="size" name="size" required>
                <option value="Pequeno" {{ $animal->size == 'Pequeno' ? 'selected' : '' }}>Pequeno</option>
                <option value="Médio" {{ $animal->size == 'Médio' ? 'selected' : '' }}>Médio</option>
                <option value="Grande" {{ $animal->size == 'Grande' ? 'selected' : '' }}>Grande</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="veterinary_info" class="form-label">Informações Veterinárias</label>
            <textarea class="form-control" id="veterinary_info" name="veterinary_info" rows="3">{{ $animal->veterinary_info }}</textarea>
        </div>        
        <div class="mb-3">
            <label for="shelter_id" class="form-label">Abrigo</label>
            <select class="form-select" id="shelter_id" name="shelter_id" required>
                @foreach($shelters as $shelter)
                    <option value="{{ $shelter->id }}" {{ $animal->shelter_id == $shelter->id ? 'selected' : '' }}>
                        {{ $shelter->name }} - {{ $shelter->city }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
@endsection
