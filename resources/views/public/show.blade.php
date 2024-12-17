<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $animal->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel img {
            height: 300px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Adote um Amigo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Início</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center">{{ $animal->name }}</h1>

        <div class="row mt-4">
            <div class="col-md-6">
                @if ($animal->photos->count() > 0)
                    <div id="carousel-{{ $animal->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($animal->photos as $key => $photo)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $photo->photo_path) }}" class="d-block w-100" alt="{{ $animal->name }}">
                                </div>
                            @endforeach
                        </div>
                        @if ($animal->photos->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $animal->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $animal->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Próximo</span>
                            </button>
                        @endif
                    </div>
                @else
                    <img src="{{ asset('images/default_animal.jpg') }}" class="img-fluid" alt="{{ $animal->name }}">
                @endif
            </div>
            <div class="col-md-6">
                <p><strong>Raça:</strong> {{ $animal->breed }}</p>
                <p><strong>Idade:</strong> {{ $animal->age }} anos</p>
                <p><strong>Gênero:</strong> {{ $animal->gender }}</p>
                <p><strong>Tamanho:</strong> {{ $animal->size }}</p>
                <p><strong>Informações Veterinárias:</strong> {{ $animal->veterinary_info }}</p>
                <p><strong>Abrigo:</strong> {{ $animal->shelter->name }}</p>
                <p><strong>Localização:</strong> {{ $animal->shelter->city }}, {{ $animal->shelter->state }}</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
