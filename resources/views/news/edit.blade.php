<x-site-layout title="Nieuwsbericht bewerken">

    <h1>Nieuwsbericht bewerken</h1>

    <form method="POST" action="{{ route('news.update', $news) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Titel</label>
            <input type="text" name="title" class="form-control" value="{{ $news->title }}" required>
        </div>

        <div class="mb-3">
            <label>Categorie</label>
            <input type="text" name="category" class="form-control" value="{{ $news->category }}">
        </div>

        <div class="mb-3">
            <label>Inhoud</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $news->content }}</textarea>
        </div>

        <div class="mb-3">
            <label>Afbeelding</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Bijwerken</button>
        <a href="{{ route('news.index') }}" class="btn btn-secondary">Annuleren</a>

    </form>

</x-site-layout>
