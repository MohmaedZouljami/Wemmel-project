<x-site-layout title="Gebruikersbeheer">

    <h1>Gebruikersbeheer</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('gebruikers.create') }}" class="btn btn-primary mb-3">Nieuwe gebruiker</a>

    <table class="table">
        <thead>
        <tr>
            <th>Naam</th>
            <th>Email</th>
            <th>Admin</th>
            <th>Acties</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gebruikers as $gebruiker)
            <tr>
                <td>{{ $gebruiker->name }}</td>
                <td>{{ $gebruiker->email }}</td>
                <td>{{ $gebruiker->is_admin ? 'Ja' : 'Nee' }}</td>
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

</x-site-layout>
