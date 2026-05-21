<x-site-layout title="Nieuwe gebruiker">

    <h1>Nieuwe gebruiker aanmaken</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('gebruikers.store') }}">
        @csrf

        <div class="mb-3">
            <label>Naam</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label>Wachtwoord</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <input type="checkbox" name="is_admin" id="is_admin">
            <label for="is_admin">Admin maken</label>
        </div>

        <button class="btn btn-success">Aanmaken</button>
        <a href="{{ route('gebruikers.index') }}" class="btn btn-secondary">Annuleren</a>

    </form>

</x-site-layout>
