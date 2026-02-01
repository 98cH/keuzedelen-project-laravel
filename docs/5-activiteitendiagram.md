# Activiteitendiagram - Keuzedelen Inschrijf Applicatie

**Project:** Keuzedelen Inschrijf Systeem  
**Datum:** 1 februari 2026  
**Niveau:** MBO4

---

## Wat is een Activiteitendiagram?

Een activiteitendiagram laat zien:
- **Welke stappen** er genomen worden (activiteiten)
- **In welke volgorde** dingen gebeuren (flow)
- **Wanneer** er keuzes gemaakt worden (beslissingen)
- **Wie** wat doet (swimlanes)

Het is als een stappenplan of flowchart van een proces.

---

## Symbolen Uitleg

| Symbool | Naam | Betekenis |
|---------|------|-----------|
| ⚫ | Start | Hier begint het proces |
| ⬛ | Einde | Hier stopt het proces |
| ▭ | Activiteit | Een actie die uitgevoerd wordt |
| ◇ | Beslissing | Een keuze (ja/nee) |
| ➡️ | Pijl | Richting van de flow |
| ║ | Swimlane | Wie is verantwoordelijk |

---

## Diagram 1: Student Inschrijft voor Keuzedelen

### Mermaid Syntax
```mermaid
flowchart TD
    Start([Student wil inschrijven]) --> Login{Ingelogd?}
    Login -->|Nee| DoLogin[Login met email/wachtwoord]
    DoLogin --> CheckCredentials{Credentials correct?}
    CheckCredentials -->|Nee| ErrorLogin[Foutmelding tonen]
    ErrorLogin --> DoLogin
    CheckCredentials -->|Ja| CheckRole{Role = student?}
    
    Login -->|Ja| CheckRole
    CheckRole -->|Nee| Denied[Toegang geweigerd]
    Denied --> End([Einde])
    
    CheckRole -->|Ja| ViewKeuzedelen[Bekijk beschikbare keuzedelen]
    ViewKeuzedelen --> ClickInschrijven[Klik op 'Inschrijven']
    ClickInschrijven --> CheckPeriode{Periode open?}
    
    CheckPeriode -->|Nee| ErrorPeriode[Foutmelding: Periode gesloten]
    ErrorPeriode --> End
    
    CheckPeriode -->|Ja| ShowForm[Toon formulier met 3 dropdowns]
    ShowForm --> Select1[Selecteer 1e keuze]
    Select1 --> Select2[Selecteer 2e keuze]
    Select2 --> Select3[Selecteer 3e keuze]
    Select3 --> Submit[Klik 'Bevestigen']
    
    Submit --> Validate{Validatie OK?}
    Validate -->|Nee| ShowErrors[Toon foutmeldingen]
    ShowErrors --> ShowForm
    
    Validate -->|Ja| CheckDuplicate{Alle 3 verschillend?}
    CheckDuplicate -->|Nee| ErrorDuplicate[Fout: Keuzedelen moeten verschillend zijn]
    ErrorDuplicate --> ShowForm
    
    CheckDuplicate -->|Ja| CheckBehaald{Al behaald?}
    CheckBehaald -->|Ja| ErrorBehaald[Fout: Je hebt dit keuzedeel al behaald]
    ErrorBehaald --> ShowForm
    
    CheckBehaald -->|Nee| CheckActief{Keuzedeel actief?}
    CheckActief -->|Nee| ErrorActief[Fout: Keuzedeel is niet actief]
    ErrorActief --> ShowForm
    
    CheckActief -->|Ja| CheckVol{Keuzedeel vol?}
    CheckVol -->|Ja| ErrorVol[Fout: Keuzedeel is vol]
    ErrorVol --> ShowForm
    
    CheckVol -->|Nee| SaveInschrijving[Sla inschrijving op in database]
    SaveInschrijving --> Success[Toon succesmelding]
    Success --> End

    style Start fill:#90EE90
    style End fill:#FFB6C1
    style ErrorLogin fill:#FFB6C1
    style ErrorPeriode fill:#FFB6C1
    style ErrorDuplicate fill:#FFB6C1
    style ErrorBehaald fill:#FFB6C1
    style ErrorActief fill:#FFB6C1
    style ErrorVol fill:#FFB6C1
    style Success fill:#90EE90
```

