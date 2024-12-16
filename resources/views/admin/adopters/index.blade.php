@extends('adminlte::page')

@section('title', 'Lista de Adotantes')

@section('content_header')
    <h1>Adotantes</h1>
@endsection

@section('content')
    <a href="{{ route('adopters.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Adotante</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>CPF</th>
                <th>Endereço</th>
                <th>Data de Adoção</th>
                <th>Animal Adotado</th>
                <th>Abrigo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($adopters as $adopter)
                <tr>
                    <td>{{ $adopter->name }}</td>
                    <td>{{ $adopter->phone ?? 'N/A' }}</td>
                    <td>{{ $adopter->cpf ?? 'N/A' }}</td>
                    <td>{{ $adopter->street }}, {{ $adopter->city }} - {{ $adopter->state }}</td>
                    <td>{{ $adopter->adoption_date }}</td>
                    <td>{{ $adopter->animal->name ?? 'N/A' }}</td>
                    <td>{{ $adopter->animal->shelter->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('adopters.edit', $adopter->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('adopters.destroy', $adopter->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Nenhum adotante encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
