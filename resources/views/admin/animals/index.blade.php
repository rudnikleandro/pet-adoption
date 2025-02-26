@extends('adminlte::page')

@section('title', 'Lista de Animais')

@section('content_header')
    <h1>Lista de Animais</h1>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button to navigate to the "Create New Animal" page -->
    <a href="{{ route('animals.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Animal</a>

    <!-- Table to display the list of animals -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Gênero</th>
                <th>Raça</th>
                <th>Tamanho</th>
                <th>Abrigo</th>
                <th>Informações</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iterate through the list of animals -->
            @forelse($animals as $animal)
                <tr>
                    <td>{{ $animal->id }}</td>
                    <td>{{ $animal->name }}</td>
                    <td>{{ $animal->age }}</td>
                    <td>{{ $animal->gender }}</td>
                    <td>{{ $animal->breed }}</td>
                    <td>{{ $animal->size }}</td>
                    <td>{{ $animal->shelter->name ?? 'N/A' }}</td>
                    <td>
                        <strong>Veterinárias:</strong><br>
                        @foreach (['Vacina Antirrábica' => 'rabies_vaccine', 'Vacina Polivalente' => 'polyvalent_vaccine', 'Vacina Giárdia' => 'giardia_vaccine', 'Vacina Gripe' => 'flu_vaccine', 'Antiparasitário' => 'antiparasitic', 'Castrado' => 'neutered'] as $label => $field)
                            @if (optional($animal->veterinaryInfo)->$field)
                                <span class="badge bg-success">{{ $label }}</span>
                            @endif
                        @endforeach
                        <br>
                        <strong>Temperamento:</strong><br>
                        @foreach (['Calmo' => 'calm', 'Brincalhão' => 'playful', 'Protetor' => 'protective', 'Agressivo' => 'agressive'] as $label => $field)
                            @if (optional($animal->temperament)->$field)
                                <span class="badge bg-info">{{ $label }}</span>
                            @endif
                        @endforeach
                        <br>
                        <strong>Nível de Energia:</strong><br>
                        @foreach (['Alta Energia' => 'high_energy', 'Moderada Energia' => 'moderate_energy', 'Baixa Energia' => 'low_energy'] as $label => $field)
                            @if (optional($animal->energyLevel)->$field)
                                <span class="badge bg-warning">{{ $label }}</span>
                            @endif
                        @endforeach
                        <br>
                        <strong>Relacionamento:</strong><br>
                        @foreach (['Bom com Outros Animais' => 'good_with_others', 'Dominante' => 'dominant_with_others', 'Melhor Sozinho' => 'better_alone'] as $label => $field)
                            @if (optional($animal->animalRelationship)->$field)
                                <span class="badge bg-primary">{{ $label }}</span>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Nenhum animal encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
@endsection
