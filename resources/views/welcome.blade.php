<x-site-layout title="Gemeente Wemmel">

    {{-- Hero sectie met foto --}}
    <div class="position-relative mb-5" style="height: 500px; overflow: hidden; border-radius: 12px;">
        <img src="/images/kasteel.jpg"
             alt="Gemeente Wemmel"
             style="width:100%; height:100%; object-fit:cover; filter:brightness(0.5);">
        <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
            <h1 class="display-3 fw-bold">Gemeente Wemmel</h1>
            <p class="lead fs-4">Officiële website van de gemeente Wemmel - 1780</p>
            <a href="/contact" class="btn btn-light btn-lg mt-3">Contacteer ons</a>
            <a href="/news" class="btn btn-outline-light btn-lg mt-3 ms-2">Bekijk nieuws</a>
        </div>
    </div>

    {{-- Laatste nieuws --}}
    <h2 class="mb-4 fw-bold">Laatste nieuws</h2>
    <div class="row mb-4">
        @php
            $fotos = [
                'Sport' => '/images/sport.jpeg',
                'Mobiliteit' => '/images/mobiliteit.jpg',
                'Evenementen' => '/images/evenementen.jpg',
                'Cultuur' => '/images/cultuur.jpg',
                'Jeugd' => '/images/jeugd.jpg',
                'Algemeen' => '/images/kasteel.jpg',
            ];
        @endphp

        @foreach($nieuwsItems as $nieuws)
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $fotos[$nieuws->category] ?? '/images/kasteel.jpg' }}"
                         class="card-img-top" style="height:200px; object-fit:cover;" alt="nieuws">
                    <div class="card-body">
                        <span class="badge bg-success mb-2">{{ $nieuws->category ?? 'Algemeen' }}</span>
                        <h5 class="card-title">{{ $nieuws->title }}</h5>
                        <p class="card-text text-muted small">{{ $nieuws->published_at }}</p>
                        <p class="card-text">{{ Str::limit($nieuws->content, 80) }}</p>
                        <a href="/news/{{ $nieuws->id }}" class="btn btn-dark btn-sm">Lees meer</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mb-5">
        <a href="/news" class="btn btn-outline-dark btn-lg">Alle nieuwsberichten</a>
    </div>

    {{-- Info sectie --}}
    <div class="row mb-5">
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm border-0 text-center p-4" style="background-color: #f0f4ff;">
                <div class="card-body">
                    <h2 style="color:#1a3a6b;">FAQ</h2>
                    <h5 class="card-title mt-2">Veelgestelde vragen</h5>
                    <p class="card-text">Vind snel antwoorden op de meest gestelde vragen over onze gemeente.</p>
                    <a href="/faq" class="btn btn-dark">Bekijk FAQ</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm border-0 text-center p-4" style="background-color: #f0fff4;">
                <div class="card-body">
                    <h2 style="color:#2e7d32;">@</h2>
                    <h5 class="card-title mt-2">Contact</h5>
                    <p class="card-text">Heeft u een vraag of opmerking? Neem contact op met het gemeentebestuur.</p>
                    <a href="/contact" class="btn btn-dark">Contacteer ons</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm border-0 text-center p-4" style="background-color: #fff8f0;">
                <div class="card-body">
                    <h2 style="color:#e65100;">Account</h2>
                    <h5 class="card-title mt-2">Mijn account</h5>
                    <p class="card-text">Log in om uw profiel te beheren en gebruik te maken van alle diensten.</p>
                    @auth
                        <a href="/profiel" class="btn btn-dark">Mijn profiel</a>
                    @else
                        <a href="/login" class="btn btn-dark">Inloggen</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    {{-- Banner --}}
    <div class="p-5 mb-4 rounded-3 text-white text-center" style="background: linear-gradient(135deg, #1a3a6b, #2e7d32);">
        <h3>Wemmel - Een gemeente voor iedereen</h3>
        <p>Postcode 1780 | Provincie Vlaams-Brabant | België</p>
    </div>

</x-site-layout>
