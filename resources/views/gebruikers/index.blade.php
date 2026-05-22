<x-site-layout title="Gebruikersbeheer">

    <div class="p-4 mb-4 rounded-3 text-white" style="background: linear-gradient(135deg, #1a3a6b, #2e7d32);">
        <h1 class="fw-bold">Gebruikersbeheer</h1>
        <p class="lead mb-0">Beheer alle gebruikers van Gemeente Wemmel</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Alle gebruikers ({{ count($gebruikers) }})</h5>
        <a href="{{ route('gebruikers.create') }}" class="btn btn-dark">Nieuwe gebruiker</a>
    </div>

    <div class="card shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach($gebruikers as $gebruiker)
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center"
                                 style="width:35px; height:35px; font-size:0.9rem;">
                                {{ strtoupper(substr($gebruiker->name, 0, 1)) }}
                            </div>
                            {{ $gebruiker->name }}
                        </div>
                    </td>
                    <td>{{ $gebruiker->email }}</td>
                    <td>
                        @if($gebruiker->is_admin)
                            <span class="badge bg-dark">Admin</span>
                        @else
                            <span class="badge bg-secondary">Gebruiker</span>
                        @endif
                    </td>
                    <td>
                        @if(!$gebruiker->is_admin)
                            <form action="{{ route('gebruikers.makeAdmin', $gebruiker) }}" method="POST" style="display:inline">
                                @csrf
                                <button class="btn btn-sm btn-success">Maak admin</button>
                            </form>
                        @else
                            <form action="{{ route('gebruikers.removeAdmin', $gebruiker) }}" method="POST" style="display:inline">
                                @csrf
                                <button class="btn btn-sm btn-danger">Verwijder admin</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</x-site-layout>
