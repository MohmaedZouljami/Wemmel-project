<x-site-layout title="Contact">

    <h1>Contact</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('contact.store') }}">
        @csrf

        <div class="mb-3">
            <label for="naam">Naam</label>
            <input type="text" id="naam" name="naam" class="form-control" required minlength="2" maxlength="100">
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="onderwerp">Onderwerp</label>
            <input type="text" id="onderwerp" name="onderwerp" class="form-control" required minlength="2" maxlength="200">
        </div>

        <div class="mb-3">
            <label for="bericht">Bericht</label>
            <textarea id="bericht" name="bericht" class="form-control" rows="5" required minlength="10"></textarea>
        </div>

        <button class="btn btn-primary">Verstuur</button>

    </form>

</x-site-layout>
