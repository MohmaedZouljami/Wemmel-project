<x-site-layout title="Nieuwe FAQ vraag">

    <h1>Nieuwe vraag toevoegen</h1>

    <form method="POST" action="/admin/faq">
        @csrf

        <div class="mb-3">
            <label>Categorie</label>
            <select name="faq_categorie_id" class="form-control" required>
                @foreach($categorieen as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->naam }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Vraag</label>
            <input type="text" name="vraag" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Antwoord</label>
            <textarea name="antwoord" class="form-control" rows="4" required></textarea>
        </div>

        <button class="btn btn-success">Opslaan</button>
        <a href="/faq" class="btn btn-secondary">Annuleren</a>

    </form>

</x-site-layout>
