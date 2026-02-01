# Acceptatietest - Keuzedelen Inschrijf Applicatie

**Project:** Keuzedelen Inschrijf Systeem  
**Datum:** 1 februari 2026  
**Niveau:** MBO4  
**Tester:** _________________________  
**Test Datum:** _________________________

---

## Wat is een Acceptatietest?

Een acceptatietest controleert of de applicatie werkt zoals verwacht. Je test alle belangrijke functies door stap voor stap instructies te volgen en te controleren of het resultaat klopt.

**Doel:**
- Controleren of alle functies werken
- Bugs vinden voordat gebruikers de applicatie gebruiken
- Bewijzen dat het systeem klaar is voor gebruik

---

## Test Overzicht

| Test # | Functie | Status | Prioriteit |
|--------|---------|--------|------------|
| T1 | Login Student | ⬜ | Hoog |
| T2 | Login Admin | ⬜ | Hoog |
| T3 | Registreren Nieuwe Gebruiker | ⬜ | Gemiddeld |
| T4 | Keuzedelen Bekijken (Student) | ⬜ | Hoog |
| T5 | Keuzedeel Details Bekijken | ⬜ | Gemiddeld |
| T6 | Inschrijven voor Keuzedelen | ⬜ | Hoog |
| T7 | Behaalde Keuzedelen Bekijken | ⬜ | Gemiddeld |
| T8 | CSV Uploaden (Admin) | ⬜ | Hoog |
| T9 | CSV Verwijderen (Admin) | ⬜ | Hoog |
| T10 | Inschrijving Validatie - Periode Gesloten | ⬜ | Hoog |
| T11 | Inschrijving Validatie - Keuzedeel Vol | ⬜ | Hoog |
| T12 | Inschrijving Validatie - Al Behaald | ⬜ | Hoog |
| T13 | Toegang Controle - Admin Pagina | ⬜ | Hoog |
| T14 | Logout Functionaliteit | ⬜ | Gemiddeld |

**Status Legenda:**
- ⬜ = Nog niet getest
- ✅ = Geslaagd
- ❌ = Gefaald
- ⚠️ = Deels geslaagd (met opmerkingen)

---

## Test Cases

### T1: Login Student

**Doel:** Controleren of een student kan inloggen

**Precondities:**
- Student account bestaat in database (studentnummer: 2024001, email: jan@student.nl, password: password123)

**Teststappen:**

