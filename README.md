<img src="/assets/images/stanlee_logo.png" width="480"/>

# :question: Stanlee c'est quoi ?

Vous voulez créer un thème Wordpress "from scratch" ? Mais pourquoi refaire les mêmes configurations à chaque nouveau thème quand vous pouvez automatiser cette première étape ? Gagnez du temps avec Stanlee, votre thème de démarrage généré avec Yeoman.

Avec son CSS minimal il est prêt à être personnalisé pour en faire votre tout nouveau thème.
Inspiré de Underscores et WP Seed, il est construit sur le framework Bootstrap 5. Il contient des sections à ajouter aux pages de votre site grâce au plugin ACF.

Stanlee est livré avec 90% de tout ce qu'il vous faut pour votre thème, ni plus, ni moins.

Voir la [demo](http://stanlee._a.fr/).

## :warning: Prérequis :

- Node >= 8.0 - [nodejs.org](https://nodejs.org/)
- npm >= 5.0 - [npm](https://www.npmjs.com/)

```bash
 npm install -g npm@latest
```

- gulp >= 4.0.2 - [gulp](https://gulpjs.com)

```bash
npm install -g gulp
```

- php >= 7.1 (S'assurer que [short_open_tag](http://php.net/manual/de/ini.core.php#ini.short-open-tag) est `true` dans votre VM/Webserver).

## :wrench: Installation avec Yeoman

Yeoman est un générateur de webapp. En quelques lignes de commandes votre thème Stan Lee est installé et paramétré !

#### Installer `yeoman`

```bash
npm install -g yo
```

#### Installer le générateur

```bash
npm install -g generator-stanlee
```

#### Installer le thème avec le générateur

Dans le dossier `themes` de wordpress, créez votre dossier `mon-theme` et entrez dedans :

```bash
mkdir mon-theme && cd $_
```

Lancer l'installation du thème:

```bash
yo stanlee
```

:tada: Vous n'avez plus qu'à suivre les instructions pour entrer vos configurations. :tada:

## :blue_book: Workflow

#### Gulp

Stanlee utilise [WP Gulp](https://github.com/ahmadawais/WPGulp#-step-1--download-the-required-files).
##### Commandes
```shell
# Commencer votre projet
npm start

# Arrêter le projet CTRL (⌃) + C

# Optimizer les images.
npm run images

# G"énérer les fichiers de traduction WP POT.
npm run translate

# Générer les feuilles de style et Sourcemap.
npm run styles-rtl

# Générer le zip du thème.
npm run zip
```


## HTML Structure

```html
<nav>La navigation principale</nav>
<header>
  Le header de la page qui contient le titre de la page et/ou l'image
</header>
<main>
  Contient tout sauf le header, le footer et la sidebar
  <section>
    Sert de container et/ou de fullwidth-background
    <article>
      Contient le contenu quand l'tuilisation du tag article est semantiquement
      correcte.
    </article>
    <div class="element">
      Contient le contenu quand l'utilisation du tag article n'est pas correct
    </div>
  </section>
</main>
<sidebar> Contient les widgets de la page </sidebar>
<footer>
  Le footer de la page, peut contenir des liens en plus et des informations
  comme l'adresse ou le logo
</footer>
```

## C'est parti !

Première choses à faire quand on crée un nouveau site avec Stanlee:
- mettre à jour les variables du fichier `./wpgulp.config.js`
- ouvrir `./functions/functions-setup.php` et ajouter ses propres settings
- vérifier les autres fichiers dans `./functions` pour s'assurer que tout vous convient
- ouvrir `./assets/styles/vars.scss` et ajouter vos tailles, breakpoints, couleurs ...
- ajouter vos templates comme `./templates`
- ajouter vos acf-sections dans `./functions-sections.php` et créer un template comme `./templates/section-masection`
- utiliser les fichiers SASS dans `./assets/styles` pour ajouter votre css

## Deploiement

- `gulp build` pour compiler et créer un fichier zip pour votre thème
- Note: le dossier `npm_modules` n'est pas nécessaire.

## Usage

### General

Tout les fichiers importants contiennent une description. Assurez vous de la lire dabord.

### Fichiers/Dossiers important

##### Functions

##

```
functions-sections.php      fonctions pour afficher les ACFs flexible blocks (appelé "sections" dans Stanlee)
functions-custom.php      espace pour vos propres fonctions (ex: shortcodes ...)
functions-dev.php         fonctions utiles au développement
functions-settings.php    paramètres du thème et fonctions générales qui ne nécessite pas beaucoup de modifications
functions-setup.php       point de départ pour paramètrer le nouveau thème, c'est là que les paramètres par défaut se trouvent.
```

##### CSS

```
assets/styles/_base.scss        style des éléments html
assets/styles/_essentials.scss  mixins, fonctions SASS et mixins pour le responsive
assets/styles/fonts.scss        fonts stoquées en local
assets/styles/_layout.scss      style des contenus
assets/styles/_module.scss
assets/styles/_nav.scss         navigation du site
assets/styles/state.scss
assets/styles/_vars.scss        gestion des tailles, toutes les couleurs, fonts et autres variables
assets/styles/styles.scss       récupère tous les fichiers .scss pour la compilation gulp
```

##### Javascript

```
assets/scrips/essentials.js   javascript/jQuery fonctions/variables réutilisables
assets/scrips/functions.js    javascript/jQuery
modernizr-config.json         Modernizr configuration, voir la section "Modernizr"
modernizr.js                  Modernizr modules, voir la section "Modernizr"
```

##### Templates

Les templates par défaut de Wordpress (page.php, single.php) reçoivent leur contenu depuis leur fichier associé dans le dossier template. Ainsi tous les templates sont groupés ensemble.

Tous les templates sont séparés en deux catégories reconnaissables par leur préfix:

- **`temp`**: templates du site.
- **`wp`**: templates par défaut de wordpress.

```
sections.php         charge les acf-sections (utilisant "Flexible Element" field-type) depuis `functions-sections.php`
section-***.php     charge vos acf-block personnalisés et affiche son contenu (voir l'exemple `section-text`)
temp-home.php           affiche le contenu par défaut et l'image mise en avant
temp-subsites.php       affiche le contenu par défaut et le contenu de chage page enfant
wp-home.php             WP blog par défaut
wp-page.php             WP page par défaut
wp-single.php           WP post par défaut
```

## À propos

Auteur: [THATMUCH](http://thatmuch.fr)
Contact: [social@thatmuch.fr](mailto:social@thatmuch.fr)
