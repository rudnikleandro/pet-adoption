@extends('adminlte::page')

@section('title', 'Cadastrar Animal')

@section('content')
<div class="container">
    <h1>Cadastrar Animal</h1>
    <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="age">Idade:</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="gender">Gênero:</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="male">Macho</option>
                <option value="female">Fêmea</option>
            </select>
        </div>
        <div class="form-group">
            <label for="breed">Raça:</label>
            <input type="text" class="form-control" id="breed" name="breed" required>
        </div>
        <div class="form-group">
            <label for="size">Tamanho:</label>
            <select class="form-control" id="size" name="size" required>
                <option value="small">Pequeno</option>
                <option value="medium">Médio</option>
                <option value="large">Grande</option>
            </select>
        </div>
        <div class="form-group">
            <label for="veterinary_info">Informações Veterinárias:</label>
            <textarea class="form-control" id="veterinary_info" name="veterinary_info"></textarea>
        </div>
        <div class="form-group">
            <label for="shelter_id">Abrigo:</label>
            <select class="form-control" id="shelter_id" name="shelter_id" required>
                @foreach ($shelters as $shelter)
                    <option value="{{ $shelter->id }}">{{ $shelter->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="photos">Fotos:</label>
            <input type="file" class="form-control" id="photos" name="photos[]" multiple>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
