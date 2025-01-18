@extends('adminlte::page')

@section('title', 'Abrigos')

@section('content_header')
    <h1>Abrigos</h1>
@endsection

@section('content')
    <!-- Button to navigate to the shelter registration page -->
    <a href="{{ route('shelters.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Abrigo</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Responsável</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shelters as $shelter)
                <tr>
                    <td>{{ $shelter->name }}</td>
                    <td>{{ $shelter->city }}</td>
                    <td>{{ $shelter->state }}</td>
                    <td>{{ $shelter->responsible_name }}</td>
                    <td>
                        <a href="{{ route('shelters.edit', $shelter->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('shelters.destroy', $shelter->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
