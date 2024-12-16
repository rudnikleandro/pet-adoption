@extends('adminlte::page')

@section('title', 'Lista de Animais')

@section('content_header')
    <h1>Lista de Animais</h1>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('animals.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Animal</a>

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
                <th>Informações Veterinárias</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
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
                        <span 
                            class="text-truncate d-inline-block" 
                            style="max-width: 200px;" 
                            data-bs-toggle="tooltip" 
                            data-bs-placement="top" 
                            title="{{ $animal->veterinary_info }}">
                            {{ \Illuminate\Support\Str::limit($animal->veterinary_info, 30, '...') }}
                        </span>
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
        // Ativa o tooltip do Bootstrap
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
@endsection
