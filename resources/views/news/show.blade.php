<x-site-layout title="{{ $news->title }}">

    {{-- Hero --}}
    <div class="position-relative mb-4" style="height: 300px; overflow: hidden; border-radius: 12px;">
        <img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1400"
             style="width:100%; height:100%; object-fit:cover; filter:brightness(0.5);" alt="nieuws">
        <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
            <span class="badge bg-success mb-2">{{ $news->category ?? 'Algemeen' }}</span>
            <h1 class="fw-bold">{{ $news->title }}</h1>
            <p>{{ $news->published_at }}</p>
        </div>
    </div>

    {{-- Inhoud --}}
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm p-4 mb-4">
                <p class="fs-5">{{ $news->content }}</p>
            </div>

            <a href="{{ route('news.index') }}" class="btn btn-dark mb-4">Terug naar nieuws</a>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Commentaren --}}
            <h3 class="fw-bold mb-3">Commentaren ({{ $news->commentaren->count() }})</h3>

            @auth
                <div class="card shadow-sm p-3 mb-4">
                    <form method="POST" action="/news/{{ $news->id }}/commentaar">
                        @csrf
                        <div class="mb-3">
                            <label>Jouw commentaar</label>
                            <textarea name="inhoud" class="form-control" rows="3" required minlength="2"></textarea>
                        </div>
                        <button class="btn btn-dark">Verstuur</button>
                    </form>
                </div>
            @else
                <div class="alert alert-info">
                    <a href="/login">Log in</a> om een commentaar te plaatsen.
                </div>
            @endauth

            @foreach($news->commentaren as $commentaar)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <strong>{{ $commentaar->gebruiker->name }}</strong>
                            <small class="text-muted">{{ $commentaar->created_at }}</small>
                        </div>
                        <p class="mt-2">{{ $commentaar->inhoud }}</p>
                        @auth
                            @if(auth()->user()->is_admin || auth()->id() === $commentaar->user_id)
                                <form action="/commentaar/{{ $commentaar->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Verwijderen</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach

            @if($news->commentaren->isEmpty())
                <p class="text-muted">Nog geen commentaren.</p>
            @endif
        </div>

        {{-- Sidebar --}}
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h5>Meer nieuws</h5>
                <hr>
                <a href="/news" class="btn btn-outline-dark w-100">Alle nieuwsberichten</a>
            </div>
        </div>
    </div>

</x-site-layout>
