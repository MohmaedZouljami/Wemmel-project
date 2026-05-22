<x-site-layout title="{{ $user->name }}">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-4 text-center">

                @if($user->profielfoto)
                    <img src="{{ asset('storage/' . $user->profielfoto) }}"
                         class="rounded-circle mb-3 mx-auto d-block"
                         style="width:150px; height:150px; object-fit:cover;">
                @else
                    <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center mx-auto mb-3"
                         style="width:150px; height:150px; font-size:3rem;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                @endif

                <h2 class="fw-bold">{{ $user->name }}</h2>

                @if($user->is_admin)
                    <span class="badge bg-dark mb-2">Admin</span>
                @endif

                <hr>

                @if($user->verjaardag)
                    <p><strong>Verjaardag:</strong> {{ $user->verjaardag }}</p>
                @endif

                @if($user->over_mij)
                    <div class="card bg-light p-3 mt-2 text-start">
                        <strong>Over mij:</strong>
                        <p class="mb-0 mt-1">{{ $user->over_mij }}</p>
                    </div>
                @endif

                <div class="mt-4">
                    <a href="/" class="btn btn-dark">Terug naar home</a>
                </div>

            </div>
        </div>
    </div>

</x-site-layout>
