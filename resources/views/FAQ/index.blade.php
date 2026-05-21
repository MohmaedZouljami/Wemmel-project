<x-site-layout title="FAQ">

    <h1>Veelgestelde vragen</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @auth
        @if(auth()->user()->is_admin)
            <a href="/admin/faq/create" class="btn btn-primary mb-3">Nieuwe vraag toevoegen</a>

            <form method="POST" action="/admin/faq/categorie" class="d-inline">
                @csrf
                <input type="text" name="naam" class="form-control d-inline w-auto" placeholder="Nieuwe categorie" required>
                <button class="btn btn-success">Categorie toevoegen</button>
            </form>
        @endif
    @endauth

    @foreach ($categorieen as $categorie)
        <div class="mb-4">
            <h2>
                {{ $categorie->naam }}
                @auth
                    @if(auth()->user()->is_admin)
                        <form action="/admin/faq/categorie/{{ $categorie->id }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Verwijder categorie</button>
                        </form>
                    @endif
                @endauth
            </h2>
            <hr>

            @foreach ($categorie->vragen as $vraag)
                <div class="mb-3">
                    <strong>{{ $vraag->vraag }}</strong>
                    <p>{{ $vraag->antwoord }}</p>

                    @auth
                        @if(auth()->user()->is_admin)
                            <form action="/admin/faq/{{ $vraag->id }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Verwijderen</button>
                            </form>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    @endforeach

    @if($categorieen->isEmpty())
        <p>Nog geen vragen beschikbaar.</p>
    @endif

</x-site-layout>
