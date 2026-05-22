<x-site-layout title="Mijn profiel">

    <div class="row">
        {{-- Sidebar met profielinfo --}}
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm text-center p-4">
                @if(auth()->user()->profielfoto)
                    <img src="{{ asset('storage/' . auth()->user()->profielfoto) }}"
                         class="rounded-circle mb-3 mx-auto d-block"
                         style="width:120px; height:120px; object-fit:cover;">
                @else
                    <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center mx-auto mb-3"
                         style="width:120px; height:120px; font-size:2rem;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif
                <h4>{{ auth()->user()->name }}</h4>
                <p class="text-muted">{{ auth()->user()->email }}</p>
                @if(auth()->user()->is_admin)
                    <span class="badge bg-dark">Admin</span>
                @endif
                @if(auth()->user()->verjaardag)
                    <p class="mt-2 text-muted small">Verjaardag: {{ auth()->user()->verjaardag }}</p>
                @endif
                @if(auth()->user()->over_mij)
                    <p class="mt-2">{{ auth()->user()->over_mij }}</p>
                @endif
            </div>
        </div>

        {{-- Formulier --}}
        <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <h4 class="fw-bold mb-4">Profiel bewerken</h4>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="/profiel" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="name">Naam</label>
                        <input type="text" id="name" name="name" class="form-control"
                               value="{{ auth()->user()->name }}" required minlength="2" maxlength="100">
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control"
                               value="{{ auth()->user()->email }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="verjaardag">Verjaardag</label>
                        <input type="date" id="verjaardag" name="verjaardag" class="form-control"
                               value="{{ auth()->user()->verjaardag }}">
                    </div>

                    <div class="mb-3">
                        <label for="over_mij">Over mij</label>
                        <textarea id="over_mij" name="over_mij" class="form-control"
                                  rows="4" maxlength="500">{{ auth()->user()->over_mij }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="profielfoto">Profielfoto</label>
                        <input type="file" id="profielfoto" name="profielfoto"
                               class="form-control" accept="image/*">
                    </div>

                    <button class="btn btn-dark w-100">Opslaan</button>
                </form>
            </div>
        </div>
    </div>

</x-site-layout>
