<x-site-layout title="FAQ">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Veelgestelde vragen</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @auth
        @if(auth()->user()->is_admin)
            <div class="card shadow-sm mb-4 p-3">
                <h5>Admin beheer</h5>
                <div class="d-flex gap-2 align-items-center flex-wrap">
                    <a href="/admin/faq/create" class="btn btn-dark">Nieuwe vraag toevoegen</a>
                    <form method="POST" action="/admin/faq/categorie" class="d-flex gap-2">
                        @csrf
                        <input type="text" name="naam" class="form-control" placeholder="Nieuwe categorie" required>
                        <button class="btn btn-success">Toevoegen</button>
                    </form>
                </div>
            </div>
        @endif
    @endauth

    @if($categorieen->isEmpty())
        <p>Nog geen vragen beschikbaar.</p>
    @else
        <div class="accordion" id="faqAccordion">
            @foreach ($categorieen as $categorie)
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h2 class="fw-bold" style="color:#1a3a6b;">{{ $categorie->naam }}</h2>
                        @auth
                            @if(auth()->user()->is_admin)
                                <form action="/admin/faq/categorie/{{ $categorie->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Verwijder categorie</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                    <hr>

                    @foreach ($categorie->vragen as $index => $vraag)
                        <div class="accordion-item mb-2 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#vraag{{ $vraag->id }}">
                                    {{ $vraag->vraag }}
                                </button>
                            </h2>
                            <div id="vraag{{ $vraag->id }}" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    {{ $vraag->antwoord }}
                                    @auth
                                        @if(auth()->user()->is_admin)
                                            <form action="/admin/faq/{{ $vraag->id }}" method="POST" class="mt-2">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Verwijderen</button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</x-site-layout>
