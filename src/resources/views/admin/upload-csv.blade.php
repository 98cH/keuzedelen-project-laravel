
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Upload - Studenten & Keuzedelen</title>
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    <header>
        <div class="header-brand">
            <h1><span style="color: var(--tcr-green);">T</span><span style="color: var(--tcr-yellow);">C</span><span style="color: var(--tcr-green);">R</span></h1>
        </div>
        <div class="header-actions">
            @if(!request()->routeIs('admin.csv.show'))
                <a href="{{ url('/') }}" class="btn btn-secondary btn-home">Home</a>
            @endif
            <a href="{{ url('/admin/keuzedelen') }}" class="btn btn-success">Keuzedelen beheer</a>
        </div>
    </header>
    <div class="container-outer">
        <main>
            <h2>CSV Upload - Studenten & Behaalde Keuzedelen</h2>

            @if(isset($uploadedFiles) && count($uploadedFiles) > 0)
                <div style="background: #e2e3e5; color: #383d41; border: 1px solid #d6d8db; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                    <strong>Geüploade bestanden:</strong>
                    <ul style="margin:0; padding-left: 20px; list-style: none;">
                        @foreach($uploadedFiles as $file)
                            <li style="display: flex; align-items: center; margin-bottom: 8px;">
                                <span style="flex: 1;">{{ $file }}</span>
                                <form action="{{ route('admin.csv.delete', $file) }}" method="POST" class="logout-form" onsubmit="return confirm('Weet je zeker dat je {{ $file }} en alle bijbehorende gebruikers wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger">Verwijderen</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div style="background: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div style="background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                    <ul style="margin:0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.upload.csv.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="csv_file">Kies een CSV-bestand:</label>
                <input type="file" name="csv_file" id="csv_file" class="file-input" accept=".csv" required>
                <button type="submit" class="btn btn-success upload-actions">Uploaden</button>
            </form>
        </main>
    </div>
</body>
</html>
