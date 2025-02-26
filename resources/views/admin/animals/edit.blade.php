@extends('adminlte::page')

@section('title', 'Editar Animal')

@section('content')
    <div class="container">
        <h1>Editar Animal</h1>
        <!-- Form to update an animal -->
        <form action="{{ route('animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $animal->name }}" required>
            </div>
            <div class="form-group">
                <label for="age">Idade:</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ $animal->age }}"
                    required>
            </div>
            <div class="form-group">
                <label for="gender">Gênero:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="male" {{ $animal->gender === 'male' ? 'selected' : '' }}>Macho</option>
                    <option value="female" {{ $animal->gender === 'female' ? 'selected' : '' }}>Fêmea</option>
                </select>
            </div>
            <div class="form-group">
                <label for="breed">Raça:</label>
                <input type="text" class="form-control" id="breed" name="breed" value="{{ $animal->breed }}"
                    required>
            </div>
            <div class="form-group">
                <label for="size">Tamanho:</label>
                <select class="form-control" id="size" name="size" required>
                    <option value="small" {{ $animal->size === 'small' ? 'selected' : '' }}>Pequeno</option>
                    <option value="medium" {{ $animal->size === 'medium' ? 'selected' : '' }}>Médio</option>
                    <option value="large" {{ $animal->size === 'large' ? 'selected' : '' }}>Grande</option>
                </select>
            </div>

            <div class="form-group">
                <label for="weight">Peso (kg):</label>
                <input type="number" step="0.1" class="form-control" id="weight" name="weight"
                    value="{{ $animal->weight }}">
            </div>

            <fieldset>
                <legend>Informações Veterinárias</legend>
                @foreach (['rabies_vaccine' => 'Vacina Antirrábica', 'polyvalent_vaccine' => 'Vacina Polivalente', 'giardia_vaccine' => 'Vacina Giárdia', 'flu_vaccine' => 'Vacina Gripe', 'antiparasitic' => 'Antiparasitário', 'neutered' => 'Castrado'] as $field => $label)
                    <div class="form-check">
                        <input type="checkbox" name="veterinary_info[{{ $field }}]" class="form-check-input"
                            id="{{ $field }}"
                            {{ isset($animal->veterinaryInfo) && $animal->veterinaryInfo->$field ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
                    </div>
                @endforeach
            </fieldset>

            <fieldset>
                <legend>Temperamento</legend>
                @foreach (['calm' => 'Calmo', 'playful' => 'Brincalhão', 'protective' => 'Protetor', 'agressive' => 'Agressivo'] as $field => $label)
                    <div class="form-check">
                        <input type="checkbox" name="temperament[{{ $field }}]" class="form-check-input"
                            id="{{ $field }}"
                            {{ isset($animal->temperament) && $animal->temperament->$field ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
                    </div>
                @endforeach
            </fieldset>

            <fieldset>
                <legend>Nível de Energia</legend>
                @foreach (['high_energy' => 'Alta Energia', 'moderate_energy' => 'Moderada Energia', 'low_energy' => 'Baixa Energia'] as $field => $label)
                    <div class="form-check">
                        <input type="checkbox" name="energy_level[{{ $field }}]" class="form-check-input"
                            id="{{ $field }}"
                            {{ isset($animal->energyLevel) && $animal->energyLevel->$field ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
                    </div>
                @endforeach
            </fieldset>

            <fieldset>
                <legend>Relacionamento com Outros Animais</legend>
                @foreach (['good_with_others' => 'Bom com Outros Animais', 'dominant_with_others' => 'Dominante com Outros Animais', 'better_alone' => 'Melhor Sozinho'] as $field => $label)
                    <div class="form-check">
                        <input type="checkbox" name="animal_relationship[{{ $field }}]" class="form-check-input"
                            id="{{ $field }}"
                            {{ isset($animal->animalRelationship) && $animal->animalRelationship->$field ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
                    </div>
                @endforeach
            </fieldset>

            <div class="form-group">
                <label for="shelter_id">Abrigo:</label>
                <select class="form-control" id="shelter_id" name="shelter_id" required>
                    @foreach ($shelters as $shelter)
                        <option value="{{ $shelter->id }}" {{ $animal->shelter_id == $shelter->id ? 'selected' : '' }}>
                            {{ $shelter->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Fotos Existentes:</label>
                <div class="row">
                    @foreach ($animal->photos as $photo)
                        <div class="col-md-3">
                            <img src="{{ asset('storage/' . $photo->photo_path) }}" class="img-thumbnail" width="150">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="delete_photos[]"
                                    value="{{ $photo->id }}">
                                <label class="form-check-label">Excluir</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="photos">Novas Fotos:</label>
                <input type="file" class="form-control" id="photos" name="photos[]" multiple>
            </div>

            <button type="submit" class="btn btn-success">Atualizar</button>
        </form>
    </div>
@endsection
