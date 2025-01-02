<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animais para Adoção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel img {
            height: 200px;
            object-fit: cover;
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Adoção Pet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Fale Conosco</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Quem Somos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="px-4 py-5 my-5 text-center">
        <img src="{{ asset('storage/images/paw.png') }}" alt="Logo" width="100" height="100">
        <h1 class="display-5 fw-bold text-body-emphasis">Adote um Pet</h1>
        <div class="col-lg-6 mx-auto">
          <p class="lead mb-4">Adotar um pet é um ato de amor que transforma vidas. Além de oferecer um lar para animais que muitas vezes foram abandonados ou maltratados, você ganha um companheiro fiel e cheio de carinho.</p>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Fale Conosco</button>
            <button type="button" class="btn btn-outline-secondary btn-lg px-4">Quem Somos</button>
          </div>
        </div>
      </div>

    <!-- Filter -->
    <!-- Filtro de Animais -->
<section class="container mt-4">
    <form method="GET" action="" class="row g-3 align-items-center">
        <div class="col-md-3">
            <label for="size" class="form-label">Tamanho</label>
            <select id="size" name="size" class="form-select">
                <option value="" selected>Todos</option>
                <option value="pequeno">Pequeno</option>
                <option value="medio">Médio</option>
                <option value="grande">Grande</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="color" class="form-label">Cor</label>
            <select id="color" name="color" class="form-select">
                <option value="" selected>Todas</option>
                <option value="preto">Preto</option>
                <option value="branco">Branco</option>
                <option value="marrom">Marrom</option>
                <option value="cinza">Cinza</option>
                <option value="amarelo">Amarelo</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="coat" class="form-label">Pelagem</label>
            <select id="coat" name="coat" class="form-select">
                <option value="" selected>Todas</option>
                <option value="curta">Curta</option>
                <option value="media">Média</option>
                <option value="longa">Longa</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="age" class="form-label">Idade</label>
            <select id="age" name="age" class="form-select">
                <option value="" selected>Todas</option>
                <option value="jovem">Jovem (até 2 anos)</option>
                <option value="adulto">Adulto (2 a 7 anos)</option>
                <option value="idoso">Idoso (7+ anos)</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="sex" class="form-label">Sexo</label>
            <select id="sex" name="sex" class="form-select">
                <option value="" selected>Ambos</option>
                <option value="macho">Macho</option>
                <option value="femea">Fêmea</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="castrated" class="form-label">Castrado</label>
            <select id="castrated" name="castrated" class="form-select">
                <option value="" selected>Todos</option>
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="shelter" class="form-label">Abrigo</label>
            <select id="shelter" name="shelter" class="form-select">
                <option value="" selected>Todos</option>

            </select>
        </div>

        <div class="col-md-3 text-end">
            <label class="form-label d-block">&nbsp;</label>
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </div>
    </form>
</section>


    <!-- Main Content -->
    <div class="container mt-4">
        <h1 class="text-center mb-4">Animais Disponíveis para Adoção</h1>
        <div class="row">
            @forelse ($animals as $animal)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        @if ($animal->photos->count() > 0)
                            <div id="carousel-{{ $animal->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($animal->photos as $key => $photo)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <img 
                                                data-src="{{ asset('storage/' . $photo->photo_path) }}" 
                                                class="d-block w-100 lazyload" 
                                                alt="{{ $animal->name }}"
                                            >
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
                            <img 
                                data-src="{{ asset('images/default_animal.jpg') }}" 
                                class="card-img-top lazyload" 
                                alt="{{ $animal->name }}"
                            >
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $animal->name }}</h5>
                            <p class="card-text">{{ Str::limit($animal->veterinary_info, 100) }}</p>
                            <p><strong>Raça:</strong> {{ $animal->breed }}</p>
                            <p><strong>Idade:</strong> {{ $animal->age }} anos</p>
                            <a href="{{ route('animals.show', $animal->id) }}" class="btn btn-primary btn-sm">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Nenhum animal disponível no momento.</p>
            @endforelse
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Adote um Amigo. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
