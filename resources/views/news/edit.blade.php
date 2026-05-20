<x-site-layout title="Nieuwsbericht bewerken">

    <h1 class="mb-4">Nieuwsbericht bewerken</h1>

    <form method="POST" action="{{ route('news.update', $news) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Titel</label>
            <input type="text" name="title" class="form-control" value="{{ $news->title }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Inhoud</label>
            <textarea name="content" class="form-control">{{ $news->content }}</textarea>
        </div>

        <button class="btn btn-primary">Bijwerken</button>
    </form>

</x-site-layout>
