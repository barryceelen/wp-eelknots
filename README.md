# WordPress Eelknots

A variation on Marc Jaquith's excellent [WordPress Skeleton](https://github.com/markjaquith/WordPress-Skeleton).
Helpful to get a WordPress project bootstrapped quickly.

## Folder structure

WordPress is installed in a subfolder and the theme, plugins, uploads and other data are kept in the `content` folder in the root directory. This allows you to easily update WordPress to a new version and keeps your theme and plugin files separate from WordPress core.


```
+-- content/
|   +-- mu-plugins/ (Contains an example plugin and theme)
|   +-- plugins/
|   +-- themes/ (Empty, an example theme is included in the example mu-plugin)
|   +-- uploads/ (Content is not tracked in the repository)
|   +-- ...
+-- wp/ (WordPress package)
+-- wp-config-local.php (MySQL server settings for the development site)
+-- wp-config-production.php (MySQL server settings for the production site)
+-- wp-config.php (General configuration settings)
+-- ...
```

## WordPress Coding Standards

The included example plugin tries to adhere to the [WordPress Coding Standards](https://codex.wordpress.org/WordPress_Coding_Standards). Compliance can be checked by using the [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) script and installing the WordPress Coding Standards [Ruleset](https://codex.wordpress.org/WordPress_Coding_Standards).

A `phpcs.ruleset.xml` file is included in the example plugin `mu-plugins/example` folder.

Run `phpcs --standard=phpcs.ruleset.xml --report-file=phpcs.log` in the `mu-plugins/example` folder to check WPCS complaince on all of the plugin's PHP and CSS files. For reference, a `phpcs.log` error log file will be written to the plugin's folder.

A `grunt jshint` Grunt task is available to check against the WordPress JavaScript coding standards.

## Theme in a plugin?

WordPress allows you to specify additional theme folders. This feature is used by the example plugin to include the theme inside the plugin folder. Usually my WordPress project code mainly consists of a theme and a site-specific plugin. I find including the theme in the plugin keeps the project code nicely bundled together.

## Deployment

Usually I don't have the luxury of having git installed on the remote server.
I like to deploy stuff via the [dandelion](https://github.com/scttnlsn/dandelion) gem. An example dandelion.yml file is included.
