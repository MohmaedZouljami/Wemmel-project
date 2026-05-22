<x-site-layout title="Nieuws">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Nieuws</h1>
        @auth
            @if(auth()->user()->is_admin)
                <a href="{{ route('news.create') }}" class="btn btn-dark">Nieuw nieuwsbericht</a>
            @endif
        @endauth
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach ($newsItems as $news)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=400"
                         class="card-img-top" style="height:200px; object-fit:cover;" alt="nieuws">
                    <div class="card-body">
                        <span class="badge bg-success mb-2">{{ $news->category ?? 'Algemeen' }}</span>
                        <h5 class="card-title">{{ $news->title }}</h5>
                        <p class="card-text text-muted small">{{ $news->published_at }}</p>
                        <p class="card-text">{{ Str::limit($news->content, 80) }}</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="{{ route('news.show', $news) }}" class="btn btn-dark btn-sm">Lees meer</a>
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
            </div>
        @endforeach
    </div>

</x-site-layout>
