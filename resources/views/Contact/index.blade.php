<x-site-layout title="Contact">

    <h1>Contact</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('contact.store') }}">
        @csrf

        <div class="mb-3">
            <label>Naam</label>
            <input type="text" name="naam" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Onderwerp</label>
            <input type="text" name="onderwerp" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Bericht</label>
            <textarea name="bericht" class="form-control" rows="5" required></textarea>
        </div>

        <button class="btn btn-primary">Verstuur</button>

    </form>

</x-site-layout>