### ASCII Versie
```
           ⚫ START
           │
      [Student wil inschrijven]
           │
           ▼
      ◇ Ingelogd?
      │         │
     Nee        Ja
      │         │
      ▼         │
  [Login met    │
   email/pwd]   │
      │         │
      ▼         │
  ◇ Correct?    │
   │      │     │
  Nee     Ja    │
   │      │     │
   │      └─────┤
   │            ▼
   │        ◇ Role = student?
   │         │              │
   │        Nee            Ja
   │         │              │
   │         ▼              ▼
   │    [Toegang       [Bekijk keuzedelen]
   │     geweigerd]         │
   │         │              ▼
   │         ▼         [Klik Inschrijven]
   │       ⬛ EINDE         │
   │                        ▼
   │                   ◇ Periode open?
   │                    │           │
   │                   Nee         Ja
   │                    │           │
   │                    ▼           ▼
   │              [Foutmelding] [Toon formulier]
   │                    │           │
   │                    ▼           ▼
   │                  ⬛ EINDE  [Selecteer 3 keuzes]
   │                                │
   │                                ▼
   │                          [Klik Bevestigen]
   │                                │
   │                                ▼
   │                          ◇ Validatie OK?
   │                           │          │
   │                          Nee        Ja
   │                           │          │
   │                           │          ▼
   │                           │    ◇ Alle verschillend?
   │                           │     │            │
   │                           │    Nee          Ja
   │                           │     │            │
   │                           │     │            ▼
   │                           │     │      ◇ Al behaald?
   │                           │     │       │         │
   │                           │     │      Ja        Nee
   │                           │     │       │         │
   │                           │     │       │         ▼
   │                           │     │       │    ◇ Actief?
   │                           │     │       │     │     │
   │                           │     │       │    Nee   Ja
   │                           │     │       │     │     │
   │                           │     │       │     │     ▼
   │                           │     │       │     │  ◇ Vol?
   │                           │     │       │     │   │  │
   │                           │     │       │     │  Ja Nee
   │                           │     │       │     │   │  │
   └───────────────────────────┴─────┴───────┴─────┴───┘  │
                                                           ▼
                                                  [Sla inschrijving op]
                                                           │
                                                           ▼
                                                  [Toon succesmelding]
                                                           │
                                                           ▼
                                                         ⬛ EINDE
```

---

## Diagram 2: Admin Upload CSV Bestand

