<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animais para Adoção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Adote um Amigo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Início</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Animais Disponíveis para Adoção</h1>
        <div class="row">
            @forelse ($animals as $animal)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ asset('uploads/' . $animal->image) }}" class="card-img-top" alt="{{ $animal->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $animal->name }}</h5>
                            <p class="card-text">{{ Str::limit($animal->veterinary_info, 100) }}</p>
                            <p><strong>Raça:</strong> {{ $animal->breed }}</p>
                            <p><strong>Idade:</strong> {{ $animal->age }} anos</p>
                            <a href="#" class="btn btn-primary">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Nenhum animal disponível no momento.</p>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
