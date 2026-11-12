# Thème WordPress « Fondation LONA »

Thème institutionnel sur mesure, Full Site Editing (Gutenberg + `theme.json`). Il ne dépend d'aucun constructeur de pages ni d'aucune extension obligatoire.
Signature : *« Ensemble, semons l'excellence. »*

- **Paquet installable :** `fondation-lona.zip`
- **Sources :** `fondation-lona/`
- **Prérequis :** WordPress 6.6 ou plus et PHP 8.1 ou plus (PHP 8.2+ recommandé). Le thème a été testé sur WordPress 7.1 et PHP 8.2 dans WordPress Playground.


> **Démo en ligne** (téléphone, tablette, ordinateur) : https://david-zebo.github.io/Fondation-Lona/
> Elle est publiée automatiquement par GitHub Pages à chaque `git push` sur la branche `main`. C'est une démonstration : chaque visite repart d'un site neuf.

---

## 1. Installation

1. **Sauvegarde** : avant toute mise en production, sauvegardez la base de données et `wp-content` (UpdraftPlus ou l'outil de sauvegarde de l'hébergeur).
2. Dans *Apparence › Thèmes › Ajouter › Téléverser un thème*, choisissez `fondation-lona.zip`, puis **Activer**.
3. Ouvrez *Fondation LONA › Installation* et cliquez sur **Lancer l'installation**. L'assistant :
   - crée les 18 pages institutionnelles, les 5 domaines d'intervention et les 4 fiches programmes de départ ;
   - définit la page d'accueil, la page des actualités et la page de confidentialité ;
   - propose d'activer les URL lisibles (`/a-propos/`, `/programmes/`…).

   - crée les **contenus officiels** repris des publications LinkedIn de la Fondation :
     - les programmes EXCELLENTIA RDC, FOCUS CANCER et Programmes d'autonomisation, avec leurs résultats publiés ;
     - 7 réalisations (kits d'autonomisation à Mbuji-Mayi, EXCELLENTIA Spécial ISAM, FOCUS CANCER, test EXCELLENTIA RDC 2026 à l'UPN, 300 bourses spéciales de l'ISAM Kinshasa, atelier industriel de l'ISAM, aide aux réfugiés congolais au Burundi) ;
     - 4 partenaires cités officiellement (ZED SUPPLY, HCR, AIRD, FONAREV), l'événement du 18 octobre 2026, l'adresse du siège et 6 chiffres d'impact sourcés ;
   - crée en option (case cochée par défaut) **13 articles** : le lancement du site et 12 publications LinkedIn de la Fondation (de décembre 2025 à novembre 2026). Les dates sont approximatives (LinkedIn affiche « il y a 3 semaines ») : vérifiez-les avant la mise en ligne.

   L'assistant **ne modifie ni ne supprime aucun contenu existant** : une page déjà présente est conservée. Vous pouvez le relancer sans risque.
4. **Logo et images** : l'assistant importe automatiquement le logo, l'icône du site (favicon) et les images d'illustration des programmes dans la médiathèque. Pour mettre une version haute définition du logo, passez par *Apparence › Éditeur › En-tête › Logo du site*.
5. Dans *Fondation LONA › Réglages*, renseignez :
   - les coordonnées et les réseaux sociaux (LinkedIn est prérempli) ;
   - l'e-mail de réception des formulaires et le lien de don ;
   - les chiffres d'impact (uniquement des chiffres vérifiés) ;
   - le logo en version claire, si vous en avez une.

## 2. Ce que contient le thème