### Mermaid Syntax
```mermaid
flowchart TD
    Start([Admin wil CSV uploaden]) --> Login{Ingelogd als admin?}
    Login -->|Nee| LoginForm[Login formulier]
    LoginForm --> CheckAuth{Credentials correct?}
    CheckAuth -->|Nee| ErrorAuth[Foutmelding]
    ErrorAuth --> LoginForm
    CheckAuth -->|Ja| CheckAdmin{Role = admin?}
    
    Login -->|Ja| CheckAdmin
    CheckAdmin -->|Nee| Denied[Toegang geweigerd]
    Denied --> End([Einde])
    
    CheckAdmin -->|Ja| ShowUploadPage[Toon CSV upload pagina]
    ShowUploadPage --> SelectFile[Selecteer CSV bestand]
    SelectFile --> ClickUpload[Klik 'Upload CSV']
    
    ClickUpload --> CheckFileExists{Bestand geselecteerd?}
    CheckFileExists -->|Nee| ErrorNoFile[Fout: Geen bestand gekozen]
    ErrorNoFile --> ShowUploadPage
    
    CheckFileExists -->|Ja| CheckFileType{Is .csv bestand?}
    CheckFileType -->|Nee| ErrorWrongType[Fout: Alleen CSV toegestaan]
    ErrorWrongType --> ShowUploadPage
    
    CheckFileType -->|Ja| ReadFile[Lees CSV bestand]
    ReadFile --> DetectDelimiter[Detecteer delimiter ; of ,]
    DetectDelimiter --> ParseHeader[Parse header rij kolom 7]
    ParseHeader --> CheckColumns{Kolommen correct?}
    
    CheckColumns -->|Nee| ErrorColumns[Fout: Kolommen kloppen niet]
    ErrorColumns --> LogError[Log foutmelding]
    LogError --> End
    
    CheckColumns -->|Ja| LoopStart[Start loop door regels]
    LoopStart --> ReadRow[Lees volgende rij]
    ReadRow --> CheckRowEmpty{Rij leeg?}
    
    CheckRowEmpty -->|Ja| MoreRows{Meer regels?}
    CheckRowEmpty -->|Nee| ExtractData[Extract data: studentnummer, naam, klas, etc.]
    
    ExtractData --> CheckUserExists{User bestaat al?}
    CheckUserExists -->|Ja| SkipUser[Skip deze user]
    SkipUser --> MoreRows
    
    CheckUserExists -->|Nee| CreateUser[Maak nieuwe user aan]
    CreateUser --> SaveUser[Sla user op in database]
    SaveUser --> LoopKeuzedelen[Loop door behaalde keuzedelen]
    
    LoopKeuzedelen --> GetKeuzedeelCode[Haal keuzedeelcode op]
    GetKeuzedeelCode --> FindKeuzedeel{Keuzedeel bestaat?}
    
    FindKeuzedeel -->|Nee| WarnKeuzedeel[Warning: Keuzedeel niet gevonden]
    WarnKeuzedeel --> NextKeuzedeel{Meer keuzedelen?}
    
    FindKeuzedeel -->|Ja| CreateBehaald[Maak BehaaldeKeuzedeel record]
    CreateBehaald --> SaveBehaald[Sla behaald keuzedeel op]
    SaveBehaald --> NextKeuzedeel
    
    NextKeuzedeel -->|Ja| GetKeuzedeelCode
    NextKeuzedeel -->|Nee| MoreRows
    
    MoreRows -->|Ja| ReadRow
    MoreRows -->|Nee| SaveFile[Sla CSV bestand op in storage/app/csv]
    
    SaveFile --> ShowSuccess[Toon succesmelding met aantal users]
    ShowSuccess --> ShowFileList[Toon lijst geüploade bestanden]
    ShowFileList --> End

    style Start fill:#90EE90
    style End fill:#FFB6C1
    style ErrorAuth fill:#FFB6C1
    style ErrorNoFile fill:#FFB6C1
    style ErrorWrongType fill:#FFB6C1
    style ErrorColumns fill:#FFB6C1
    style WarnKeuzedeel fill:#FFA500
    style ShowSuccess fill:#90EE90
```

### Tekst Stappenplan

**Stap 1: Authenticatie**
1. Admin opent CSV upload pagina
2. Systeem controleert of gebruiker ingelogd is
3. Systeem controleert of gebruiker admin rol heeft
4. Als niet → toegang geweigerd

**Stap 2: Bestand Selecteren**
5. Systeem toont upload formulier
6. Admin selecteert CSV bestand van computer
7. Admin klikt "Upload CSV"

**Stap 3: Validatie**
8. Systeem controleert of bestand geselecteerd is
9. Systeem controleert of bestand .csv extensie heeft
10. Als niet → foutmelding

**Stap 4: CSV Parsen**
11. Systeem leest CSV bestand
12. Systeem detecteert delimiter (';' of ',')
13. Systeem leest header rij (rij 7)
14. Systeem controleert of alle benodigde kolommen aanwezig zijn:
    - Studentnummer
    - Naam
    - Klas
    - Behaalde keuzedelen
15. Als niet → foutmelding met logging

**Stap 5: Data Verwerken**
16. Voor elke rij in CSV (vanaf rij 8):
    - **a.** Extract studentnummer, naam, klas
    - **b.** Controleer of user al bestaat (op basis van studentnummer)
    - **c.** Als bestaat → skip deze rij
    - **d.** Als niet bestaat → maak nieuwe user aan met:
        - Studentnummer
        - Naam
        - Email (gegenereerd)
        - Klas
        - Role = 'student'
        - Password (gegenereerd)
        - csv_source = bestandsnaam
    - **e.** Sla user op in database
    
