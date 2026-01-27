<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen - TCR Keuzedelen</title>
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    <header>
        <h1>TCR Keuzedelen</h1>
        <div>
            <a href="/" class="btn btn-secondary btn-home">Home</a>
        </div>
    </header>
    <main>
        <div class="welcome">
            <h2>Inloggen</h2>
            <p>Log in met je e-mailadres en wachtwoord.</p>
        </div>
        <form method="POST" action="{{ route('login') }}" style="max-width:400px;margin:0 auto;">
            @csrf
            <div style="margin-bottom:16px;">
                <label for="email">E-mailadres</label><br>
                <input id="email" type="email" name="email" required autofocus style="width:100%;padding:8px;">
            </div>
            <div style="margin-bottom:16px;">
                <label for="password">Wachtwoord</label><br>
                <input id="password" type="password" name="password" required style="width:100%;padding:8px;">
            </div>
            <div style="margin-bottom:16px;">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Onthoud mij</label>
            </div>
            <button type="submit" class="btn btn-success btn-login" style="width:100%;">Inloggen</button>
            <div style="margin-top:12px;text-align:center;">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Wachtwoord vergeten?</a>
                @endif
            </div>
        </form>
    </main>
</body>
</html>
