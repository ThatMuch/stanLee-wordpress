# CHANGELOG

## HEAD | 2.0.2
* bugfixes
* documentation updates
* add global scope vars to `functions.js`
* remove `modernizr.js` from root

## 2.0.0 BETA | RC 2 | 13.08.2018
* GENERAL
  * update documentation
  * cleanup/rebuild comments
  * update to jquery 3
  * add typekit enqueue preset
  * enable self-referring canonical
  * host fonts locally (#GDPR)
  * change default nav to WPmenu
  * small bugfixes
* FUNCTIONS/TEMPLATES
  * rename elements (ACF Flexible Elements) to blocks (=> Stanlee_blocks)
  * revise all functions and presets
  * remove custom maintenance function, (Customizable Maintenance-Template will be available within an upcoming major release)
  * hide `.teaser` if there's no post-thumbnail
  * add function for smooth anchor scrolling
  * update dev functions (slugify, add https to `$url` and urlcontains)
* HTML/CSS STRUCTURE
  * check nav/top and footer structure and add $element_width/maxwidth => `#nav_main` is now `#menu_main`
  * restructure basic template-structure (`main` > `section` > `div/article`)
  * add responsive logo and css-presets for switching it on breakpoints
  * add preset-variabales for `.top` and `.element`
  * change background-images to img with object fit
  * improve color names
  * add mobile body-font size
  * change default font to asap
  * add new default colors/logo
  * remove top-shadow
  * create custom css-class for anchors
  * add anchor with custom #ID to elements
  * cleanup elements
  * cleanup css
* WORKFLOW
  * add object-fit preset for modernizr
  * cleanup gulpfile, add variables to watch-task


## 1.3.0 | 05.03.2018 | «Vendorizr»
* add `gulp-vendors.json` for compiling/bundling of vendor-requirements
* add configuration variables for assets and vendor paths
* add [modernizr](https://www.npmjs.com/package/modernizr) to the workflow

## 1.2.0 | 18.02.2018 | «Busted»
* add cache-busting
* update/debug gulpfile
* re-organize build-process
  * rename main.js to functions.js
  * rename main.scss to bundler.scss
  * remove vendor-dependencies from `functions-wppsetup.php` and `bundler.scss`
  * add all vendor-dependencies to the gulpfile to have them organized in one place
  * remove bower, use npm for frontend-modules/vendors
* add unification to function-names cleanup functions
* fix minor bugs and cleanup code
* rearrange defaults in vars.scss
* remove editor-hiding in elements-template (we can hide it within ACF now)

## 1.1.0 | 03.11.2017 | «Preset»
* restructure vars
  * add theme-wide defaults
  * add/edit/delete presets
* cleanup general.scss
* fix fullwidth elements using `vw`
* add sanitizing to button element
* hide editor on elements-template

## 1.0.0 | 14.08.2017 | «Fully-Grown»
* pre-install animate.css and wow.js
* add debug to dump'n die function
* add hierarchy to css-variables
* udpate npm-packages (please update gulp and node + rebuild packages)
* remove german localization, add english menu names
* add function to add the subfield title to ACF Flexible Element Bars
* switch to MIT Public License, add note to Readme
* add slugify function
* update csscomb config
* remove global css timing-function
* fix dist-path to default logo

## 0.14.0 | 24.01.2017 | «Independent»
* add custom gulpfile/package for an independent gulp-workflow (not using sage workflow anymore)
* make sure jQuery is loaded via https
* cleanup variables and html5 tags
* update Readme

## 0.13.0 | 28.07.2016 | «Scale»
* rework scaling functionality
* bugfix enqueue jQuery from Google CDN
* bugfix remove hardcoded scripts from footer
* bugfix (typo) in backend function `onlyadmin_update`

## 0.12.0 | 12.07.2017 | «Heads up»
* enqueue scripts, styles, fonts
* add wp_head
* add wp_head cleaner
* add function to hide core updates for non-admins
* cleanups
* update bower dependencies
* add php-tags for wp-cli compatibility
* reorganize/cleanup functions
* cleanup/flex navigation
* adjustments for w3c compatibility
* use page as index
* add logo

## 0.11.0 | 05.07.2016 | «CleanFlex»
* huge cleanup/simplification of css and templates
* use flexbox as template default
* simplify sticky footer
* re-organize javascript files/add essentials.js
* bugfix mobilemenu

## 0.10.0 | 04.07.2016
* disable admin bar in wp-setup function
* add open graph image tags
* add styling for external links
* add template/functions for acf flexible content
* bugfixes
* cleanup
  * remove subnav preset
  * remove forward-to-child template
  * remove contact template
  * re-organize/cleanup assets folder

## 0.9.0 | 27.06.2016
* add onepage template
* remove short open tags on functions files to satisfy wpcli
* fix title, close functions
* cleanups, file re-organizations

## 0.8.0 | 10.06.2016
* update/clean node_modules (update gulp-if version, remove deprecated minify-css, add cssnano)
* preset image processing quality to 100%
* seperate google maps javascript/jQuery from other javascript/jQuery
* switch from wp_nav_menu to wp_list_pages
* coding guideline update: csscomb, convert tabs to spaces (based on codeguide.co)
* add the most important attributes to hamburger at nav.scss
* added marker.click preset to googlemaps template
* renaming versioning to Stanlee
* cleanup

## 0.7.0 | 18.05.2016 | Stanlee
* **renamed to Stanlee**
* admin bar is now only shown on hover
* added font-size variable for default font-size on all elements
* added basic table styling and sanitizing
* changed versioning of main.js to full-file-version instead of seperate versions per function

## 0.6.0 | 27.04.2016
* added animated hamburger icons to mobile nav (thanks to https://jonsuh.com/hamburgers/)
* re-added responsive css classes `.desktop` and `.mobile`
* added general variables and presets (isTouch / $vpWidth) to main.js
* fixed bower-config & moved normalize into bower
* added pointer-event attributes to predefined hidden/shown classes
* added variables to functions
* renamed some variables
* unified file-versions (1.02.15 => 1.2.15)
* fixed tab indents
* cleanup & documentation

## 0.5.0 | 25.02.2016 | public beta
* added custom styles dropdown for tinymce
* added `current-page-ancestor` to active class in nav css
* added subnav structure template
* simplified navigation to use the the same <nav> for desktop & mobile
* removed `scrolling mobile nav`
* removed `IEHACK` - could add [dino](https://github.com/CLUS-Werbeagentur/dino) in the future
* condition for google maps API
* bugfixes

## 0.4.0 | 23.02.2016
* moved paragraph default-styling from vars.scss to content.scss
* added forward template
* multiple cleanups/re-structuring
* reworked version numbers from now on: [main].[sub].[fix/cleanup/minimal-change] => 0.5.2, 0.14.3, 1.25.19

## 0.32 | 21.01.2016
* added first version of README.md
* reworked responsive mixins
* cleanup & update composer
* update gulpfile
* added iehack

## 0.31 | 21.1.2016
* added flexbox fillup function `flexfill()`

## 0.3 | 05.11.2015
* re-organized theme enviroment (based on sage workflow)
    * new folder structure
    * splitting files into assets (dev) and dist (output)
    * new gulpfile
    * bower
    * wiredep
    * asset-builder
* reworked responsive functionality
* added new plugins
* added theme language support
* cleaned up stuff

### 0.21 | 23.10.2015
* added home template
* changed admin bar handling to plugin "Better Admin Bar"
* added the_post_thumbnail_url function
* several bug fixes (mobilemenu and others)

### 0.2 | 22.10.2015
* added demo functionality
* added footer
* added template "team"
* added additional styling-presets
* deleted template "subcontent" (because new template "team")
* renamed template "googlemaps" to contact
* adjusted csscomb

### 0.18 | 22.10.2015
* added blog/post functionality

### 0.17 | 21.09.2015
* updated comment-structure
* cleanups

### 0.16 | 21.09.2015
* added css variable $fs_text for text-size

### 0.15 | 21.09.2015
* re-organized functions

### 0.14 | 18.09.2015
* added urlcontains function
* re-organized general functions

### 0.13 | 14.09.2015
* added google map API config
* added googlemap templae

### 0.12  | 11.09.2015
* added mobile navigation
* re-worked responsive mixins
* added function to disable html-hardcoded thumbnail-dimensions on images
* multiple cleanups

### 0.11
* multiple cleanups
