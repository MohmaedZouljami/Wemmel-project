<x-site-layout title="{{ $news->title }}">

    <h1>{{ $news->title }}</h1>
    <p class="text-muted">{{ $news->published_at }}</p>
    <hr>
    <p>{{ $news->content }}</p>
    <a href="{{ route('news.index') }}">Terug naar nieuws</a>

</x-site-layout>
