<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $keuzedeel->titel }} | TCR Keuzedelen</title>
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    <header>
        <h1>TCR Keuzedelen</h1>
        <div>
            @auth
                <span>Welkom, {{ Auth::user()->name }}</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:inline; margin-left:10px;">
                    @csrf
                    <button type="submit" class="btn btn-secondary btn-logout">Uitloggen</button>
                </form>
            @endauth
        </div>
    </header>
    <div class="container-outer">
        <main>
            <div class="keuzedeel-card" style="max-width: 900px; min-height: 320px; margin: 0 auto; padding: 32px 40px;">
                <h3>{{ $keuzedeel->titel }}</h3>
                <p style="margin-bottom: 32px;"><strong>Omschrijving:</strong> {{ $keuzedeel->beschrijving ? $keuzedeel->beschrijving : 'Geen omschrijving beschikbaar.' }}</p>
                <div class="btn-row">
                    <a href="/" class="btn btn-secondary">Terug</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
