<x-site-layout title="Nieuw nieuwsbericht">

    <h1>Nieuw nieuwsbericht</h1>

    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">        @csrf

        <div class="mb-3">
            <label>Titel</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Categorie</label>
            <input type="text" name="category" class="form-control">
        </div>

        <div class="mb-3">
            <label>Inhoud</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label>Afbeelding</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Opslaan</button>
        <a href="{{ route('news.index') }}" class="btn btn-secondary">Annuleren</a>

    </form>

</x-site-layout>
