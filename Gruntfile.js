/**
 * Grunt config
 *
 * @since 1.0.0
 *
 * See: http://24ways.org/2013/grunt-is-not-weird-and-hard/
 *
 * @package   Todo
 * @author    Todo
 * @license   GPL-3.0+
 * @link      Todo
 * @copyright Todo
 */

/* global module */
module.exports = function( grunt ) {

	const sass = require( 'sass' );

	grunt.initConfig({
		themepath: 'content/mu-plugins/example-plugin/themes/example/',
		pluginpath: 'content/mu-plugins/example-plugin/',
		pkg: grunt.file.readJSON( 'package.json' ),
		autoprefixer: {
			/* Note: Update caniuse DB: npm update caniuse-db */
			options: {
				browsers: ['last 2 version']
			},
			dist: {
				src: '<%= themepath %>/dist/css/style.css'
			}
		},
		concat: {
			options: {
				separator: ';'
			},
			dev: {
				files: {
					'<%= themepath %>dist/js/public.js' : [
						'<%= themepath %>js/_*.js'
					]
				}
			},
			dist: {
				files: {
					'<%= themepath %>dist/js/public.js' : [
						'<%= themepath %>js/_*.js'
					]
				}
			}
		},
		imagemin: {
			options: {
				cache: false
			},
			dynamic: {
				files: [{
					expand: true,
					cwd: '<%= themepath %>src/images/',
					src: ['**/*.{png,jpg,gif}'],
					dest: '<%= themepath %>dist/images/'
				}]
			}
		},
		jshint: {
			options: grunt.file.readJSON( '.jshintrc' ),
			theme: {
				src: ['<%= themepath %>js/_*.js']
			},
			plugin: {
				src: [
					'<%= pluginpath %>/*.js',
					'!<%= pluginpath %>/themes/**'
				]
			}
		},
		sass: {
			options: {
				implementation: sass,
			},
			dev: {
				options: {
					outputStyle: 'expanded'
				},
				files: {
					'<%= themepath %>/dist/css/style.css':'<%= themepath %>src/scss/style.scss',
					'<%= themepath %>/dist/css/editor-style.css':'<%= themepath %>src/scss/editor-style.scss'
				}
			},
			dist: {
				options: {
					outputStyle: 'compressed',
					sourcemap: 'none',
					noCache: true
				},
				files: {
					'<%= themepath %>dist/css/style.css':'<%= themepath %>src/scss/style.scss',
					'<%= themepath %>dist/css/editor-style.css':'<%= themepath %>src/scss/editor-style.scss'
				}
			}
		},
		svgmin: {
			dist: {
				options: {
					plugins: [
						/* Don't remove XML declaration (needed to avoid errors creating PNG on Win 7) */
						{ removeXMLProcInst: false }
					]
				},
				files: [{
					expand: true,
					cwd: '<%= themepath %>src/images',
					src: ['**/*.svg'],
					dest: '<%= themepath %>dist/images'
				}]
			}
		},
		uglify: {
			options: {
				mangle: false
			},
			dist: {
				options: {
					compress: {
						drop_console: true
					}
				},
				files: {
					'<%= themepath %>dist/js/public.min.js' : '<%= themepath %>dist/js/public.js'
				}
			}
		},
		watch: {
			options: {
				atBegin: true,
				livereload: true
			},
			sass: {
				files: ['<%= themepath %>src/scss/*.scss'],
				tasks: ['sass:dev','autoprefixer:dist'],
				options: {
					spawn: false
				}
			},
			jshint: {
				files: [
					'**/*.js',
					'!node_modules/**',
					'!dist/**',
				],
				tasks: ['jshint'],
				options: {
					spawn: false
				}
			},
			scripts: {
				files: ['<%= themepath %>src/js/_*.js'],
				tasks: ['concat'],
				options: {
					spawn: false
				}
			}
		}
	});

	grunt.loadNpmTasks( 'grunt-autoprefixer' );
	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.loadNpmTasks( 'grunt-contrib-imagemin' );
	grunt.loadNpmTasks( 'grunt-contrib-jshint' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );

	grunt.loadNpmTasks( 'grunt-chokidar' );
	grunt.registerTask( 'watch', ['chokidar'] );

	grunt.loadNpmTasks( 'grunt-notify' );
	grunt.loadNpmTasks( 'grunt-sass' );
	grunt.loadNpmTasks( 'grunt-svgmin' );

	grunt.registerTask(
		'default',
		[
			'sass:dist',
			'autoprefixer',
			'concat:dist',
			'uglify:dist'
		]
	);

	grunt.registerTask(
		'dist',
		[
			'sass:dist',
			'autoprefixer',
			'jshint',
			'concat:dist',
			'uglify:dist',
			'imagemin',
			'svgmin'
		]
	);
};
