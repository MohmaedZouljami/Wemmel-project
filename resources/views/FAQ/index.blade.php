<x-site-layout title="FAQ">

    <h1>Veelgestelde vragen</h1>

    @foreach ($categorieen as $categorie)
        <div class="mb-4">
            <h2>{{ $categorie->naam }}</h2>
            <hr>

            @foreach ($categorie->vragen as $vraag)
                <div class="mb-3">
                    <strong>{{ $vraag->vraag }}</strong>
                    <p>{{ $vraag->antwoord }}</p>
                </div>
            @endforeach
        </div>
    @endforeach

    @if($categorieen->isEmpty())
        <p>Nog geen vragen beschikbaar.</p>
    @endif

</x-site-layout>