**Stap 6: Keuzedelen Koppelen**
17. Voor elke behaalde keuzedeel kolom in de rij:
    - **a.** Haal keuzedeelcode op (bijv. "SD-001")
    - **b.** Zoek keuzedeel in database op basis van code
    - **c.** Als niet gevonden → log warning, ga verder
    - **d.** Als gevonden → maak BehaaldeKeuzedeel record:
        - user_id = nieuwe user
        - keuzedeel_id = gevonden keuzedeel
    - **e.** Sla behaald keuzedeel op in database

**Stap 7: Afsluiten**
18. Sla CSV bestand op in `storage/app/csv/`
19. Toon succesmelding met aantal aangemaakte users
20. Toon lijst van alle geüploade bestanden

---

## Diagram 3: Admin Verwijdert CSV en Users

### Mermaid Syntax
```mermaid
flowchart TD
    Start([Admin wil CSV verwijderen]) --> ViewList[Bekijk lijst geüploade bestanden]
    ViewList --> ClickDelete[Klik 'Verwijderen' bij een bestand]
    ClickDelete --> Confirm{Bevestiging?}
    
    Confirm -->|Nee| Cancel[Actie geannuleerd]
    Cancel --> End([Einde])
    
    Confirm -->|Ja| GetFilename[Haal bestandsnaam op]
    GetFilename --> CheckFileExists{Bestand bestaat in storage?}
    
    CheckFileExists -->|Nee| ErrorNotFound[Fout: Bestand niet gevonden]
    ErrorNotFound --> End
    
    CheckFileExists -->|Ja| FindUsers[Zoek users met csv_source = bestandsnaam]
    FindUsers --> CheckUsersFound{Users gevonden?}
    
    CheckUsersFound -->|Nee| NoUsers[Geen users om te verwijderen]
    NoUsers --> DeleteFile[Verwijder CSV bestand]
    
    CheckUsersFound -->|Ja| LoopUsers[Loop door gevonden users]
    LoopUsers --> GetUser[Haal volgende user op]
    GetUser --> DeleteBehaald[Verwijder behaalde keuzedelen van user]
    DeleteBehaald --> DeleteInschrijvingen[Verwijder inschrijvingen van user]
    DeleteInschrijvingen --> DeleteUser[Verwijder user]
    DeleteUser --> MoreUsers{Meer users?}
    
    MoreUsers -->|Ja| GetUser
    MoreUsers -->|Nee| DeleteFile
    
    DeleteFile --> CheckDeleted{Bestand verwijderd?}
    CheckDeleted -->|Nee| ErrorDelete[Fout bij verwijderen]
    ErrorDelete --> End
    
    CheckDeleted -->|Ja| ShowSuccess[Toon succesmelding met aantal verwijderde users]
    ShowSuccess --> RefreshList[Ververs lijst bestanden]
    RefreshList --> End

    style Start fill:#90EE90
    style End fill:#FFB6C1
    style ErrorNotFound fill:#FFB6C1
    style ErrorDelete fill:#FFB6C1
    style ShowSuccess fill:#90EE90
```

### Tekst Stappenplan

**Stap 1: Selecteren**
1. Admin bekijkt lijst geüploade CSV bestanden
2. Admin klikt op "🗑️ Verwijderen" knop bij een bestand
3. Systeem vraagt bevestiging met waarschuwing

**Stap 2: Bevestiging**
4. Als admin op "Annuleren" klikt → proces stopt
5. Als admin bevestigt → ga verder

**Stap 3: Validatie**
6. Systeem haalt bestandsnaam op
7. Systeem controleert of bestand bestaat in `storage/app/csv/`
8. Als niet → foutmelding

**Stap 4: Users Zoeken**
9. Systeem zoekt alle users waar `csv_source` = bestandsnaam
10. Systeem telt aantal gevonden users

**Stap 5: Users Verwijderen (Cascade)**
11. Voor elke gevonden user:
    - **a.** Verwijder alle behaalde keuzedelen (uit `behaalde_keuzedelen` tabel)
    - **b.** Verwijder alle inschrijvingen (uit `inschrijvingen` tabel)
    - **c.** Verwijder de user zelf (uit `users` tabel)

