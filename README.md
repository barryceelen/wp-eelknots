# WordPress Eelknots

A variation on Marc Jaquith's excellent [WordPress Skeleton](https://github.com/markjaquith/WordPress-Skeleton).
Helpful to get a WordPress project bootstrapped quickly.

Usually I don't have the luxury of having git installed in the server.
I like to deploy stuff via the [dandelion](https://github.com/scttnlsn/dandelion) gem. An example dandelion.yml file is included.

## Folder structure

WordPress is installed in a subfolder and the theme, plugins, uploads and other data are kept in the `content` folder in the root directory. This allows you to easily update WordPress to a new version and keeps our theme and plugin files separate from WordPress core.


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

[WordPress Coding Standards](https://codex.wordpress.org/WordPress_Coding_Standards) compliance can be checked by using the [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) script and installing the WordPress Coding Standards [Ruleset](https://codex.wordpress.org/WordPress_Coding_Standards).

A `phpcs-ruleset.xml` file is included in the example plugin `mu-plugins/example` folder.   

Run `phpcs -ps . --report-file=phpcs.log --standard=phpcs.ruleset.xml --extensions=php,js` in the `mu-plugins/example` folder to check WPCS complaince on all of the plugin's PHP and JavaScript files. For reference, a `phpcs.log` error log file will be written to the plugin's folder.

A `grunt jshint` Grunt task is available to check against the WordPress JavaScript coding standards.


