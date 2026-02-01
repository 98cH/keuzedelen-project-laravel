# Keuzedelen Project Documentatie

**Project:** Keuzedelen Inschrijf Systeem  
**Student:** _________________________  
**Datum:** 1 februari 2026  
**Niveau:** MBO4

---

## 📚 Documentatie Overzicht

Deze map bevat alle documentatie voor het Keuzedelen Inschrijf project. Alle documenten zijn geschreven op MBO4 niveau met duidelijke uitleg.

---

## 📄 Beschikbare Documenten

| # | Document | Beschrijving | Bestand |
|---|----------|--------------|---------|
| 1 | **Sitemap** | Overzicht van alle pagina's en navigatie structuur | [1-sitemap.md](1-sitemap.md) |
| 2 | **Wireframes** | Schermontwerpen van alle pagina's | [2-wireframes.md](2-wireframes.md) |
| 3 | **Use Case Diagram** | Wie kan wat doen in het systeem | [3-usecase-diagram.md](3-usecase-diagram.md) |
| 4 | **Klassendiagram** | Database structuur en relaties | [4-klassendiagram.md](4-klassendiagram.md) |
| 5 | **Activiteitendiagram** | Processtappen en flows | [5-activiteitendiagram.md](5-activiteitendiagram.md) |
| 6 | **Acceptatietest** | Test scenario's en checklist | [6-acceptatietest.md](6-acceptatietest.md) |

---

## 🎯 Hoe Gebruik Je Deze Documentatie?

### Voor Ontwikkeling
1. **Start met Sitemap** - Begrijp de structuur
2. **Bekijk Wireframes** - Zie hoe het eruit moet zien
3. **Lees Use Cases** - Weet wat elk functie doet
4. **Check Klassendiagram** - Bouw de database correct
5. **Volg Activiteitendiagram** - Implementeer de flows
6. **Test met Acceptatietest** - Controleer of alles werkt

### Voor Presentatie
- Open elk document in volgorde
- Gebruik diagrammen om uit te leggen
- Verwijst naar wireframes voor demo

### Voor Assessment
- Alle documenten zijn assessment-ready
- Print ze uit of deel digitaal
- Vink test checklists af

---

## 🚀 Project Status

### Geïmplementeerd ✅
- User authenticatie (login/register)
- Student keuzedelen bekijken
- Student inschrijven (basis)
- Student behaalde keuzedelen bekijken
- Admin CSV upload
- Admin CSV verwijderen
- Role-based access control

### In Development 🟡
- Inschrijving validatie checks (periode, capaciteit, behaald)

### Te Implementeren ❌
- Admin keuzedelen CRUD
- Admin inschrijvingen overzicht
- Periode open/sluiten toggle
- SLB dashboard
- Email notificaties

---

## 📋 Technische Details

**Framework:** Laravel 12.42.0  
**PHP:** 8.2.12  
**Database:** MySQL  
**Frontend:** Blade Templates  

**Models:**
- User (studenten, admins, SLB)
- Keuzedeel
- Periode
- Opleiding
- BehaaldeKeuzedeel
- Inschrijving

**Controllers:**
- HomeController
- KeuzedeelController
- InschrijvingController
- BehaaldeKeuzedelenController
- AdminCsvImportController

---

## 🔗 Belangrijke Links

- **Project Repository:** [Link naar Git]
- **Live Demo:** [Link naar server]
- **Trello Board:** [Link naar planning]
- **API Documentation:** [Link indien beschikbaar]

---

## 📝 Changelog

| Versie | Datum | Wijzigingen |
|--------|-------|-------------|
| 1.0 | 01-02-2026 | Eerste volledige documentatie set |
| 0.9 | 29-01-2026 | CSV upload en delete functionaliteit |
| 0.8 | 28-01-2026 | Basis student functies |
| 0.7 | 15-01-2026 | Database migraties en seeders |

---

## 👥 Contact

**Student Developer:**  
Naam: _________________________  
Email: _________________________  
Klas: _________________________

**Begeleider:**  
Naam: _________________________  
Email: _________________________

**Opdrachtgever:**  
School: _________________________  
Afdeling: _________________________

---

## 📖 Lees Volgorde voor Nieuwe Teamleden

Als je nieuw bent op dit project, lees dan in deze volgorde:

1. **Deze README** (ben je nu aan het lezen! ✅)
2. **Sitemap** - Krijg overzicht van alle pagina's
3. **Use Case Diagram** - Begrijp wie wat kan doen
4. **Wireframes** - Zie hoe het eruit ziet
5. **Klassendiagram** - Leer de database structuur
6. **Activiteitendiagram** - Snap de processen
7. **Acceptatietest** - Test zelf de applicatie

---

## 🎓 MBO4 Competenties

Deze documentatie dekt de volgende competenties:

**B1-K1:** Analyseren
- Use case diagram laat analyse zien
- Klassendiagram toont database analyse

**B1-K2:** Adviseren
- Sitemap adviseert over navigatie structuur
- Wireframes adviseren over UX

**B1-K3:** Ontwerpen
- Klassendiagram is database ontwerp
- Activiteitendiagram is proces ontwerp

**B1-K4:** Realiseren
- Acceptatietest controleert realisatie
- Code in src/ map is realisatie

**B1-K5:** Testen
- Acceptatietest document
- Test cases per functie

---

## 📚 Extra Bronnen

### Laravel Documentatie
- [Laravel Official Docs](https://laravel.com/docs)
- [Laravel Eloquent](https://laravel.com/docs/eloquent)
- [Laravel Blade](https://laravel.com/docs/blade)

### Diagram Tools
- [Mermaid Live Editor](https://mermaid.live) - Voor Mermaid diagrammen
- [PlantUML Online](http://www.plantuml.com/plantuml) - Voor PlantUML
- [Draw.io](https://app.diagrams.net) - Voor algemene diagrammen

### Testing Tools
- PHPUnit (ingebouwd in Laravel)
- Browser DevTools (F12)
- Postman (API testing)

---

## 🆘 Hulp Nodig?

### Problemen met Documentatie?
- Check of je de nieuwste versie hebt
- Lees de "Wat is..." sectie in elk document
- Bekijk de voorbeelden

### Problemen met Code?
- Check `storage/logs/laravel.log`
- Gebruik `dd()` voor debugging
- Run `php artisan route:list` voor routes

### Niet Werkend?
1. `php artisan config:clear`
2. `php artisan cache:clear`
3. `php artisan route:clear`
4. `composer dump-autoload`

---

## ✨ Credits

Ontwikkeld als onderdeel van MBO4 Software Developer opleiding.

**Special Thanks:**
- Laravel community
- Stack Overflow
- GitHub Copilot voor documentatie hulp

---

## 📜 Licentie

Dit project is ontwikkeld voor educatieve doeleinden.

---

**Veel succes met je project! 🚀**

