<x-site-layout title="Nieuw nieuwsbericht">

    <h1 class="mb-4">Nieuw nieuwsbericht</h1>

    <form method="POST" action="{{ route('news.store') }}">
        @csrf

        <x-form-text-input
            label="Titel"
            name="title"
            placeholder="geef de titel op"
        />

        <x-form-text-input
            label="Inhoud"
            name="content"
            placeholder="geef de inhoud "
        />



        <button class="btn btn-success">Opslaan</button>
    </form>

</x-site-layout>
