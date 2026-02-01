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
                <h3>Behaalde keuzedelen</h3>
                @if($behaaldeKeuzedelen->isEmpty())
                    <p>Je hebt nog geen keuzedelen behaald.</p>
                @else
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Titel</th>
                                <th>Behaald op</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($behaaldeKeuzedelen as $behaald)
                                <tr>
                                    <td>{{ $behaald->keuzedeel->titel ?? '-' }}</td>
                                    <td>{{ $behaald->behaald_op ? \Carbon\Carbon::parse($behaald->behaald_op)->format('d-m-Y') : '-' }}</td>
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
