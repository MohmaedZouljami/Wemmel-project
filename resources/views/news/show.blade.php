<x-site-layout title="{{ $news->title }}">

    <h1>{{ $news->title }}</h1>
    <p class="text-muted">{{ $news->published_at }}</p>
    <hr>
    <p>{{ $news->content }}</p>

    <a href="{{ route('news.index') }}" class="btn btn-secondary">Terug naar nieuws</a>

    <hr>
    <h3>Commentaren</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @auth
        <form method="POST" action="/news/{{ $news->id }}/commentaar">
            @csrf
            <div class="mb-3">
                <label>Jouw commentaar</label>
                <textarea name="inhoud" class="form-control" rows="3" required minlength="2"></textarea>
            </div>
            <button class="btn btn-primary">Verstuur</button>
        </form>
    @else
        <p><a href="/login">Log in</a> om een commentaar te plaatsen.</p>
    @endauth

    <hr>

    @foreach($news->commentaren as $commentaar)
        <div class="card mb-3">
            <div class="card-body">
                <strong>{{ $commentaar->gebruiker->name }}</strong>
                <small class="text-muted">{{ $commentaar->created_at }}</small>
                <p>{{ $commentaar->inhoud }}</p>

                @auth
                    @if(auth()->user()->is_admin || auth()->id() === $commentaar->user_id)
                        <form action="/commentaar/{{ $commentaar->id }}" method="POST" style="display:inline">
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
        <p>Nog geen commentaren.</p>
    @endif

</x-site-layout>
