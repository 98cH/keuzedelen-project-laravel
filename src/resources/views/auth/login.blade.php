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
        <div class="header-brand">
            <h1><span style="color: var(--tcr-green);">T</span><span style="color: var(--tcr-yellow);">C</span><span style="color: var(--tcr-green);">R</span></h1>
        </div>
        <div class="header-actions">
            @if(!request()->routeIs('login'))
                <a href="{{ url('/') }}" class="btn btn-secondary btn-home">Home</a>
            @endif
        </div>
    </header>
    <main>
        <div class="welcome">
            <h2>Inloggen</h2>
            <p>Log in met je e-mailadres en wachtwoord.</p>
        </div>
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            <div class="form-group">
                <label for="email">E-mailadres</label><br>
                <input id="email" type="email" name="email" required autofocus class="form-input">
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord</label><br>
                <input id="password" type="password" name="password" required class="form-input">
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember" id="remember" class="form-checkbox">
                <label for="remember">Onthoud mij</label>
            </div>
            <button type="submit" class="btn btn-success btn-login btn-full-width">Inloggen</button>
            <div class="form-actions">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Wachtwoord vergeten?</a>
                @endif
            </div>
        </form>
    </main>
</body>
</html>
