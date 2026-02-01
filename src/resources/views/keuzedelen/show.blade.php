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
        <div class="header-brand">
            <h1><span style="color: var(--tcr-green);">T</span><span style="color: var(--tcr-yellow);">C</span><span style="color: var(--tcr-green);">R</span></h1>
        </div>
        <div class="header-actions">
            <a href="{{ url('/') }}" class="btn btn-secondary btn-home">Home</a>
            @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="btn btn-secondary btn-logout">Uitloggen</button>
                </form>
            @endauth
        </div>
    </header>
    <div class="container-outer">
        <main>
            <div class="keuzedeel-card keuzedeel-card-large">
                <h3>{{ $keuzedeel->titel }}</h3>
                <p class="keuzedeel-description"><strong>Omschrijving:</strong> {{ $keuzedeel->beschrijving ? $keuzedeel->beschrijving : 'Geen omschrijving beschikbaar.' }}</p>
            </div>
        </main>
    </div>
</body>
</html>
