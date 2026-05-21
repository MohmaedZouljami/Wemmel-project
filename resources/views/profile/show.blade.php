<x-site-layout title="{{ $user->name }}">

    <h1>{{ $user->name }}</h1>

    @if($user->profielfoto)
        <img src="{{ asset('storage/' . $user->profielfoto) }}" width="150" class="rounded-circle mb-3">
    @endif

    @if($user->verjaardag)
        <p><strong>Verjaardag:</strong> {{ $user->verjaardag }}</p>
    @endif

    @if($user->over_mij)
        <p><strong>Over mij:</strong> {{ $user->over_mij }}</p>
    @endif

    <a href="/" class="btn btn-secondary">Terug</a>

</x-site-layout>
