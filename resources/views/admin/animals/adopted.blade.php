@extends('adminlte::page')

@section('title', 'Animais Adotados')

@section('content_header')
    <h1>Animais Adotados</h1>
@endsection

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Adotante</th>
                    <th>Contato do Adotante</th>
                    <th>Abrigo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($adoptedAnimals as $animal)
                    <tr>
                        <td>
                            @if ($animal->photos->count() > 0)
                                <img src="{{ asset('storage/' . $animal->photos->first()->photo_path) }}" alt="{{ $animal->name }}" style="width: 100px; height: auto;">
                            @else
                                <img src="{{ asset('images/default_animal.jpg') }}" alt="{{ $animal->name }}" style="width: 100px; height: auto;">
                            @endif
                        </td>
                        <td>{{ $animal->name }}</td>
                        <td>{{ $animal->adopter->name }}</td>
                        <td>{{ $animal->adopter->phone ?? 'Não informado' }}</td>
                        <td>{{ $animal->shelter->name ?? 'Não informado' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Nenhum animal foi adotado ainda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
