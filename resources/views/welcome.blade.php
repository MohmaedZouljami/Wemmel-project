<x-site-layout title="Gemeente Wemmel">

    <div class="text-center mb-5">
        <h1>Welkom bij Gemeente Wemmel</h1>
        <p class="text-muted">Officiële website van de gemeente Wemmel - 1780</p>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5>Nieuws</h5>
                    <p>Blijf op de hoogte van het laatste gemeentenieuws.</p>
                    <a href="{{ route('news.index') }}" class="btn btn-primary">Bekijk nieuws</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5>FAQ</h5>
                    <p>Veelgestelde vragen over onze gemeente.</p>
                    <a href="{{ route('faq.index') }}" class="btn btn-primary">Bekijk FAQ</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5>Contact</h5>
                    <p>Neem contact op met het gemeentebestuur.</p>
                    <a href="{{ route('contact.index') }}" class="btn btn-primary">Contacteer ons</a>
                </div>
            </div>
        </div>
    </div>

</x-site-layout>
