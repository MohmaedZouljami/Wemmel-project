<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alle News</title>
</head>
<body>
<h1>Alle News</h1>

@if ($newsItems->count() === 0)
    <p>Geen news items gevonden.</p>
@else
    <ul>
        @foreach ($newsItems as $news)
            <li class="news-item">
                <h2>{{ $news->title }}</h2>
                <p class="meta">
                    Door {{ $news->user?->name ?? 'Onbekende auteur' }},
                    {{ $news->created_at }}
                </p>
            </li>
        @endforeach
    </ul>
@endif
</body>
</html>
