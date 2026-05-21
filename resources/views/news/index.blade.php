<x-site-layout title="Nieuws">

    <h1>Nieuws</h1>

    @foreach ($newsItems as $news)
        <div>
            <h2>{{ $news->title }}</h2>
            <p>{{ $news->created_at }}</p>
            <a href="{{ route('news.show', $news) }}">Lees meer</a>
        </div>
        <hr>
    @endforeach

</x-site-layout>