**Stap 6: Bestand Verwijderen**
12. Verwijder CSV bestand van schijf
13. Controleer of verwijderen gelukt is

**Stap 7: Feedback**
14. Toon succesmelding: "CSV en X users verwijderd"
15. Ververs lijst van bestanden (bestand is nu weg)

---

## Diagram 4: Periode Open/Sluiten (Toekomst)

### Mermaid Syntax
```mermaid
flowchart TD
    Start([Admin wil periode beheren]) --> ViewPeriode[Bekijk periode overzicht]
    ViewPeriode --> ShowStatus[Toon huidige status: Open/Gesloten]
    ShowStatus --> ClickToggle[Klik toggle knop]
    
    ClickToggle --> CheckCurrent{Huidige status?}
    CheckCurrent -->|Open| CloseFlow[Ga naar sluiten flow]
    CheckCurrent -->|Gesloten| OpenFlow[Ga naar openen flow]
    
    CloseFlow --> ConfirmClose{Bevestig sluiten?}
    ConfirmClose -->|Nee| Cancel[Geannuleerd]
    ConfirmClose -->|Ja| SetClosed[Set inschrijving_open = false]
    SetClosed --> SaveClosed[Sla wijziging op]
    SaveClosed --> SuccessClosed[Succesmelding: Periode gesloten]
    
    OpenFlow --> ConfirmOpen{Bevestig openen?}
    ConfirmOpen -->|Nee| Cancel
    ConfirmOpen -->|Ja| SetOpen[Set inschrijving_open = true]
    SetOpen --> SaveOpen[Sla wijziging op]
    SaveOpen --> SuccessOpen[Succesmelding: Periode geopend]
    
    SuccessClosed --> Refresh[Ververs pagina]
    SuccessOpen --> Refresh
    Cancel --> End([Einde])
    Refresh --> End

    style Start fill:#90EE90
    style End fill:#FFB6C1
    style SuccessClosed fill:#90EE90
    style SuccessOpen fill:#90EE90
```

---

## Swimlane Diagram: Student Inschrijving

**Swimlanes tonen wie verantwoordelijk is voor elke actie**

```
┌─────────────────────────────────────────────────────────────┐
│                          STUDENT                            │
├─────────────────────────────────────────────────────────────┤
│  ⚫ Start                                                    │
│   │                                                          │
│   ▼                                                          │
│  [Open keuzedelen pagina]                                   │
│   │                                                          │
│   ▼                                                          │
│  [Klik op Inschrijven]                                      │
│   │                                                          │
│   ▼                                                          │
│  [Selecteer 1e keuze]                                       │
│   │                                                          │
│   ▼                                                          │
│  [Selecteer 2e keuze]                                       │
│   │                                                          │
│   ▼                                                          │
│  [Selecteer 3e keuze]                                       │
│   │                                                          │
│   ▼                                                          │
│  [Klik Bevestigen] ─────────────────────────────┐           │
│                                                  │           │
└──────────────────────────────────────────────────┼───────────┘
┌──────────────────────────────────────────────────┼───────────┐
│                         SYSTEEM                  │           │
├──────────────────────────────────────────────────┼───────────┤
│                                                  ▼           │
│                                           [Controleer of     │
│                                            student ingelogd] │
│                                                  │           │
│                                                  ▼           │
│                                           ◇ Periode open?    │
│                                            │           │     │
│                                           Nee         Ja     │
│                                            │           │     │
│                                            ▼           ▼     │
│                                         [Fout]  [Valideer    │
│                                            │     3 keuzes]   │
│                                            │           │     │
│                                            │           ▼     │
│                                            │    ◇ Verschillend?│
│                                            │     │         │ │
│                                            │    Nee       Ja │
│                                            │     │         │ │
│                                            │     ▼         ▼ │
│                                            │  [Fout] [Check  │
│                                            │     │    behaald]│
│                                            │     │         │ │
│                                            │     │         ▼ │
│                                            │     │   ◇ Al behaald?│
│                                            │     │    │      │ │
│                                            │     │   Ja     Nee│
│                                            │     │    │      │ │
│                                            │     ▼    ▼      ▼ │
│                                            └─►[Toon  [Sla op  │
│                                                fout]  in DB]  │
│                                                 │       │     │
│                                                 │       ▼     │
│                                                 │ [Success-   │
│                                                 │  melding]   │
│                                                 │       │     │
└─────────────────────────────────────────────────┼───────┼─────┘
┌─────────────────────────────────────────────────┼───────┼─────┐
│                         STUDENT                 │       │     │
├─────────────────────────────────────────────────┼───────┼─────┤
│                                      ◄──────────┴───────┘     │
│                                      │                         │
│                                      ▼                         │
│                               [Zie resultaat]                  │
│                                      │                         │
│                                      ▼                         │
│                                    ⬛ Einde                    │
└─────────────────────────────────────────────────────────────── ┘
```