| Élément | Détail |
|---|---|
| **Modèles** | accueil, page, page éditoriale (sans bandeau), article, archives, catégorie, recherche, 404, et un modèle fiche + un modèle liste pour chacun des Programmes, Réalisations et Événements |
| **Accueil (13 sections)** | Hero, Actualités, Présentation, Domaines (composition non uniforme), Programmes, Bâtir ensemble, Réalisations (mosaïque asymétrique), Impact, Témoignages, Partenaires, Galerie (photos + vidéo, ouverture en grand), Engagement, plus le pied de page |
| **Types de contenus** | Programmes, Réalisations, Événements, Partenaires, Témoignages, Équipe, Demandes reçues (privé) ; les Actualités utilisent les articles natifs |
| **Taxonomies** | Domaines d'intervention (communs à tous les contenus), Types de partenaires, Groupes d'équipe |
| **Blocs « Fondation LONA »** | Programmes, Réalisations, Impact en chiffres, Témoignages, Partenaires, Événements, Équipe, Formulaire, Fil d'Ariane, Partage, Sélecteur de langue, Coordonnées, Réseaux sociaux, Modalités de don, Fiche détaillée, Copyright |
| **Patterns** | 25 compositions (sections d'accueil et pages internes) dans l'inserteur, catégories « LONA » |

### Règles éditoriales intégrées (aucune donnée inventée)

- **Chiffres d'impact** : un indicateur sans valeur n'est jamais affiché.
- **Témoignages** : affichés uniquement si la case *Autorisation écrite de publication obtenue* est cochée. Une option *anonyme* masque le nom et la photo.
- **Résultats** des programmes et réalisations : affichés uniquement si la case *Résultats vérifiés* est cochée.
- **Partenaires** : aucun n'est préinstallé.
- Une section dynamique sans contenu (témoignages, partenaires…) est **masquée pour les visiteurs**. Les éditeurs connectés voient à la place un message d'aide.
- Les textes provisoires sont signalés par un **encadré pointillé doré « Contenu provisoire »**. Les images provisoires portent la mention *Photographie officielle à intégrer*.
- **Photos** : toutes proviennent des publications LinkedIn officielles de la Fondation (photos et aperçus de vidéos). Le thème ne contient plus de photos de banque d'images. Ces versions sont en résolution réduite : remplacez-les par les originaux haute définition. Détails : `fondation-lona/CREDITS-PHOTOS.md`.
- Les chiffres officiels (102, 53, 80, 15) viennent des publications de la Fondation et sont cités avec leur source.

### La Présidente-fondatrice

La Fondation appartient à **Son Excellence Madame Denise Nyakeru Tshisekedi**, Première Dame de la RDC, qui l'a créée en mai 2019 sous le nom de Fondation Denise Nyakeru Tshisekedi (FDNT). Le site la présente à quatre endroits :
- une section « La Présidente-fondatrice » sur l'accueil ;
- une page dédiée `/a-propos/la-presidente/`, avec une frise chronologique et ses sources ;
- une fiche dans *Équipe* (groupe Gouvernance) ;
- un lien dans le menu « La Fondation ».

Sources utilisées : la fiche de l'OPDAD (oaflad.org), actualite.cd (14 août 2025), Wikipédia et les publications de la Fondation. **Faites valider ces textes par le cabinet de la Première Dame avant la mise en ligne.**

### Animations

- Apparitions en cascade au défilement.
- Titre du Hero mot par mot, filet doré qui se dessine.
- Légère profondeur (parallaxe) sur les grandes photos.
- En-tête qui se compacte, reflet sur les boutons dorés, élévation des cartes au survol.

Toutes ces animations sont désactivées automatiquement si l'utilisateur a activé « Réduire les animations » sur son appareil.

## 3. Administration au quotidien

| Je veux… | Où |
|---|---|
| Publier une actualité | *Articles › Ajouter* (image à la une, catégorie, extrait = chapô) |
| Modifier un programme | *Programmes* : contenu dans l'éditeur, puis boîte **Informations** (accroche, statut, lieu, objectifs, résultats, galerie, vidéo, partenaires, bouton) |
| Ajouter une réalisation | *Réalisations › Ajouter* (lieu, date, programme, résultats vérifiés, galerie) |
| Ajouter un partenaire | *Partenaires › Ajouter* (titre = nom, image principale = logo, lien, case « page d'accueil ») |
| Gérer témoignages / équipe | *Témoignages*, *Équipe* (ordre d'affichage via « Attributs › Ordre ») |
| Gérer les événements | *Événements* (la **date de début** est obligatoire) |
| Modifier statistiques, coordonnées, réseaux, don | *Fondation LONA › Réglages* |
| Consulter les formulaires reçus | *Fondation LONA › Demandes reçues*, avec un bouton **Exporter la newsletter (CSV)** |
| Modifier le menu (méga-menu) | *Apparence › Menus* : créez un menu et assignez-le à « Menu principal ». Niveau 1 = rubrique, niveau 2 = titre de colonne, niveau 3 = lien. Pour la petite description sous chaque lien, activez « Description » dans les *Options de l'écran*. Pour l'icône d'une rubrique, ajoutez la classe CSS `icon-star`, `icon-heart`, `icon-cap` ou `icon-news`. Sans menu assigné, une structure par défaut s'affiche. |
| Modifier la barre du haut (liens utilitaires) | *Apparence › Menus* : emplacement « Barre utilitaire » |
| Modifier pied de page, sections d'accueil | *Apparence › Éditeur* |
| Ajouter des photos à la galerie d'accueil | *Apparence › Éditeur › Accueil* : bloc Galerie (ouverture en grand déjà activée) |

## 4. Multilingue (FR / EN / LN)

Solution recommandée : **TranslatePress**, compatible avec Gutenberg et le FSE.

1. Installez TranslatePress, puis dans *Réglages › TranslatePress › Langues* : Français (par défaut), English, **Lingála**.
2. Choisissez des URL par sous-dossier (`/en/`, `/ln/`). TranslatePress génère automatiquement les balises **hreflang** et les plans de site par langue.
3. Le bloc **Sélecteur de langue**, déjà placé dans l'en-tête, affiche alors FR / EN / LN.
4. Traduisez avec l'éditeur visuel de TranslatePress : pages, menus, contenus dynamiques et formulaires (tous les libellés sont traduisibles).

Le thème accepte aussi Polylang en solution de repli.

## 5. Sécurité, performance, SEO, accessibilité

- **Formulaires** :
  - nonce WordPress, champ piège anti-robots, délai minimal signé (HMAC) ;
  - 5 envois maximum par 15 minutes et par IP (l'IP est hachée) ;
  - nettoyage champ par champ et consentement RGPD obligatoire ;
  - stockage privé, consultable par les administrateurs seulement, notification par e-mail avec `Reply-To`.
- **Durcissement** (désactivable par filtre) :
  - version de WordPress masquée, XML-RPC désactivé ;
  - liste des utilisateurs de l'API REST fermée aux visiteurs, archives auteurs désactivées ;
  - en-têtes HTTP de sécurité, éditeur de fichiers désactivé.
- **Vie privée** :
  - aucune ressource Google n'est chargée ;
  - les vidéos YouTube passent en mode `nocookie` et ne se chargent qu'après consentement ;
  - bandeau cookies léger, avec un lien « Gérer les cookies » dans le pied de page.
- **Performance** :
  - environ 3 Ko de JavaScript côté visiteur, sans jQuery ;
  - pas de constructeur de pages, chargement différé des images ;
  - polices auto-hébergées si présentes (voir ci-dessous).
- **SEO** :
  - meta description, Open Graph, Twitter, et les schémas schema.org NGO (Organization), Article et Event ;
  - fil d'Ariane BreadcrumbList, plan de site natif `/wp-sitemap.xml` ;
  - `noindex` sur les pages de recherche et 404.

  Ces fonctions se désactivent automatiquement si Yoast, Rank Math, SEOPress ou AIOSEO est actif.
- **Accessibilité** :
  - navigation au clavier, focus visible doré ;
  - menu mobile natif accessible, labels sur tous les champs ;
  - contrastes AA (l'« Or foncé » `#8A6A1F` est réservé au texte sur fond clair) ;
  - respect de `prefers-reduced-motion`.

### Polices

Le thème utilise Manrope (titres), Inter (texte) et Playfair Display (titres éditoriaux).

Pour les **auto-héberger**, déposez les fichiers suivants dans `fondation-lona/assets/fonts/` (licence OFL, à télécharger sur Google Fonts) ; elles sont alors chargées automatiquement :

- `manrope-variable.woff2`
- `inter-variable.woff2`
- `playfair-display-variable.woff2`
- `playfair-display-italic-variable.woff2`

Autre solution : *Apparence › Éditeur › Styles › Typographie › Gérer les polices*.

Sans ces fichiers, des polices système proches sont utilisées.

## 6. Mise en production

1. Préproduction : installez le thème sur une copie du site et lancez l'assistant.
2. Remplacez tous les encadrés **Contenu provisoire** par les contenus officiels, et les photos LinkedIn par leurs originaux haute définition.
3. Complétez les **mentions légales** et la **politique de confidentialité** (durée de conservation des données).
4. Installez une extension d'envoi d'e-mails SMTP (WP Mail SMTP, par exemple) pour fiabiliser les notifications des formulaires.
5. Activez un cache de pages (LiteSpeed Cache, WP Super Cache ou celui de l'hébergeur), avec une **durée de cache inférieure à 12 h** pour que les jetons de sécurité des formulaires restent valides. Activez aussi la conversion WebP/AVIF des images.
6. Vérifiez le HTTPS, l'envoi d'un formulaire de test et la réception de l'e-mail.
7. Configurez TranslatePress (section 4).

## 7. Évolutions prévues

- **Modules** : chaque fonctionnalité est un fichier de `inc/`, chargé via le filtre `lona_modules`. Un futur **espace partenaire ou membre** s'ajoute comme un nouveau module (rôle, pages protégées, contenus réservés) sans reconstruire le thème.
- **Points d'extension** :
  - `lona_loaded`, `lona_form_submitted` (brancher un CRM ou MailPoet) ;
  - `lona_schema_graph`, `lona_form_rate_limit`, `lona_disable_xmlrpc`, `lona_embed_consent`.

## 8. Arborescence

```
fondation-lona/
├── style.css · functions.php · theme.json · index.php · screenshot.png
├── templates/   16 modèles (accueil, pages, articles, archives, CPT, recherche, 404)
├── parts/       header · footer · page-header
├── patterns/    25 compositions (accueil + pages internes)
├── blocks/      16 blocs dynamiques (block.json + render.php, sans étape de build)
├── inc/         setup · enqueue · custom-post-types · custom-taxonomies · meta-fields ·
│                settings · blocks · forms · seo · security · helpers · starter-content
└── assets/      css/ (main, admin) · js/ (front, blocks-editor, admin) · images/ · fonts/
```
