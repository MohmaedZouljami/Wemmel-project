<x-site-layout title="Nieuwsbericht bewerken">

    <h1 class="mb-4">Nieuwsbericht bewerken</h1>

    <form method="POST" action="{{ route('news.update', $news) }}">
        @csrf
        @method('PUT')

        <x-form-text-input
            label="Titel"
            name="title"
            value="{{$news->title}}"
            placeholder="geef de titel op, start met hoofdletter, geen leestekens"
        />

        <div class="mb-3">
            <label class="form-label">Inhoud</label>
            <textarea name="content" class="form-control">{{ $news->content }}</textarea>
        </div>

        <button class="btn btn-primary">Bijwerken</button>
    </form>

</x-site-layout>
