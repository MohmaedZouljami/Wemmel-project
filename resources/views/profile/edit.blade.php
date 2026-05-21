<x-site-layout title="Mijn profiel">

    <h1>Mijn profiel</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label>Naam</label>
            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
        </div>

        <div class="mb-3">
            <label>Verjaardag</label>
            <input type="date" name="verjaardag" class="form-control" value="{{ auth()->user()->verjaardag }}">
        </div>

        <div class="mb-3">
            <label>Over mij</label>
            <textarea name="over_mij" class="form-control" rows="4">{{ auth()->user()->over_mij }}</textarea>
        </div>

        <div class="mb-3">
            <label>Profielfoto</label>
            <input type="file" name="profielfoto" class="form-control">
        </div>

        <button class="btn btn-primary">Opslaan</button>

    </form>

</x-site-layout>