---

## Beslissingstabel: Inschrijving Validatie

| # | Periode Open | Keuzedeel Actief | Vol | Al Behaald | Verschillend | Resultaat |
|---|--------------|------------------|-----|------------|--------------|-----------|
| 1 | ❌ Nee | - | - | - | - | ❌ Fout: Periode gesloten |
| 2 | ✅ Ja | ❌ Nee | - | - | - | ❌ Fout: Keuzedeel inactief |
| 3 | ✅ Ja | ✅ Ja | ❌ Ja | - | - | ❌ Fout: Keuzedeel vol |
| 4 | ✅ Ja | ✅ Ja | ✅ Nee | ❌ Ja | - | ❌ Fout: Al behaald |
| 5 | ✅ Ja | ✅ Ja | ✅ Nee | ✅ Nee | ❌ Nee | ❌ Fout: Niet verschillend |
| 6 | ✅ Ja | ✅ Ja | ✅ Nee | ✅ Nee | ✅ Ja | ✅ **Inschrijving OK** |

**Legenda:**
- ✅ = Ja / Voldoet
- ❌ = Nee / Voldoet niet
- - = Niet relevant voor deze check

---

## Tips voor MBO4

### Hoe lees je een activiteitendiagram?

1. **Start bij de groene cirkel** (⚫ Start)
2. **Volg de pijlen** van boven naar beneden
3. **Let op ruiten** (◇) = hier wordt een keuze gemaakt
4. **Rechthoeken** = acties die uitgevoerd worden
5. **Eindigt bij rode vierkant** (⬛ Einde)

### Waarom is dit belangrijk?

- **Duidelijk proces:** Je ziet precies wat er gebeurt
- **Fouten vinden:** Als iets niet klopt, zie je waar in het proces
- **Testen:** Je kunt elk pad langs om bugs te vinden
- **Documentatie:** Anderen begrijpen hoe het werkt

### Hoe gebruik je dit bij programmeren?

1. **Neem het diagram**
2. **Elke rechthoek = functie of code**
3. **Elke ruit = if-statement**
4. **Volg de flow in je code**

**Voorbeeld in code:**
```php
// Diagram stap: ◇ Periode open?
if (!$periode->inschrijving_open) {
    // Nee-pad: [Fout: Periode gesloten]
    return back()->with('error', 'Inschrijfperiode is gesloten');
}

// Ja-pad: ga verder met volgende check
```

---

## Implementatie Status

| Diagram | Status | Opmerkingen |
|---------|--------|-------------|
| Student Inschrijving | 🟡 Basis | Basis werkt, validatie checks ontbreken |
| CSV Upload | ✅ Compleet | Volledig geïmplementeerd |
| CSV Verwijderen | ✅ Compleet | Met cascade delete |
| Periode Open/Sluiten | ❌ TODO | Nog niet gebouwd |

---

## Toekomstige Processen

### 5. Admin Wijst Keuzedelen Toe
- Input: Lijst inschrijvingen per keuzedeel
- Proces: Admin bekijkt prioriteiten en wijst toe
- Output: Elke student krijgt 1 toegewezen keuzedeel

### 6. Email Notificatie
- Trigger: Student schrijft in
- Proces: Systeem stuurt bevestigingsmail
- Output: Email in inbox van student

### 7. SLB Bekijkt Student Voortgang
- Input: Selecteer student
- Proces: Systeem toont behaalde + ingeschreven keuzedelen
- Output: Overzicht voor begeleiding

