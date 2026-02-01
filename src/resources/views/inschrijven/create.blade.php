<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inschrijven Keuzedelen</title>
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
            <div class="keuzedeel-card" style="max-width: 900px; min-height: 340px; margin: 0 auto; padding: 36px 44px;">
                @if ($errors->any())
                    <div style="background:#ffeaea; color:#b91c1c; border-radius:6px; padding:12px 18px; margin-bottom:18px;">
                        <ul style="margin:0; padding-left:18px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('error'))
                    <div style="background:#ffeaea; color:#b91c1c; border-radius:6px; padding:12px 18px; margin-bottom:18px;">
                        {{ session('error') }}
                    </div>
                @endif
                @if(session('success'))
                    <div style="background:#e6f4ea; color:#15803d; border-radius:6px; padding:12px 18px; margin-bottom:18px;">
                        {{ session('success') }}
                    </div>
                @endif
                <h3>Kies je 1e, 2e en 3e keuzedeel</h3>
                <form method="POST" action="{{ route('inschrijven.store') }}">
                    @csrf
                    <div style="margin-bottom: 18px;">
                        <label for="keuze1">1e keuze:</label><br>
                        <select name="keuze1" id="keuze1" class="form-control" required>
                            <option value="">-- Kies keuzedeel --</option>
                            @foreach($keuzedelen as $keuzedeel)
                                <option value="{{ $keuzedeel->id }}">{{ $keuzedeel->titel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="margin-bottom: 18px;">
                        <label for="keuze2">2e keuze:</label><br>
                        <select name="keuze2" id="keuze2" class="form-control" required>
                            <option value="">-- Kies keuzedeel --</option>
                            @foreach($keuzedelen as $keuzedeel)
                                <option value="{{ $keuzedeel->id }}">{{ $keuzedeel->titel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="margin-bottom: 24px;">
                        <label for="keuze3">3e keuze:</label><br>
                        <select name="keuze3" id="keuze3" class="form-control" required>
                            <option value="">-- Kies keuzedeel --</option>
                            @foreach($keuzedelen as $keuzedeel)
                                <option value="{{ $keuzedeel->id }}">{{ $keuzedeel->titel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="btn-row">
                        <a href="/" class="btn btn-secondary">Annuleren</a>
                        <button type="submit" class="btn btn-success">Inschrijven</button>
                    </div>
                </form>
            </div>

            @if(isset($inschrijving))
                <div style="background:#f4f4f4; color:#222; border-radius:8px; padding:18px 24px; margin-top:32px;">
                    <h4 style="color:#22c55e; margin-top:0;">Overzicht van jouw keuzes</h4>
                    <ul style="list-style:none; padding-left:0;">
                        <li><strong>1e keuze:</strong> {{ $inschrijving->keuzedeel1 ? $inschrijving->keuzedeel1->titel : '-' }}</li>
                        <li><strong>2e keuze:</strong> {{ $inschrijving->keuzedeel2 ? $inschrijving->keuzedeel2->titel : '-' }}</li>
                        <li><strong>3e keuze:</strong> {{ $inschrijving->keuzedeel3 ? $inschrijving->keuzedeel3->titel : '-' }}</li>
                    </ul>
                </div>
            @endif
        </main>
    </div>
</body>
</html>
