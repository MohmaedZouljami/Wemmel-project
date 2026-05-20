<x-site-layout title="Alle nieuwsberichten">

    <h1 class="mb-4">Alle nieuwsberichten</h1>

    <a class="btn btn-primary mb-3" href="{{ route('news.create') }}">Nieuw nieuwsbericht</a>

    @if ($newsItems->count() === 0)
        <p>Geen nieuws gevonden.</p>
    @else
        <ul class="list-group">
            @foreach ($newsItems as $news)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $news->title }}</strong><br>
                        <small class="text-muted">{{ $news->created_at }}</small>
                    </div>

                    <a class="btn btn-sm btn-secondary" href="{{ route('news.edit', $news) }}">Bewerken</a>
                </li>
            @endforeach
        </ul>
    @endif

</x-site-layout>
