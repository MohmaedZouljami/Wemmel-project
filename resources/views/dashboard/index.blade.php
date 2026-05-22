<x-site-layout title="Admin Dashboard">

    {{-- Header --}}
    <div class="p-4 mb-4 rounded-3 text-white" style="background: linear-gradient(135deg, #1a3a6b, #2e7d32);">
        <h1 class="fw-bold">Admin Dashboard</h1>
        <p class="lead mb-0">Beheer van Gemeente Wemmel</p>
    </div>

    {{-- Snelkoppelingen --}}
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <a href="/admin/gebruikers" class="text-decoration-none">
                <div class="card shadow-sm text-center p-3 border-0" style="background-color:#f0f4ff;">
                    <h3 style="color:#1a3a6b;">Gebruikers</h3>
                    <p class="text-muted">Beheer gebruikers</p>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="/news" class="text-decoration-none">
                <div class="card shadow-sm text-center p-3 border-0" style="background-color:#f0fff4;">
                    <h3 style="color:#2e7d32;">Nieuws</h3>
                    <p class="text-muted">Beheer nieuws</p>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="/faq" class="text-decoration-none">
                <div class="card shadow-sm text-center p-3 border-0" style="background-color:#fff8f0;">
                    <h3 style="color:#e65100;">FAQ</h3>
                    <p class="text-muted">Beheer FAQ</p>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="/contact" class="text-decoration-none">
                <div class="card shadow-sm text-center p-3 border-0" style="background-color:#fff0f0;">
                    <h3 style="color:#c62828;">Contact</h3>
                    <p class="text-muted">Bekijk berichten</p>
                </div>
            </a>
        </div>
    </div>

    {{-- Contactberichten --}}
    <div class="card shadow-sm p-4">
        <h4 class="fw-bold mb-3">Contactberichten</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($berichten->isEmpty())
            <p class="text-muted">Geen berichten gevonden.</p>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                    <tr>
                        <th>Naam</th>
                        <th>Email</th>
                        <th>Onderwerp</th>
                        <th>Bericht</th>
                        <th>Datum</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($berichten as $bericht)
                        <tr>
                            <td>{{ $bericht->naam }}</td>
                            <td>{{ $bericht->email }}</td>
                            <td>{{ $bericht->onderwerp }}</td>
                            <td>{{ Str::limit($bericht->bericht, 50) }}</td>
                            <td>{{ $bericht->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</x-site-layout>