| Stap | Actie | Verwacht Resultaat | Status | Opmerking |
|------|-------|-------------------|--------|-----------|
| 1 | Open de applicatie in browser (http://localhost:8000) | Homepage wordt geladen | ⬜ | |
| 2 | Klik op "Login" in de navigatie | Login pagina wordt getoond | ⬜ | |
| 3 | Voer email in: jan@student.nl | Email verschijnt in veld | ⬜ | |
| 4 | Voer wachtwoord in: password123 | Wachtwoord verschijnt als ••• | ⬜ | |
| 5 | Klik op "Inloggen" knop | Je wordt ingelogd en ziet dashboard | ⬜ | |
| 6 | Controleer rechtsboven | "Welkom, Jan (Student)" wordt getoond | ⬜ | |
| 7 | Controleer navigatie menu | Links: Home, Inschrijven, Behaalde Keuzedelen | ⬜ | |

**Test Resultaat:**
- [ ] ✅ Geslaagd
- [ ] ❌ Gefaald
- [ ] ⚠️ Deels geslaagd

**Opmerkingen:** _______________________________________________

---

### T2: Login Admin

**Doel:** Controleren of een admin kan inloggen en admin functies ziet

**Precondities:**
- Admin account bestaat (email: admin@keuzedelen.nl, password: admin123)

**Teststappen:**

| Stap | Actie | Verwacht Resultaat | Status | Opmerking |
|------|-------|-------------------|--------|-----------|
| 1 | Open login pagina | Login formulier zichtbaar | ⬜ | |
| 2 | Voer email in: admin@keuzedelen.nl | Email verschijnt in veld | ⬜ | |
| 3 | Voer wachtwoord in: admin123 | Wachtwoord verschijnt als ••• | ⬜ | |
| 4 | Klik "Inloggen" | Ingelogd als admin | ⬜ | |
| 5 | Controleer navigatie | "Admin Dashboard" of "CSV Upload" link zichtbaar | ⬜ | |
| 6 | Klik op "CSV Upload" link | Admin CSV pagina wordt geladen | ⬜ | |

**Test Resultaat:**
- [ ] ✅ Geslaagd
- [ ] ❌ Gefaald

**Opmerkingen:** _______________________________________________

---

### T3: Registreren Nieuwe Gebruiker

**Doel:** Controleren of nieuwe gebruikers zich kunnen registreren

**Precondities:**
- Geen

**Teststappen:**

| Stap | Actie | Verwacht Resultaat | Status | Opmerking |
|------|-------|-------------------|--------|-----------|
| 1 | Open homepage | Homepage zichtbaar | ⬜ | |
| 2 | Klik op "Register" link | Registratie formulier verschijnt | ⬜ | |
| 3 | Voer naam in: Test Student | Naam verschijnt | ⬜ | |
| 4 | Voer email in: test@student.nl | Email verschijnt | ⬜ | |
| 5 | Voer wachtwoord in: TestPass123! | Wachtwoord verborgen | ⬜ | |
| 6 | Bevestig wachtwoord: TestPass123! | Wachtwoord verborgen | ⬜ | |
| 7 | Klik "Register" | Account aangemaakt, ingelogd | ⬜ | |
| 8 | Controleer of je ingelogd bent | Dashboard zichtbaar | ⬜ | |

**Test Resultaat:**
- [ ] ✅ Geslaagd
- [ ] ❌ Gefaald

**Opmerkingen:** _______________________________________________

---

### T4: Keuzedelen Bekijken (Student)

**Doel:** Controleren of student keuzedelen kan zien die bij zijn/haar opleiding horen

**Precondities:**
- Ingelogd als student (Jan, opleiding: SD)
- Keuzedelen bestaan in database voor opleiding SD

**Teststappen:**

| Stap | Actie | Verwacht Resultaat | Status | Opmerking |
|------|-------|-------------------|--------|-----------|
| 1 | Open homepage als ingelogde student | Homepage wordt geladen | ⬜ | |
| 2 | Controleer titel | "Beschikbare Keuzedelen voor Opleiding: SD" | ⬜ | |
| 3 | Tel aantal keuzedelen | Minimaal 1 keuzedeel zichtbaar | ⬜ | Aantal: ___ |
| 4 | Controleer keuzedeel card | Bevat: Titel, Code, Beschrijving, Capaciteit, Status | ⬜ | |
| 5 | Controleer capaciteit weergave | Bijvoorbeeld: "23/30" of "30/30 VOL" | ⬜ | |
| 6 | Controleer status | "✅ Actief" of "❌ Inactief" | ⬜ | |
| 7 | Controleer "Meer Info" knop | Knop is aanwezig | ⬜ | |

**Test Resultaat:**
- [ ] ✅ Geslaagd
- [ ] ❌ Gefaald

**Opmerkingen:** _______________________________________________

---

### T5: Keuzedeel Details Bekijken

**Doel:** Controleren of uitgebreide informatie van een keuzedeel getoond wordt

**Precondities:**
- Ingelogd als student
- Keuzedelen zichtbaar op homepage

**Teststappen:**

| Stap | Actie | Verwacht Resultaat | Status | Opmerking |
|------|-------|-------------------|--------|-----------|
| 1 | Klik op "Meer Info" bij een keuzedeel | Detail pagina opent | ⬜ | |
| 2 | Controleer URL | Bevat: /keuzedelen/{id} | ⬜ | |
| 3 | Controleer keuzedeel informatie | Titel, Code, Opleiding zichtbaar | ⬜ | |
| 4 | Controleer beschrijving | Uitgebreide tekst beschrijving aanwezig | ⬜ | |
| 5 | Controleer capaciteit | Visuele balk of getal met beschikbare plaatsen | ⬜ | |
| 6 | Controleer periode | Periode naam en data zichtbaar | ⬜ | |
| 7 | Controleer knoppen | "Terug" en/of "Inschrijven" knop aanwezig | ⬜ | |
| 8 | Klik "Terug" knop | Keert terug naar overzicht | ⬜ | |

**Test Resultaat:**
- [ ] ✅ Geslaagd
- [ ] ❌ Gefaald

**Opmerkingen:** _______________________________________________

---

### T6: Inschrijven voor Keuzedelen

**Doel:** Controleren of student zich kan inschrijven voor 3 keuzedelen

**Precondities:**
- Ingelogd als student
- Inschrijfperiode is open
- Minimaal 3 keuzedelen beschikbaar

**Teststappen:**

| Stap | Actie | Verwacht Resultaat | Status | Opmerking |
|------|-------|-------------------|--------|-----------|
| 1 | Klik op "Inschrijven" in navigatie | Inschrijf formulier opent | ⬜ | |
| 2 | Controleer waarschuwing | Tekst: "Je moet 3 verschillende keuzedelen kiezen" | ⬜ | |
| 3 | Controleer dropdowns | 3 dropdown menus zichtbaar (1e, 2e, 3e keuze) | ⬜ | |
| 4 | Open 1e keuze dropdown | Lijst van keuzedelen verschijnt | ⬜ | Aantal: ___ |
| 5 | Selecteer een keuzedeel voor 1e keuze | Keuzedeel wordt geselecteerd | ⬜ | Keuze: ____ |
| 6 | Selecteer een ander keuzedeel voor 2e keuze | Keuzedeel wordt geselecteerd | ⬜ | Keuze: ____ |
| 7 | Selecteer nog een ander voor 3e keuze | Keuzedeel wordt geselecteerd | ⬜ | Keuze: ____ |
| 8 | Klik "Inschrijving Bevestigen" | Inschrijving wordt opgeslagen | ⬜ | |
| 9 | Controleer succesmelding | Groene melding: "Inschrijving succesvol" of vergelijkbaar | ⬜ | |

**Test Resultaat:**
- [ ] ✅ Geslaagd
- [ ] ❌ Gefaald

**Opmerkingen:** _______________________________________________

---

### T7: Behaalde Keuzedelen Bekijken

**Doel:** Controleren of student zijn/haar behaalde keuzedelen kan zien

**Precondities:**
- Ingelogd als student
- Student heeft minimaal 1 behaald keuzedeel in database

**Teststappen:**

| Stap | Actie | Verwacht Resultaat | Status | Opmerking |
|------|-------|-------------------|--------|-----------|
| 1 | Klik op "Mijn Behaalde Keuzedelen" | Overzicht pagina opent | ⬜ | |
| 2 | Controleer titel | "Mijn Behaalde Keuzedelen" of vergelijkbaar | ⬜ | |
| 3 | Controleer lijst | Minimaal 1 keuzedeel wordt getoond | ⬜ | Aantal: ___ |
| 4 | Controleer keuzedeel info | Bevat: Titel, Code | ⬜ | |
| 5 | Controleer vinkje/icoon | ✅ of ander indicator van "behaald" | ⬜ | |
| 6 | Controleer periode info | Wanneer behaald (optioneel) | ⬜ | |
| 7 | Controleer info tekst | Tekst zoals "Deze kun je niet opnieuw kiezen" | ⬜ | |

**Test Resultaat:**
- [ ] ✅ Geslaagd
- [ ] ❌ Gefaald

**Opmerkingen:** _______________________________________________

---

### T8: CSV Uploaden (Admin)

**Doel:** Controleren of admin een CSV kan uploaden met studenten en behaalde keuzedelen

**Precondities:**
- Ingelogd als admin
- Test CSV bestand beschikbaar (formaat: zie documentatie)

**Teststappen:**

| Stap | Actie | Verwacht Resultaat | Status | Opmerking |
|------|-------|-------------------|--------|-----------|
| 1 | Navigeer naar /admin/upload-csv | CSV upload pagina opent | ⬜ | |
| 2 | Controleer upload formulier | "Choose File" knop zichtbaar | ⬜ | |
| 3 | Controleer waarschuwing | Tekst over CSV formaat | ⬜ | |
| 4 | Klik "Choose File" | Bestandsselectie opent | ⬜ | |
| 5 | Selecteer test.csv bestand | Bestandsnaam verschijnt naast knop | ⬜ | |
| 6 | Klik "Upload CSV" | Upload start | ⬜ | |
| 7 | Wacht op verwerking | Laad indicator of verwerking melding | ⬜ | Tijd: ___ sec |
| 8 | Controleer succesmelding | Melding: "X users aangemaakt" of vergelijkbaar | ⬜ | Aantal: ___ |
| 9 | Scroll naar beneden | "Geüploade Bestanden" sectie zichtbaar | ⬜ | |
| 10 | Controleer bestandslijst | test.csv verschijnt in lijst met datum | ⬜ | |
| 11 | Controleer knoppen | "Download" en "Verwijderen" knoppen aanwezig | ⬜ | |

**Verificatie in Database:**
- Open database tool (phpMyAdmin / TablePlus)
- Check `users` tabel: nieuwe users met `csv_source` = 'test.csv'
- Check `behaalde_keuzedelen` tabel: koppelingen aanwezig

**Test Resultaat:**
- [ ] ✅ Geslaagd
- [ ] ❌ Gefaald

**Opmerkingen:** _______________________________________________

---

### T9: CSV Verwijderen (Admin)

**Doel:** Controleren of admin een CSV kan verwijderen inclusief bijbehorende users

**Precondities:**
- Ingelogd als admin
- Minimaal 1 CSV bestand geüpload (uit T8)

**Teststappen:**

| Stap | Actie | Verwacht Resultaat | Status | Opmerking |
|------|-------|-------------------|--------|-----------|
| 1 | Ga naar CSV upload pagina | Lijst geüploade bestanden zichtbaar | ⬜ | |
| 2 | Tel aantal users met csv_source | Noteer aantal (voor/na vergelijking) | ⬜ | Voor: ___ |
| 3 | Klik "🗑️ Verwijderen" bij test.csv | Bevestigings prompt verschijnt | ⬜ | |
| 4 | Controleer waarschuwing | Tekst: "Dit verwijdert ook users" | ⬜ | |
| 5 | Klik "Bevestigen" | Verwijdering start | ⬜ | |
| 6 | Controleer succesmelding | Melding: "CSV en X users verwijderd" | ⬜ | Aantal: ___ |
| 7 | Controleer bestandslijst | test.csv is niet meer zichtbaar | ⬜ | |
| 8 | Controleer storage folder | Bestand weg uit storage/app/csv/ | ⬜ | |

**Verificatie in Database:**
- Check `users` tabel: users met `csv_source` = 'test.csv' zijn weg
- Check `behaalde_keuzedelen` tabel: gekoppelde records zijn weg

**Test Resultaat:**
- [ ] ✅ Geslaagd
- [ ] ❌ Gefaald

**Opmerkingen:** _______________________________________________

---

### T10: Inschrijving Validatie - Periode Gesloten

**Doel:** Controleren of inschrijven geblokkeerd wordt als periode gesloten is

**Precondities:**
- Ingelogd als student
- **Inschrijfperiode is GESLOTEN** (inschrijving_open = false in database)

**Teststappen:**

| Stap | Actie | Verwacht Resultaat | Status | Opmerking |
|------|-------|-------------------|--------|-----------|
| 1 | Ga naar database: `periodes` tabel | Open database tool | ⬜ | |
| 2 | Set `inschrijving_open` = 0 (false) | Update query uitvoeren | ⬜ | |
| 3 | Ga naar /inschrijven pagina | Inschrijf pagina of foutmelding | ⬜ | |
| 4 | Als formulier zichtbaar: vul 3 keuzes in | Keuzes geselecteerd | ⬜ | |
| 5 | Klik "Bevestigen" | Foutmelding verschijnt | ⬜ | |
| 6 | Controleer foutmelding | Tekst: "Inschrijfperiode is gesloten" of vergelijkbaar | ⬜ | |
| 7 | Controleer kleur | Rode achtergrond of rode tekst | ⬜ | |
| 8 | Controleer database: `inschrijvingen` | Geen nieuwe inschrijving toegevoegd | ⬜ | |

**Test Resultaat:**
- [ ] ✅ Geslaagd
- [ ] ❌ Gefaald

**Opmerkingen:** _______________________________________________

---

### T11: Inschrijving Validatie - Keuzedeel Vol

**Doel:** Controleren of inschrijven geblokkeerd wordt voor vol keuzedeel

**Precondities:**
- Ingelogd als student
- Periode is open
- Een keuzedeel heeft max_inschrijvingen = huidige inschrijvingen (VOL)

**Setup:**
1. Ga naar database: `keuzedelen` tabel
2. Vind een keuzedeel en noteer `id` en `max_inschrijvingen`
3. Tel inschrijvingen in `inschrijvingen` tabel voor dat keuzedeel
4. Als niet vol: voeg handmatig inschrijvingen toe tot vol

**Teststappen:**

| Stap | Actie | Verwacht Resultaat | Status | Opmerking |
|------|-------|-------------------|--------|-----------|
| 1 | Noteer vol keuzedeel | Keuzedeel ID: ___, Max: ___ | ⬜ | |
| 2 | Ga naar /inschrijven pagina | Formulier zichtbaar | ⬜ | |
| 3 | Selecteer vol keuzedeel als 1e keuze | Geselecteerd | ⬜ | |
| 4 | Selecteer 2 andere voor 2e en 3e keuze | Geselecteerd | ⬜ | |
| 5 | Klik "Bevestigen" | Foutmelding verschijnt | ⬜ | |
| 6 | Controleer foutmelding | Tekst: "Keuzedeel is vol" of vergelijkbaar | ⬜ | |
| 7 | Controleer database | Geen nieuwe inschrijving toegevoegd | ⬜ | |

**Test Resultaat:**
- [ ] ✅ Geslaagd
- [ ] ❌ Gefaald
- [ ] ⚠️ TODO - Validatie nog niet geïmplementeerd

**Opmerkingen:** _______________________________________________

---

### T12: Inschrijving Validatie - Al Behaald

**Doel:** Controleren of student zich niet kan inschrijven voor keuzedeel die al behaald is

**Precondities:**
- Ingelogd als student
- Student heeft minimaal 1 behaald keuzedeel

**Teststappen:**

| Stap | Actie | Verwacht Resultaat | Status | Opmerking |
|------|-------|-------------------|--------|-----------|
| 1 | Bekijk "Behaalde Keuzedelen" | Noteer een behaald keuzedeel | ⬜ | Code: ____ |
| 2 | Ga naar /inschrijven | Formulier zichtbaar | ⬜ | |
| 3 | Selecteer behaald keuzedeel als 1e keuze | Geselecteerd (of niet in lijst) | ⬜ | |
| 4 | Selecteer 2 andere voor 2e en 3e keuze | Geselecteerd | ⬜ | |
| 5 | Klik "Bevestigen" | Foutmelding verschijnt | ⬜ | |
| 6 | Controleer foutmelding | Tekst: "Je hebt dit keuzedeel al behaald" | ⬜ | |

**Alternatief:** Behaalde keuzedelen zijn niet zichtbaar in dropdown

**Test Resultaat:**
- [ ] ✅ Geslaagd
- [ ] ❌ Gefaald
- [ ] ⚠️ TODO - Validatie nog niet geïmplementeerd

**Opmerkingen:** _______________________________________________

---

### T13: Toegang Controle - Admin Pagina

**Doel:** Controleren of alleen admins toegang hebben tot admin functies

**Precondities:**
- Ingelogd als **student** (niet admin!)

**Teststappen:**

| Stap | Actie | Verwacht Resultaat | Status | Opmerking |
|------|-------|-------------------|--------|-----------|
| 1 | Probeer naar /admin/upload-csv te gaan | Toegang geweigerd of redirect | ⬜ | |
| 2 | Controleer foutmelding | "Unauthorized" of "403 Forbidden" | ⬜ | |
| 3 | Controleer navigatie menu | Geen "Admin" links zichtbaar | ⬜ | |
| 4 | Log uit | Uitgelogd | ⬜ | |
| 5 | Log in als admin | Ingelogd als admin | ⬜ | |
| 6 | Ga naar /admin/upload-csv | Pagina opent zonder problemen | ⬜ | |

**Test Resultaat:**
- [ ] ✅ Geslaagd
- [ ] ❌ Gefaald

**Opmerkingen:** _______________________________________________

---

### T14: Logout Functionaliteit

**Doel:** Controleren of uitloggen werkt

**Precondities:**
- Ingelogd (als student of admin)

**Teststappen:**

| Stap | Actie | Verwacht Resultaat | Status | Opmerking |
|------|-------|-------------------|--------|-----------|
| 1 | Zoek "Logout" link of knop | Link zichtbaar in navigatie | ⬜ | |
| 2 | Klik op "Logout" | Je wordt uitgelogd | ⬜ | |
| 3 | Controleer redirect | Terug naar login of homepage | ⬜ | |
| 4 | Controleer authenticatie status | Niet meer ingelogd (geen welkomst bericht) | ⬜ | |
| 5 | Probeer naar /inschrijven te gaan | Redirect naar login | ⬜ | |
| 6 | Terug navigeren in browser | Blijft uitgelogd | ⬜ | |

**Test Resultaat:**
- [ ] ✅ Geslaagd
- [ ] ❌ Gefaald

**Opmerkingen:** _______________________________________________

---

## Extra Validatie Tests

### T15: Inschrijving - Duplicaat Keuzedelen

**Doel:** Controleren dat student niet 2x hetzelfde keuzedeel kan kiezen

**Teststappen:**
1. Ga naar /inschrijven
2. Selecteer "Web Development" als 1e keuze
3. Selecteer "Web Development" als 2e keuze
4. Selecteer "Database" als 3e keuze
5. Klik "Bevestigen"
6. **Verwacht:** Foutmelding "Alle keuzedelen moeten verschillend zijn"

**Test Resultaat:** ⬜ ✅ / ❌

---

### T16: CSV Upload - Foutief Formaat

**Doel:** Controleren dat verkeerde CSV formaat geweigerd wordt

**Teststappen:**
1. Maak een TXT bestand met CSV data
2. Probeer te uploaden
3. **Verwacht:** Foutmelding "Alleen CSV toegestaan"

**Test Resultaat:** ⬜ ✅ / ❌

---

### T17: Keuzedeel Details - Capaciteit Indicator

**Doel:** Visuele feedback voor volle keuzedelen

**Teststappen:**
1. Bekijk keuzedeel dat 30/30 is
2. **Verwacht:** Rode indicator of "VOL" label
3. Bekijk keuzedeel dat 10/30 is
4. **Verwacht:** Groene/normale indicator

**Test Resultaat:** ⬜ ✅ / ❌

---

## Browser Compatibiliteit Tests

Test de applicatie in verschillende browsers:

| Browser | Versie | Status | Opmerkingen |
|---------|--------|--------|-------------|
| Google Chrome | ___ | ⬜ | |
| Mozilla Firefox | ___ | ⬜ | |
| Microsoft Edge | ___ | ⬜ | |
| Safari (Mac) | ___ | ⬜ | |
| Mobile Chrome | ___ | ⬜ | |
| Mobile Safari | ___ | ⬜ | |

---

## Performance Tests

| Test | Verwacht | Gemeten | Status |
|------|----------|---------|--------|
| Homepage laadtijd | < 2 sec | ___ sec | ⬜ |
| Inloggen | < 1 sec | ___ sec | ⬜ |
| CSV upload (100 users) | < 5 sec | ___ sec | ⬜ |
| Keuzedelen overzicht | < 1 sec | ___ sec | ⬜ |

---

## Beveiligings Checklist

| Check | Status | Opmerking |
|-------|--------|-----------|
| Wachtwoorden zijn gehashed (niet leesbaar in database) | ⬜ | |
| SQL injection preventie (prepared statements) | ⬜ | Laravel Eloquent doet dit |
| XSS preventie (HTML escaping) | ⬜ | Laravel Blade doet dit |
| CSRF tokens op formulieren | ⬜ | @csrf directive |
| Role-based access control werkt | ⬜ | Middleware |
| Sessie vervalt na uitloggen | ⬜ | |

---

## Bugs en Issues Log

| # | Datum | Beschrijving | Prioriteit | Status | Opgelost Datum |
|---|-------|--------------|------------|--------|----------------|
| 1 | | | | Open / In Progress / Opgelost | |
| 2 | | | | | |
| 3 | | | | | |

**Prioriteit:**
- 🔴 Kritiek: Applicatie werkt niet / data verlies
- 🟡 Hoog: Belangrijke functie werkt niet
- 🟢 Gemiddeld: Klein probleem, werk-around mogelijk
- 🔵 Laag: Cosmetisch, geen impact op functionaliteit

---

## Test Samenvatting

**Totaal aantal tests:** 14 basis + extra validaties  
**Geslaagd:** ___ / 14  
**Gefaald:** ___ / 14  
**Deels geslaagd:** ___ / 14  
**Nog te implementeren:** ___ / 14

**Percentage geslaagd:** ____%

---

## Definitie van Gereed

De applicatie is klaar voor deployment als:

- [ ] Alle hoge prioriteit tests zijn geslaagd (✅)
- [ ] Geen kritieke bugs (🔴) open staan
- [ ] Minimaal 90% van alle tests zijn geslaagd
- [ ] Beveiligings checks zijn afgevinkt
- [ ] Minimaal 2 browsers getest zonder grote problemen
- [ ] Performance voldoet aan verwachtingen
- [ ] Documentatie is compleet (sitemap, wireframes, diagrammen)

---

## Goedkeuring

**Geteste door:**  
Naam: _________________________  
Datum: _________________________  
Handtekening: _________________________

**Goedgekeurd door:**  
Naam: _________________________  
Functie: _________________________  
Datum: _________________________  
Handtekening: _________________________

---

## Aanbevelingen voor Toekomstige Versie

Na deze acceptatietest zijn de volgende features aanbevolen:

1. **Admin Keuzedelen CRUD** - Volledige beheer interface
2. **Inschrijvingen Overzicht** - Admin kan zien wie ingeschreven is
3. **Periode Toggle** - Admin kan periode open/sluiten
4. **Email Notificaties** - Bevestiging na inschrijving
5. **SLB Dashboard** - Voortgang bekijken van studenten
6. **Export Functionaliteit** - Excel export van inschrijvingen
7. **Responsive Design Verbetering** - Beter op mobiel

---

## Tips voor Testers (MBO4)

### Hoe test je goed?

1. **Volg de stappen precies** - Niet overslaan!
2. **Noteer alles** - Ook kleine problemen
3. **Test verschillende scenarios** - Niet alleen de "happy path"
4. **Kijk naar details** - Spelfouten, kleuren, layout
5. **Denk als een gebruiker** - Is het logisch? Makkelijk?

### Wat als iets niet werkt?

1. **Beschrijf het probleem duidelijk**
   - Wat deed je?
   - Wat verwachtte je?
   - Wat gebeurde er?
2. **Maak screenshot** (Windows: Win + Shift + S)
3. **Noteer in bugs log**
4. **Vermeld browser en versie**

### Test Mantra: "Break it before users do!"

Probeer de applicatie kapot te maken:
- Rare invoer (emoji's, lange teksten)
- Snel achter elkaar klikken
- Terug knop gebruiken
- Meerdere tabs open
- Geen internet (wat gebeurt er?)

---

**Einde Acceptatietest Document**

