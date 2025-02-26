@extends('adminlte::page')

@section('title', 'Cadastrar Animal')

@section('content')
    <div class="container">
        <h1>Cadastrar Animal</h1>
        <!-- Form to register a new animal -->
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
                <label for="weight">Peso (kg):</label>
                <input type="number" step="0.1" class="form-control" id="weight" name="weight">
            </div>

            <fieldset>
                <legend>Informações Veterinárias</legend>
                @foreach (['rabies_vaccine' => 'Vacina Antirrábica', 'polyvalent_vaccine' => 'Vacina Polivalente', 'giardia_vaccine' => 'Vacina Giárdia', 'flu_vaccine' => 'Vacina Gripe', 'antiparasitic' => 'Antiparasitário', 'neutered' => 'Castrado'] as $field => $label)
                    <div class="form-check">
                        <input type="checkbox" name="veterinary_info[{{ $field }}]" class="form-check-input"
                            id="{{ $field }}">
                        <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
                    </div>
                @endforeach
            </fieldset>

            <fieldset>
                <legend>Temperamento</legend>
                @foreach (['calm' => 'Calmo', 'playful' => 'Brincalhão', 'protective' => 'Protetor', 'agressive' => 'Agressivo'] as $field => $label)
                    <div class="form-check">
                        <input type="checkbox" name="temperament[{{ $field }}]" class="form-check-input"
                            id="{{ $field }}">
                        <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
                    </div>
                @endforeach
            </fieldset>

            <fieldset>
                <legend>Nível de Energia</legend>
                @foreach (['high_energy' => 'Alta Energia', 'moderate_energy' => 'Moderada Energia', 'low_energy' => 'Baixa Energia'] as $field => $label)
                    <div class="form-check">
                        <input type="checkbox" name="energy_level[{{ $field }}]" class="form-check-input"
                            id="{{ $field }}">
                        <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
                    </div>
                @endforeach
            </fieldset>

            <fieldset>
                <legend>Relacionamento com Outros Animais</legend>
                @foreach (['good_with_others' => 'Bom com Outros Animais', 'dominant_with_others' => 'Dominante com Outros Animais', 'better_alone' => 'Melhor Sozinho'] as $field => $label)
                    <div class="form-check">
                        <input type="checkbox" name="animal_relationship[{{ $field }}]" class="form-check-input"
                            id="{{ $field }}">
                        <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
                    </div>
                @endforeach
            </fieldset>

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
