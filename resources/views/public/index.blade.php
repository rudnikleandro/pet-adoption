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


        .navbar-nav .nav-item {
            margin: 0 15px;
        }

        .navbar-nav .nav-link {
            font-size: 18px;
            font-weight: 500;
            color: #ffffff;
            position: relative;
            padding: 8px 0;
            transition: color 0.3s ease-in-out;
        }

        .navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            width: 0;
            height: 2px;
            background: #e1aa08;
            transition: all 0.3s ease-in-out;
            transform: translateX(-50%);
        }

        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }

        .navbar-nav .nav-link:hover {
            color: #e1aa08;
        }

        @media (max-width: 992px) {
            .navbar-nav {
                text-align: center;
            }

            .navbar-nav .nav-item {
                margin: 5px 0;
            }
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

        .full-height {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 0;
        }

        .logos-container {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap; 
        margin-top: 20px;
         }

        .logo-img {
            width: 100px;
            height: auto;
        }

        @media (max-width: 768px) {
            .logo-img {
                width: 80px;
            }
        }

        .underline-text {
            display: inline-block;
            border-bottom: 4px solid #e1aa08;
            padding-bottom: 2px;
        }

        .arrow-down {
            display: inline-block;
            font-size: 32px;
            color: #e1aa08;
            text-decoration: none;
            animation: float 1.5s infinite ease-in-out;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(8px);
            }

            100% {
                transform: translateY(0);
            }
        }

        .arrow-down:hover {
            color: #0056b3;
        }

        .animals {
            background: linear-gradient(135deg, #e0f7fa, #e8f5e9, #fff3e0, #fbe9e7);
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

        .filter-bar {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            transition: all 0.3s ease-in-out;
        }

        .filter-form {
            display: flex;
            flex-wrap: wrap;
        }

        .filter-toggle {
            display: none;
            width: 100%;
            text-align: center;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .filter-toggle {
                display: block;
            }

            .filter-form {
                display: none;
                flex-direction: column;
            }

            .filter-bar.open .filter-form {
                display: flex;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#animals">Animais</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Fale Conosco</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1 class="display-5 fw-bold">Que tal adotar um pet?</h1>
            <p class="lead">Tem um amigo esperando por você em um abrigo!</p>
            <button type="button" class="btn btn-outline-light">Buscar Animais</button>
            <button type="button" class="btn btn-outline-warning">Contato</button>
        </div>
    </div>

    <!-- About -->
    <div id="about" class="about full-height">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">
                    <h2 class="mb-4 fw-bold">Sobre Nós</h2>
                    <p class="lead">
                        Somos um portal dedicado a conectar animais em busca de um lar com pessoas que desejam adotar.
                        Trabalhamos em parceria com abrigos nas cidades de Mafra/SC e Rio Negro/PR, facilitando o
                        processo de adoção e promovendo o bem-estar animal.
                    </p>
                    <p class="lead underline-text">
                        Nossa parceria envolve os seguintes abrigos:
                    </p>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-12 text-center">
                    <div class="logos-container">
                        <img src="/images/dummy1.png" alt="Logo 1" class="logo-img">
                        <img src="/images/dummy2.png" alt="Logo 2" class="logo-img">
                        <img src="/images/dummy3.png" alt="Logo 3" class="logo-img">
                        <img src="/images/dummy4.png" alt="Logo 4" class="logo-img">
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="#animals" class="arrow-down">
                    &#x02C5;
                </a>
            </div>
        </div>
    </div>


   <!-- Animais Disponíveis + Filtros Integrados -->
<div id="animals" class="animals">
    <div class="container mt-4">
        <h1 class="text-center mb-4">Animais Disponíveis para Adoção</h1>

        <div class="row">
            <!-- Menu Lateral de Filtros -->
            <aside class="col-md-3">
                <div class="filter-bar">
                    <h4 class="mb-3">Filtros</h4>
                    <form id="filterForm">
                        <!-- Filtros de Tamanho -->
                        <div class="mb-3">
                            <h5>Tamanho</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="size[]" value="small" id="sizeSmall">
                                <label class="form-check-label" for="sizeSmall">Pequeno</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="size[]" value="medium" id="sizeMedium">
                                <label class="form-check-label" for="sizeMedium">Médio</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="size[]" value="large" id="sizeLarge">
                                <label class="form-check-label" for="sizeLarge">Grande</label>
                            </div>
                        </div>

                        <!-- Filtros de Idade -->
                        <div class="mb-3">
                            <h5>Idade</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="age[]" value="jovem" id="ageJovem">
                                <label class="form-check-label" for="ageJovem">Até 2 anos</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="age[]" value="adulto" id="ageAdulto">
                                <label class="form-check-label" for="ageAdulto">De 2 a 7 anos</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="age[]" value="idoso" id="ageIdoso">
                                <label class="form-check-label" for="ageIdoso">Mais 7 anos</label>
                            </div>
                        </div>


                        <!-- Filtros de Sexo -->
                        <div class="mb-3">
                            <h5>Sexo</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="gender[]" value="male" id="genderMacho">
                                <label class="form-check-label" for="genderMacho">Macho</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="gender[]" value="female" id="genderFemea">
                                <label class="form-check-label" for="genderFemea">Fêmea</label>
                            </div>
                        </div>

                        <!-- Filtros de Abrigo -->
                        <div class="mb-3">
                            <h5>Abrigo</h5>
                            @foreach ($shelters as $shelter)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="shelter[]" value="{{ $shelter->id }}" id="shelter{{ $shelter->id }}">
                                    <label class="form-check-label" for="shelter{{ $shelter->id }}">{{ $shelter->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </aside>

            <!-- Lista de Animais -->
            <div class="col-md-9">
                <div id="animalList" class="row mt-4">
                    @forelse ($animals as $animal)
                    <div class="col-md-4 mb-3 animal-card" 
                    data-size="{{ $animal->size }}" 
                    data-age="{{ $animal->age <= 2 ? 'jovem' : ($animal->age <= 7 ? 'adulto' : 'idoso') }}" 
                    data-gender="{{ $animal->gender }}" 
                    data-shelter="{{ $animal->shelter->id }}">
                            <div class="card">
                                @if ($animal->photos->isNotEmpty())
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
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#animalModal" data-name="{{ $animal->name }}"
                                        data-gender="{{ $animal->gender }}" data-age="{{ $animal->age }}"
                                        data-shelter="{{ $animal->shelter->name ?? 'Não informado' }}"
                                        data-veterinary="{{ json_encode($animal->veterinaryInfo) }}"
                                        data-temperament="{{ json_encode($animal->temperament) }}"
                                        data-energy="{{ json_encode($animal->energyLevel) }}"
                                        data-relationship="{{ json_encode($animal->animalRelationship) }}">
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
        </div>
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
    </div>




    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2025 Adote um Amigo. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // ... (seu código JavaScript existente para o modal) ...

    // Filtros
    const filterForm = document.getElementById('filterForm');
    const animalList = document.getElementById('animalList');
    const animalCards = document.querySelectorAll('.animal-card');

    filterForm.addEventListener('change', function() {
        const selectedSizes = Array.from(document.querySelectorAll('input[name="size[]"]:checked')).map(checkbox => checkbox.value);
        const selectedAges = Array.from(document.querySelectorAll('input[name="age[]"]:checked')).map(checkbox => checkbox.value);
        const selectedGenders = Array.from(document.querySelectorAll('input[name="gender[]"]:checked')).map(checkbox => checkbox.value);
        const selectedShelters = Array.from(document.querySelectorAll('input[name="shelter[]"]:checked')).map(checkbox => checkbox.value);

        animalCards.forEach(card => {
            const cardSize = card.dataset.size;
            const cardAge = card.dataset.age;
            const cardGender = card.dataset.gender;
            const cardShelter = card.dataset.shelter;

            const sizeMatch = selectedSizes.length === 0 || selectedSizes.includes(cardSize);
            const ageMatch = selectedAges.length === 0 || selectedAges.includes(cardAge);
            const genderMatch = selectedGenders.length === 0 || selectedGenders.includes(cardGender);
            const shelterMatch = selectedShelters.length === 0 || selectedShelters.includes(cardShelter);

            if (sizeMatch && ageMatch && genderMatch && shelterMatch) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});







        document.addEventListener('DOMContentLoaded', function() {
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
            animalModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                // Exemplo de preenchimento básico
                document.getElementById('animalName').textContent = button.getAttribute('data-name');
                document.getElementById('animalGender').textContent = button.getAttribute('data-gender');
                document.getElementById('animalAge').textContent = button.getAttribute('data-age');
                document.getElementById('animalShelter').textContent = button.getAttribute('data-shelter');
                document.getElementById('shelterContact').textContent = button.getAttribute('data-contact');
                document.getElementById('animalDescription').textContent = button.getAttribute(
                    'data-description');

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



// filtro mobile
        document.querySelector(".filter-toggle").addEventListener("click", function() {
        document.querySelector(".filter-bar").classList.toggle("open");
    });
    </script>
</body>

</html>
