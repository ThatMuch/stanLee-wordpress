<img src="/assets/images/stanlee_logo.png" width="480"/>

# :question: Stanlee c'est quoi ?

...

## :warning: Prérequis :

- Node >= 8.0 - [nodejs.org](https://nodejs.org/)
- npm >=5.0 - [npm](https://www.npmjs.com/)

```bash
 npm install -g npm@latest
```

- gulp - [gulp](https://gulpjs.com)

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

Stanlee utilise npm pour gérer les modules de développement, les modules frontend et [gulp](https://gulpjs.com) pour compiler les assets depuis `assets` vers `dist`. Voir les détails dans `gulpfile.js`

##### Commandes gulp

- `gulp` : compile, optimise vos fichiers et lance browsersync.
- `gulp watch` : surveille les changements et compile si il y a une modification
- `gulp build` : copie tous les fichiers nécessaires pour votre thème dans le dossier `dist`. Compile le SCSS en CSS et mets à jour les fichiers de langue.

Plus d'informations sur gulp [gulpjs.com](https://gulpjs.com/)

## HTML Structure

```html
<nav> La navigation principale </nav>
<header>
    Le header de la page qui contient le titre de la page et/ou l'image
</header>
<main>
    Contient tout sauf le header, le footer et la sidebar
    <section>
    Sert de container et/ou de fullwidth-background
        <article>
        Contient le contenu quand l'tuilisation du tag article est semantiquement correcte.
        </article>
        <div class="element">
        Contient le contenu quand l'utilisation du tag article n'est pas correct
        </div>
    </section>
</main>
<sidebar>
    Contient les widgets de la page
</sidebar>
<footer>
    Le footer de la page, peut contenir des liens en plus et des informations comme l'adresse ou le logo
</footer>
```

## C'est parti !

Première choses à faire quand on crée un nouveau site avec Stanlee:

- ouvrir `functions/functions-setup.php` et ajouter ses propres settings
- vérifier les autres fichiers dans `/functions` pour s'assurer que tout vous convient
- ouvrir `assets/styles/vars.scss` et ajouter vos tailles, breakpoints, couleurs ...
- ajouter vos templates comme `templates/temp-montemplate.php`
- ajouter vos acf-blocks dans `functions-blocks.php` et créer un template comme `templates/temp-blocks-monblock`
- utiliser les fichiers SASS dans `assets/styles` pour ajouter votre css

Pour des informations plus détaillées se référer à "Fichiers/Dossiers important"

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
functions-blocks.php      fonctions pour afficher les ACFs flexible blocks (appelé "blocks" dans Stanlee)
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
temp-blocks.php         charge les acf-blocks (utilisant "Flexible Element" field-type) depuis `functions-blocks.php`
temp-blocks-***.php     charge vos acf-block personnalisés et affiche son contenu (voir l'exemple `temp-blocks-article`)
temp-home.php           affiche le contenu par défaut et l'image mise en avant
temp-subsites.php       affiche le contenu par défaut et le contenu de chage page enfant
wp-home.php             WP blog par défaut
wp-page.php             WP page par défaut
wp-single.php           WP post par défaut
```

### Responsive/Fluid

#### Taille

Par défaut, le layout s'adapte à la largeur de la fenêtre (viewport) puisque toutes les unités sont en `rem` et `html` utilise font-size comme unité de base.
La mise à l'échelle peut être configurée dans la section `SIZE/SCALING` dans `vars.scsss`. Vous pouvez aussi arrêter la mise à m'échelle sur certaines largeurs de fenêtre. Voir les instructions dans `vars.scsss`.

#### Mixins/Classes

**definie par des variables**

La largeur des deux variables disponibles `mobile` et `desktop` sont définies dans `vars.scss`.

- min 800px `@include desktop {...}`
- max 799px`@include mobile {...}`

**définie par la largeur en pixel**

- au moins 750px: `@include vpw_min(750px)`
- au maximum 500px: `@include vpw_max(500px)`
- entre 1000px et 1200px: `@include vpw(1000px, 1200px)`

**definie par ascepct-ratio**

- au moins 16:9: `@include asr_min(16,9) { ... }`
- au maximum 4:3: `@include asr_max(4,3) { ... }`

**definie par css-class**
Les deux variables disponibles `mobile` et `desktop` fonctionnent ainsi (avec les valeurs par défaut):

```SCSS
.desktop {
	// caché tant que < 800px;
}
.mobile {
	// caché tant que > 799;
}
```

## À propos

Auteur: ThatMuch
Contact: [contact@thatmuch.fr](mailto:contact@thatmuch.fr)
