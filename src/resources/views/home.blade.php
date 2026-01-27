<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCR Keuzedelen</title>
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    <header>
        <h1>TCR Keuzedelen</h1>
        <div>
            @guest
                <a href="{{ route('login') }}" class="btn btn-success btn-login">Inloggen</a>
            @else
                <span>Welkom, {{ Auth::user()->name }}</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:inline; margin-left:10px;">
                    @csrf
                    <button type="submit" class="btn btn-secondary btn-logout">Uitloggen</button>
                    @if(Auth::user() && Auth::user()->role === 'admin')
                        <a href="{{ url('/admin/upload-csv') }}" class="btn btn-success btn-login" style="margin-left:8px;">CSV upload</a>
                    @endif
                </form>
            @endguest
        </div>
    </header>
    <div class="container-outer">
    <main>
        <div class="welcome">
            <h2>Welkom op het Keuzedelen platform!</h2>
            <p>Hier vind je alle keuzedelen en kun je eenvoudig inloggen om meer te doen.</p>
        </div>
        <div class="keuzedelen-grid">
            @foreach($keuzedelen as $keuzedeel)
                <div class="keuzedeel-card">
                        {{-- Maak een bestandsnaam van de titel (slugify) --}}
                        @php
                            $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $keuzedeel->titel));
                        @endphp
                        
                        <h3>{{ $keuzedeel->titel }}</h3>
                        @auth
                            <a href="#" class="btn btn-success">Meer info</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-secondary">Log in voor meer info</a>
                        @endauth
                </div>
            @endforeach
        </div>
    </main>
    </div>
</body>
</html>
