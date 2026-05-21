<x-site-layout title="Mijn profiel">

    <h1>Mijn profiel</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="/profiel" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="name">Naam</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name }}" required minlength="2" maxlength="100">
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
        </div>

        <div class="mb-3">
            <label for="verjaardag">Verjaardag</label>
            <input type="date" id="verjaardag" name="verjaardag" class="form-control" value="{{ auth()->user()->verjaardag }}">
        </div>

        <div class="mb-3">
            <label for="over_mij">Over mij</label>
            <textarea id="over_mij" name="over_mij" class="form-control" rows="4" maxlength="500">{{ auth()->user()->over_mij }}</textarea>
        </div>

        <div class="mb-3">
            <label for="profielfoto">Profielfoto</label>
            <input type="file" id="profielfoto" name="profielfoto" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-primary">Opslaan</button>

    </form>

</x-site-layout>
