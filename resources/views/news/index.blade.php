<x-site-layout title="Nieuws">

    <h1>Nieuws</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @auth
        @if(auth()->user()->is_admin)
            <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Nieuw nieuwsbericht</a>
        @endif
    @endauth

    @foreach ($newsItems as $news)
        <div class="card mb-3">
            <div class="card-body">
                <h2>{{ $news->title }}</h2>
                <p class="text-muted">{{ $news->published_at }}</p>
                <a href="{{ route('news.show', $news) }}" class="btn btn-info btn-sm">Lees meer</a>

                @auth
                    @if(auth()->user()->is_admin)
                        <a href="/admin/news/{{ $news->id }}/edit" class="btn btn-secondary btn-sm">Bewerken</a>

                        <form action="/admin/news/{{ $news->id }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Verwijderen</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    @endforeach

</x-site-layout>
