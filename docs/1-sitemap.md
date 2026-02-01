# Sitemap - Keuzedelen Inschrijf Applicatie

**Project:** Keuzedelen Inschrijf Systeem  
**Datum:** 1 februari 2026  
**Niveau:** MBO4

---

## Wat is een Sitemap?
Een sitemap is een overzicht van alle pagina's in de applicatie. Het laat zien hoe de pagina's met elkaar verbonden zijn en wie toegang heeft tot welke pagina's.

---

## Structuur van de Applicatie

```
Homepage (/)
│
├── [Openbaar - Alle bezoekers]
│   ├── Login (/login)
│   └── Registreren (/register)
│
├── [Student - Ingelogd]
│   ├── Keuzedelen Overzicht (/)
│   │   └── Keuzedeel Detail (/keuzedelen/{id})
│   │
│   ├── Inschrijven (/inschrijven)
│   │   └── Inschrijving Bevestiging
│   │
│   └── Mijn Behaalde Keuzedelen (/behaalde-keuzedelen)
│
└── [Admin - Beheerder]
    ├── Admin Dashboard (/admin)
    │
    ├── CSV Upload Beheer (/admin/upload-csv)
    │   ├── CSV Upload Formulier
    │   ├── Overzicht Geüploade Bestanden
    │   └── CSV Verwijderen (DELETE /admin/csv/{filename})
    │
    ├── Keuzedelen Beheer (/admin/keuzedelen) [TODO]
    │   ├── Keuzedeel Toevoegen
    │   ├── Keuzedeel Bewerken
    │   └── Keuzedeel Verwijderen/Deactiveren
    │
    ├── Inschrijvingen Overzicht (/admin/inschrijvingen) [TODO]
    │   ├── Per Keuzedeel
    │   └── Per Student
    │
    └── Inschrijfperiode Beheer (/admin/periodes) [TODO]
        ├── Periode Openen
        └── Periode Sluiten
```

---

## Pagina Details

### 1. Openbare Pagina's

| Pagina | URL | Wie heeft toegang? | Functie |
|--------|-----|-------------------|---------|
| Homepage | `/` | Iedereen | Overzicht van keuzedelen (gefilterd per opleiding voor studenten) |
| Login | `/login` | Niet-ingelogde gebruikers | Inloggen met email en wachtwoord |
| Registreren | `/register` | Niet-ingelogde gebruikers | Nieuw account aanmaken |

### 2. Student Pagina's

| Pagina | URL | Wie heeft toegang? | Functie |
|--------|-----|-------------------|---------|
| Keuzedelen Overzicht | `/` | Student (ingelogd) | Lijst van keuzedelen voor hun opleiding |
| Keuzedeel Detail | `/keuzedelen/{id}` | Student (ingelogd) | Details van één keuzedeel (beschrijving, capaciteit) |
| Inschrijven | `/inschrijven` | Student (ingelogd) | Formulier om 3 keuzedelen te kiezen (1e, 2e, 3e keuze) |
| Behaalde Keuzedelen | `/behaalde-keuzedelen` | Student (ingelogd) | Overzicht van keuzedelen die student al behaald heeft |

### 3. Admin Pagina's

| Pagina | URL | Wie heeft toegang? | Functie |
|--------|-----|-------------------|---------|
| CSV Upload | `/admin/upload-csv` | Admin | Upload CSV met studenten en behaalde keuzedelen |
| CSV Verwijderen | `/admin/csv/{filename}` | Admin | Verwijder geüploade CSV en bijbehorende users |
| Keuzedelen CRUD | `/admin/keuzedelen` | Admin | Beheer keuzedelen (toevoegen, bewerken, verwijderen) [TODO] |
| Inschrijvingen Overzicht | `/admin/inschrijvingen` | Admin | Zie wie ingeschreven is per keuzedeel [TODO] |
| Periode Beheer | `/admin/periodes` | Admin | Open/sluit inschrijfperiode [TODO] |

---

## Navigatie Flows

### Flow 1: Student Inschrijven
```
Login → Homepage → Keuzedelen Bekijken → Inschrijven → 3 Keuzes Selecteren → Bevestiging
```

### Flow 2: Student Behaalde Keuzedelen Bekijken
```
Login → Mijn Behaalde Keuzedelen → Overzicht
```

### Flow 3: Admin CSV Uploaden
```
Login (als admin) → Admin Dashboard → CSV Upload → Bestand Selecteren → Upload → Overzicht Bestanden
```

### Flow 4: Admin CSV Verwijderen
```
Admin Dashboard → CSV Upload Overzicht → Verwijderen Knop → Bevestiging → Gebruikers + Bestand Verwijderd
```

---

## Rollen en Toegang

| Rol | Beschrijving | Toegang |
|-----|-------------|---------|
| **Gast** | Niet-ingelogde bezoeker | Homepage, Login, Register |
| **Student** | Ingelogde leerling | Alle student pagina's + keuzedelen bekijken |
| **Admin** | Beheerder | Alle pagina's inclusief admin functies |
| **SLB** | Studieloopbaanbegeleider | [Nog te implementeren] |

---

## Middleware Bescherming

| Middleware | Functie | Toegepast op |
|------------|---------|--------------|
| `auth` | Controleer of gebruiker ingelogd is | Alle student en admin routes |
| `role:admin` | Controleer of gebruiker admin is | Alle `/admin/*` routes |
| `role:student` | Controleer of gebruiker student is | Student-specifieke routes |

---

## Toekomstige Uitbreidingen (TODO)

1. **Admin Keuzedelen CRUD** - Volledige beheer van keuzedelen
2. **Inschrijvingen Overzicht** - Admin kan zien wie waar ingeschreven is
3. **Periode Management** - Open/sluit inschrijfperiode
4. **SLB Dashboard** - Overzicht voor studieloopbaanbegeleiders
5. **Student Profiel** - Persoonlijke gegevens bewerken
6. **Email Notificaties** - Bevestiging van inschrijving

---

## Versie Historie

| Versie | Datum | Wijzigingen |
|--------|-------|-------------|
| 1.0 | 01-02-2026 | Eerste versie met huidige functionaliteit |

