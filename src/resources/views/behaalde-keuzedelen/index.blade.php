<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Behaalde keuzedelen</title>
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
                <h3>Behaalde keuzedelen</h3>
                @if($behaaldeKeuzedelen->isEmpty())
                    <p>Je hebt nog geen keuzedelen behaald.</p>
                @else
                    <table style="width:100%; border-collapse:collapse;">
                        <thead>
                            <tr style="background:#f4f4f4;">
                                <th style="padding:8px 12px; text-align:left;">Titel</th>
                                <th style="padding:8px 12px; text-align:left;">Behaald op</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($behaaldeKeuzedelen as $behaald)
                                <tr>
                                    <td style="padding:8px 12px;">{{ $behaald->keuzedeel->titel ?? '-' }}</td>
                                    <td style="padding:8px 12px;">{{ $behaald->behaald_op ? \Carbon\Carbon::parse($behaald->behaald_op)->format('d-m-Y') : '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </main>
    </div>
</body>
</html>
