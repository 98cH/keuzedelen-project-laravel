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
                @if(Auth::user() && Auth::user()->role === 'student')
                    <a href="{{ route('inschrijven.create') }}" class="btn btn-primary" style="margin-left:10px;">Inschrijven</a>
                    <a href="{{ url('/behaalde-keuzedelen') }}" class="btn btn-success" style="margin-left:8px;">Behaalde keuzedelen</a>
                @endif
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
        {{-- Welkomsttekst verwijderd --}}
        <div class="keuzedelen-grid">
            @foreach($keuzedelen as $keuzedeel)
                <div class="keuzedeel-card">
                        {{-- Maak een bestandsnaam van de titel (slugify) --}}
                        @php
                            $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $keuzedeel->titel));
                        @endphp
                        
                        <h3>{{ $keuzedeel->titel }}</h3>
                        @auth
                            @if(Auth::user()->role === 'student')
                                <div class="btn-row">
                                        <a href="{{ route('keuzedelen.show', $keuzedeel->id) }}" class="btn btn-success">Meer info</a>
                                </div>
                            @elseif(Auth::user()->role === 'admin')
                                <div class="btn-row">
                                    <a href="#" class="btn btn-warning">Bewerken</a>
                                </div>
                            @else
                                <div class="btn-row">
                                        <a href="{{ route('keuzedelen.show', $keuzedeel->id) }}" class="btn btn-success">Meer info</a>
                                </div>
                            @endif
                        @else
                            <div class="btn-row">
                                <a href="{{ route('login') }}" class="btn btn-secondary">Log in voor meer info</a>
                            </div>
                        @endauth
                </div>
            @endforeach
        </div>
    </main>
    </div>
</body>
</html>
































