<x-site-layout title="Contact">

    {{-- Hero sectie --}}
    <div class="p-4 mb-4 rounded-3 text-white text-center" style="background: linear-gradient(135deg, #1a3a6b, #2e7d32);">
        <h1 class="fw-bold">Contact</h1>
        <p class="lead">Neem contact op met het gemeentebestuur van Wemmel</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        {{-- Contactformulier --}}
        <div class="col-md-7">
            <div class="card shadow-sm p-4">
                <h4 class="mb-4">Stuur ons een bericht</h4>
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

                    <button class="btn btn-dark w-100">Verstuur bericht</button>
                </form>
            </div>
        </div>

        {{-- Contact info --}}
        <div class="col-md-5">
            <div class="card shadow-sm p-4 mb-3">
                <h5>Gemeentehuis Wemmel</h5>
                <hr>
                <p>Gemeenteplein 1<br>1780 Wemmel<br>België</p>
                <p>Tel: 02 462 05 10</p>
                <p>Email: info@wemmel.be</p>
            </div>

            <div class="card shadow-sm p-4">
                <h5>Openingsuren</h5>
                <hr>
                <table class="table table-sm">
                    <tr><td>Maandag</td><td>9u - 12u</td></tr>
                    <tr><td>Dinsdag</td><td>9u - 12u</td></tr>
                    <tr><td>Woensdag</td><td>9u - 12u</td></tr>
                    <tr><td>Donderdag</td><td>9u - 12u / 14u - 16u</td></tr>
                    <tr><td>Vrijdag</td><td>9u - 12u</td></tr>
                    <tr><td>Weekend</td><td>Gesloten</td></tr>
                </table>
            </div>
        </div>
    </div>

</x-site-layout>
