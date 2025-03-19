<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animais para Adoção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
 
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            backdrop-filter: blur(5px); 
            z-index: 1000; 
        }

        .navbar .nav-link {
            color: white;
        }

        .hero {
            position: relative;
            height: 100vh;
            background: url('/images/hero-image.jpg') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 5%;
            color: white;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        }
        
        .carousel img {
            height: 200px;
            object-fit: cover;
        }

        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card img {
            object-fit: cover;
            height: 200px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light">
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
    <div class="hero">
        <div class="hero-content">
            <h1 class="display-5 fw-bold">Que tal adotar um pet?</h1>
            <p class="lead">Tem um amigo esperando por você em um abrigo!</p>
        </div>
    </div>
    
        <!-- Filter -->
    <!-- Filtro de Animais -->
    <section class="container mt-4">
        <form id="filterForm" class="row g-3 align-items-center">
            <div class="col-md-3">
                <label for="size" class="form-label">Tamanho</label>
                <select id="size" name="size" class="form-select">
                    <option value="" selected>Todos</option>
                    <option value="small">Pequeno</option>
                    <option value="medium">Médio</option>
                    <option value="large">Grande</option>
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
            <select id="gender" name="sex" class="form-select">
                <option value="" selected>Ambos</option>
                <option value="macho">Macho</option>
                <option value="femea">Fêmea</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="shelter" class="form-label">Abrigo</label>
            <select id="shelter" name="shelter" class="form-select">
                <option value="" selected>Todos</option>
                @foreach ($shelters as $shelter)
                    <option value="{{ $shelter->id }}" {{ request('shelter') == $shelter->id ? 'selected' : '' }}>
                        {{ $shelter->name }}
                    </option>
                @endforeach
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
                            <img src="{{ asset('storage/' . $animal->photos->first()->photo_path) }}"
                                class="card-img-top" alt="{{ $animal->name }}">
                        @else
                            <img src="{{ asset('images/default_animal.jpg') }}" class="card-img-top"
                                alt="{{ $animal->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $animal->name }}</h5>
                            <p><strong>Sexo:</strong> {{ $animal->gender }}</p>
                            <p><strong>Idade:</strong> {{ $animal->age }} anos</p>
                            <p><strong>Abrigo:</strong> {{ $animal->shelter->name ?? 'Não informado' }}</p>
                            <button type="button" class="btn btn-primary btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#animalModal"
                                data-name="{{ $animal->name }}"
                                data-gender="{{ $animal->gender }}"
                                data-age="{{ $animal->age }}"
                                data-shelter="{{ $animal->shelter->name ?? 'Não informado' }}"
                                data-contact="{{ $animal->shelter->contact ?? 'Não disponível' }}"
                                data-veterinary="{{ $animal->veterinaryInfo ? json_encode($animal->veterinaryInfo->only(['rabies_vaccine', 'polyvalent_vaccine', 'giardia_vaccine', 'flu_vaccine', 'antiparasitic', 'neutered'])) : '{}' }}"
                                data-temperament="{{ $animal->temperament ? json_encode($animal->temperament->only(['calm', 'playful', 'protective', 'agressive'])) : '{}' }}"
                                data-energy="{{ $animal->energyLevel ? json_encode($animal->energyLevel->only(['high_energy', 'moderate_energy', 'low_energy'])) : '{}' }}"
                                data-relationship="{{ $animal->animalRelationship ? json_encode($animal->animalRelationship->only(['good_with_others', 'dominant_with_others', 'better_alone'])) : '{}' }}">
                                Saiba Mais
                        </button>
                        

                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Nenhum animal disponível no momento.</p>
            @endforelse
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="animalModal" tabindex="-1" aria-labelledby="animalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="animalModalLabel">Detalhes do Animal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nome:</strong> <span id="animalName"></span></p>
                    <p><strong>Sexo:</strong> <span id="animalGender"></span></p>
                    <p><strong>Idade:</strong> <span id="animalAge"></span> anos</p>
                    <p><strong>Abrigo:</strong> <span id="animalShelter"></span></p>
                    <p><strong>Contato do Abrigo:</strong> <span id="shelterContact"></span></p>
                    <p id="animalDescription"></p>
    
                    <div id="veterinaryInfoContainer" class="mb-3" style="display:none;">
                        <strong>Informações Veterinárias:</strong><br>
                        <span id="veterinaryInfoBadges"></span>
                    </div>
    
                    <div id="temperamentContainer" class="mb-3" style="display:none;">
                        <strong>Temperamento:</strong><br>
                        <span id="temperamentBadges"></span>
                    </div>
    
                    <div id="energyLevelContainer" class="mb-3" style="display:none;">
                        <strong>Nível de Energia:</strong><br>
                        <span id="energyLevelBadges"></span>
                    </div>
    
                    <div id="relationshipContainer" class="mb-3" style="display:none;">
                        <strong>Relacionamento:</strong><br>
                        <span id="relationshipBadges"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    
    

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2025 Adote um Amigo. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
    const veterinaryInfoLabels = {
        rabies_vaccine: "Vacina Antirrábica",
        polyvalent_vaccine: "Vacina Polivalente",
        giardia_vaccine: "Vacina Giárdia",
        flu_vaccine: "Vacina Gripe",
        antiparasitic: "Antiparasitário",
        neutered: "Castrado"
    };

    const temperamentLabels = {
        calm: "Calmo",
        playful: "Brincalhão",
        protective: "Protetor",
        agressive: "Agressivo"
    };

    const energyLevelLabels = {
        high_energy: "Alta Energia",
        moderate_energy: "Moderada Energia",
        low_energy: "Baixa Energia"
    };

    const relationshipLabels = {
        good_with_others: "Bom com Outros Animais",
        dominant_with_others: "Dominante",
        better_alone: "Melhor Sozinho"
    };

    const animalModal = document.getElementById('animalModal');
    animalModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        // Exemplo de preenchimento básico
        document.getElementById('animalName').textContent = button.getAttribute('data-name');
        document.getElementById('animalGender').textContent = button.getAttribute('data-gender');
        document.getElementById('animalAge').textContent = button.getAttribute('data-age');
        document.getElementById('animalShelter').textContent = button.getAttribute('data-shelter');
        document.getElementById('shelterContact').textContent = button.getAttribute('data-contact');
        document.getElementById('animalDescription').textContent = button.getAttribute('data-description');

        // Informações Veterinárias
        const veterinaryInfo = JSON.parse(button.getAttribute('data-veterinary') || '{}');
        const veterinaryInfoContainer = document.getElementById('veterinaryInfoContainer');
        const veterinaryInfoBadges = document.getElementById('veterinaryInfoBadges');
        veterinaryInfoBadges.innerHTML = '';
        if (Object.values(veterinaryInfo).some(value => value)) {
            veterinaryInfoContainer.style.display = 'block';
            Object.entries(veterinaryInfo).forEach(([key, value]) => {
                if (value && veterinaryInfoLabels[key]) {
                    const badge = document.createElement('span');
                    badge.className = 'badge bg-success me-1';
                    badge.textContent = veterinaryInfoLabels[key];
                    veterinaryInfoBadges.appendChild(badge);
                }
            });
        } else {
            veterinaryInfoContainer.style.display = 'none';
        }

        // Temperamento
        const temperament = JSON.parse(button.getAttribute('data-temperament') || '{}');
        const temperamentContainer = document.getElementById('temperamentContainer');
        const temperamentBadges = document.getElementById('temperamentBadges');
        temperamentBadges.innerHTML = '';
        if (Object.values(temperament).some(value => value)) {
            temperamentContainer.style.display = 'block';
            Object.entries(temperament).forEach(([key, value]) => {
                if (value && temperamentLabels[key]) {
                    const badge = document.createElement('span');
                    badge.className = 'badge bg-info me-1';
                    badge.textContent = temperamentLabels[key];
                    temperamentBadges.appendChild(badge);
                }
            });
        } else {
            temperamentContainer.style.display = 'none';
        }

        // Nível de Energia
        const energyLevel = JSON.parse(button.getAttribute('data-energy') || '{}');
        const energyLevelContainer = document.getElementById('energyLevelContainer');
        const energyLevelBadges = document.getElementById('energyLevelBadges');
        energyLevelBadges.innerHTML = '';
        if (Object.values(energyLevel).some(value => value)) {
            energyLevelContainer.style.display = 'block';
            Object.entries(energyLevel).forEach(([key, value]) => {
                if (value && energyLevelLabels[key]) {
                    const badge = document.createElement('span');
                    badge.className = 'badge bg-warning me-1';
                    badge.textContent = energyLevelLabels[key];
                    energyLevelBadges.appendChild(badge);
                }
            });
        } else {
            energyLevelContainer.style.display = 'none';
        }

        // Relacionamento
        const relationship = JSON.parse(button.getAttribute('data-relationship') || '{}');
        const relationshipContainer = document.getElementById('relationshipContainer');
        const relationshipBadges = document.getElementById('relationshipBadges');
        relationshipBadges.innerHTML = '';
        if (Object.values(relationship).some(value => value)) {
            relationshipContainer.style.display = 'block';
            Object.entries(relationship).forEach(([key, value]) => {
                if (value && relationshipLabels[key]) {
                    const badge = document.createElement('span');
                    badge.className = 'badge bg-primary me-1';
                    badge.textContent = relationshipLabels[key];
                    relationshipBadges.appendChild(badge);
                }
            });
        } else {
            relationshipContainer.style.display = 'none';
        }
    });
});



    </script>
</body>

</html>
