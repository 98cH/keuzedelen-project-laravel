<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Upload - Studenten & Keuzedelen</title>
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    <div class="container-outer">
        <main>
            <h2>CSV Upload - Studenten & Behaalde Keuzedelen</h2>
            <form action="{{ route('admin.upload.csv') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="csv_file">Kies een CSV-bestand:</label>
                <input type="file" name="csv_file" id="csv_file" accept=".csv" required>
                <button type="submit" class="btn btn-success" style="margin-top: 20px;">Uploaden</button>
            </form>
        </main>
    </div>
</body>
</html>
