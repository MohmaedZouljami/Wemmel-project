<x-site-layout title="Nieuw nieuwsbericht">

    <h1 class="mb-4">Nieuw nieuwsbericht</h1>

    <form method="POST" action="{{ route('news.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Titel</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Inhoud</label>
            <textarea name="content" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Opslaan</button>
    </form>

</x-site-layout>
