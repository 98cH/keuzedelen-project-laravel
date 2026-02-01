<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Keuzedelen</title>
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    <header>
        <div class="header-brand">
            <h1><span style="color: var(--tcr-green);">T</span><span style="color: var(--tcr-yellow);">C</span><span style="color: var(--tcr-green);">R</span></h1>
        </div>
        <div class="header-actions">
            <a href="{{ url('/') }}" class="btn btn-secondary btn-home">Home</a>
            <a href="{{ url('/admin/upload-csv') }}" class="btn btn-success">CSV upload</a>
        </div>
    </header>
    <div class="container-outer">
        <main>
            <div class="page-title-row">
                <h2 style="margin:0;">Keuzedelen Beheer</h2>
                <a href="{{ route('admin.keuzedelen.create') }}" class="btn btn-success">Nieuw keuzedeel</a>
            </div>

            @if(session('success'))
                <div style="background: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 12px; margin-bottom: 16px; border-radius: 4px;">
                    {{ session('success') }}
                </div>
            @endif

            @if($keuzedelen->isEmpty())
                <p>Er zijn nog geen keuzedelen.</p>
            @else
                <div style="overflow-x:auto;">
                    <table style="width:100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background:#f3f4f6; text-align:left;">
                                <th style="padding:10px; border-bottom:1px solid #e5e7eb;">Code</th>
                                <th style="padding:10px; border-bottom:1px solid #e5e7eb;">Titel</th>
                                <th style="padding:10px; border-bottom:1px solid #e5e7eb;">Opleiding</th>
                                <th style="padding:10px; border-bottom:1px solid #e5e7eb;">Periode</th>
                                <th style="padding:10px; border-bottom:1px solid #e5e7eb;">Capaciteit</th>
                                <th style="padding:10px; border-bottom:1px solid #e5e7eb;">Actief</th>
                                <th style="padding:10px; border-bottom:1px solid #e5e7eb;">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($keuzedelen as $keuzedeel)
                                <tr>
                                    <td style="padding:10px; border-bottom:1px solid #e5e7eb;">{{ $keuzedeel->keuzedeelcode }}</td>
                                    <td style="padding:10px; border-bottom:1px solid #e5e7eb;">{{ $keuzedeel->titel }}</td>
                                    <td style="padding:10px; border-bottom:1px solid #e5e7eb;">{{ $keuzedeel->opleiding?->naam ?? '-' }}</td>
                                    <td style="padding:10px; border-bottom:1px solid #e5e7eb;">{{ $keuzedeel->periode?->naam ?? '-' }}</td>
                                    <td style="padding:10px; border-bottom:1px solid #e5e7eb;">{{ $keuzedeel->max_inschrijvingen }}</td>
                                    <td style="padding:10px; border-bottom:1px solid #e5e7eb;">
                                        <form action="{{ route('admin.keuzedelen.toggle', $keuzedeel->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-xs btn-toggle {{ $keuzedeel->actief ? 'btn-success' : 'btn-secondary' }}">
                                                {{ $keuzedeel->actief ? 'Actief' : 'Inactief' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td style="padding:10px; border-bottom:1px solid #e5e7eb;">
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.keuzedelen.edit', $keuzedeel->id) }}" class="btn btn-xs btn-edit">Bewerken</a>
                                            <form action="{{ route('admin.keuzedelen.destroy', $keuzedeel->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Weet je zeker dat je dit keuzedeel wilt verwijderen?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger">Verwijderen</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </main>
    </div>
</body>
</html>
