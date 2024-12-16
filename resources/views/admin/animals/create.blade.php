@extends('adminlte::page')

@section('content')
    <h1>Cadastrar Novo Animal</h1>

    <form action="{{ route('animals.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Idade</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gênero</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="Macho">Macho</option>
                <option value="Fêmea">Fêmea</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="breed" class="form-label">Raça</label>
            <input type="text" class="form-control" id="breed" name="breed" required>
        </div>
        <div class="mb-3">
            <label for="size" class="form-label">Tamanho</label>
            <select class="form-select" id="size" name="size" required>
                <option value="Pequeno">Pequeno</option>
                <option value="Médio">Médio</option>
                <option value="Grande">Grande</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="veterinary_info" class="form-label">Informações Veterinárias</label>
            <textarea class="form-control" id="veterinary_info" name="veterinary_info" rows="3"></textarea>
        </div>               
        <div class="mb-3">
            <label for="shelter_id" class="form-label">Abrigo</label>
            <select class="form-select" id="shelter_id" name="shelter_id" required>
                <option value="" disabled selected>Selecione um abrigo</option>
                @foreach($shelters as $shelter)
                    <option value="{{ $shelter->id }}">{{ $shelter->name }} - {{ $shelter->city }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
