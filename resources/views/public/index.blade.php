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
        <h1 class="display-5 fw-bold text-body-emphasis">Adote um Pet</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Adotar um pet é um ato de amor que transforma vidas. Além de oferecer um lar para
                animais que muitas vezes foram abandonados ou maltratados, você ganha um companheiro fiel e cheio de
                carinho.</p>
        </div>
    </div>

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
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#animalModal" data-name="{{ $animal->name }}"
                                data-gender="{{ $animal->gender }}" data-age="{{ $animal->age }}"
                                data-shelter="{{ $animal->shelter->name ?? 'Não informado' }}"
                                data-contact="{{ $animal->shelter->contact ?? 'Não disponível' }}"
                                data-description="{{ $animal->description ?? 'Sem descrição' }}">
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
                    <p><strong>Contato:</strong> <span id="shelterContact"></span></p>
                    <p><strong>Descrição:</strong></p>
                    <p id="animalDescription"></p>
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
        document.addEventListener('DOMContentLoaded', function() {
            const animalModal = document.getElementById('animalModal');
            animalModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; 
                const name = button.getAttribute('data-name');
                const gender = button.getAttribute('data-gender');
                const age = button.getAttribute('data-age');
                const shelter = button.getAttribute('data-shelter');
                const contact = button.getAttribute('data-contact');
                const description = button.getAttribute('data-description');

                document.getElementById('animalName').textContent = name;
                document.getElementById('animalGender').textContent = gender;
                document.getElementById('animalAge').textContent = age;
                document.getElementById('animalShelter').textContent = shelter;
                document.getElementById('shelterContact').textContent = contact;
                document.getElementById('animalDescription').textContent = description;
            });
        });
    </script>
</body>

</html>
