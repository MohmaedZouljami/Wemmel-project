<h1>Nieuw nieuwsbericht</h1>

<form method="POST" action="{{ route('news.store') }}">
    @csrf

    <label>Titel</label>
    <input type="text" name="title">

    <label>Inhoud</label>
    <textarea name="content"></textarea>

    <button type="submit">Opslaan</button>
</form>
