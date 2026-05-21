<x-site-layout title="Admin Dashboard">

    <h1>Admin Dashboard</h1>

    <h2>Contactberichten</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($berichten->isEmpty())
        <p>Geen berichten gevonden.</p>
    @else
        <table class="table">
            <thead>
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
                    <td>{{ $bericht->bericht }}</td>
                    <td>{{ $bericht->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

</x-site-layout>
