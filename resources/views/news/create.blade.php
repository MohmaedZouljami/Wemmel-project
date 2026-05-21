<x-site-layout title="Nieuw nieuwsbericht">

    <h1>Nieuw nieuwsbericht</h1>

    <form method="POST" action="/admin/news" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title">Titel</label>
            <input type="text" id="title" name="title" class="form-control" required minlength="2" maxlength="200">
        </div>

        <div class="mb-3">
            <label for="category">Categorie</label>
            <input type="text" id="category" name="category" class="form-control" maxlength="100">
        </div>

        <div class="mb-3">
            <label for="content">Inhoud</label>
            <textarea id="content" name="content" class="form-control" rows="5" required minlength="10"></textarea>
        </div>

        <div class="mb-3">
            <label for="image">Afbeelding</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-success">Opslaan</button>
        <a href="{{ route('news.index') }}" class="btn btn-secondary">Annuleren</a>

    </form>

</x-site-layout>
