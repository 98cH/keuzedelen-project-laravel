<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuzedeel bewerken</title>
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    <header>
        <div class="header-brand">
            <h1><span style="color: var(--tcr-green);">T</span><span style="color: var(--tcr-yellow);">C</span><span style="color: var(--tcr-green);">R</span></h1>
        </div>
        <div class="header-actions">
            <a href="{{ url('/') }}" class="btn btn-secondary btn-home">Home</a>
            <a href="{{ url('/admin/keuzedelen') }}" class="btn btn-success">Keuzedelen beheer</a>
        </div>
    </header>
    <div class="container-outer">
        <main>
            <h2>Keuzedeel bewerken</h2>

            @if($errors->any())
                <div style="background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 12px; margin-bottom: 16px; border-radius: 4px;">
                    <ul style="margin:0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.keuzedelen.update', $keuzedeel->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="margin-bottom: 12px;">
                    <label for="titel">Titel</label>
                    <input type="text" name="titel" id="titel" value="{{ old('titel', $keuzedeel->titel) }}" required style="width:100%; padding:8px;">
                </div>

                <div style="margin-bottom: 12px;">
                    <label for="keuzedeelcode">Keuzedeelcode</label>
                    <input type="text" name="keuzedeelcode" id="keuzedeelcode" value="{{ old('keuzedeelcode', $keuzedeel->keuzedeelcode) }}" required style="width:100%; padding:8px;">
                </div>

                <div style="margin-bottom: 12px;">
                    <label for="beschrijving">Beschrijving</label>
                    <textarea name="beschrijving" id="beschrijving" rows="4" required style="width:100%; padding:8px;">{{ old('beschrijving', $keuzedeel->beschrijving) }}</textarea>
                </div>

                <div style="margin-bottom: 12px;">
                    <label for="max_inschrijvingen">Max inschrijvingen</label>
                    <input type="number" name="max_inschrijvingen" id="max_inschrijvingen" value="{{ old('max_inschrijvingen', $keuzedeel->max_inschrijvingen) }}" min="23" max="30" required style="width:100%; padding:8px;">
                </div>

                <div style="margin-bottom: 12px;">
                    <label for="periode_id">Periode</label>
                    <select name="periode_id" id="periode_id" required style="width:100%; padding:8px;">
                        <option value="">-- Kies periode --</option>
                        @foreach($periodes as $periode)
                            <option value="{{ $periode->id }}" {{ old('periode_id', $keuzedeel->periode_id) == $periode->id ? 'selected' : '' }}>{{ $periode->naam }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom: 12px;">
                    <label for="opleiding_id">Opleiding (optioneel)</label>
                    <select name="opleiding_id" id="opleiding_id" style="width:100%; padding:8px;">
                        <option value="">-- Geen opleiding --</option>
                        @foreach($opleidingen as $opleiding)
                            <option value="{{ $opleiding->id }}" {{ old('opleiding_id', $keuzedeel->opleiding_id) == $opleiding->id ? 'selected' : '' }}>{{ $opleiding->naam }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom: 16px;">
                    <label>
                        <input type="checkbox" name="actief" value="1" {{ old('actief', $keuzedeel->actief) ? 'checked' : '' }}>
                        Actief
                    </label>
                </div>

                <button type="submit" class="btn btn-success">Opslaan</button>
            </form>
        </main>
    </div>
</body>
</html>
