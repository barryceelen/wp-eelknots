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
module.exports = function(grunt) {

	grunt.initConfig({
		themepath: 'content/mu-plugins/example-plugin/themes/example/',
		pluginpath: 'content/mu-plugins/example-plugin/',
		pkg: grunt.file.readJSON( 'package.json' ),
		autoprefixer: {
			/* Note: Update caniuse DB: npm update caniuse-db */
			options: {
				browsers: ['last 2 version', 'ie 9', 'BlackBerry 10', 'Android 4']
			},
			dist: {
				src: '<%= themepath %>style.css'
			}
		},
		concat: {
			options: {
				separator: ';'
			},
			dev: {
				files: {
					'<%= themepath %>js/public.js' : [
						'<%= themepath %>js/_*.js'
					]
				}
			},
			dist: {
				files: {
					'<%= themepath %>js/public.js' : [
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
					cwd: '<%= themepath %>images/',
					src: ['**/*.{png,jpg,gif}'],
					dest: '<%= themepath %>images/'
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
		/*
		 * For future reference:
		 *
		 * modernizr: {
		 * 	dist: {
		 * 		'options': [
		 * 			'setClasses',
		 * 			'addTest'
		 * 		],
		 * 		'excludeTests': [
		 * 			'hidden'
		 * 		],
		 * 		devFile: false,
		 * 		dest: '<%= themepath %>js/vendor/modernizr-custom.js',
		 * 		files: {
		 * 			src: [
		 * 				'<%= themepath %>js/public.js',
		 * 				'<%= themepath %>style.css'
		 * 			]
		 * 		}
		 * 	}
		 * },
		 */
		sass: {
			dev: {
				options: {
					outputStyle: 'expanded'
				},
				files: {
					'<%= themepath %>style.css':'<%= themepath %>scss/style.scss',
					'<%= themepath %>editor-style.css':'<%= themepath %>scss/editor-style.scss'
				}
			},
			dist: {
				options: {
					outputStyle: 'compressed',
					sourcemap: 'none',
					noCache: true
				},
				files: {
					'<%= themepath %>style.css':'<%= themepath %>scss/style.scss',
					'<%= themepath %>editor-style.css':'<%= themepath %>scss/editor-style.scss'
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
					cwd: '<%= themepath %>images',
					src: ['**/*.svg'],
					dest: '<%= themepath %>images'
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
					'<%= themepath %>js/public.min.js' : '<%= themepath %>js/public.js'
				}
			}
		},
		watch: {
			options: {
				atBegin: true,
				livereload: true
			},
			sass: {
				files: ['<%= themepath %>scss/*.scss'],
				tasks: ['sass:dev','autoprefixer:dist'],
				options: {
					spawn: false
				}
			},
			jshint: {
				files: [
					'**/*.js',
					'!node_modules/**',
				],
				tasks: ['jshint'],
				options: {
					spawn: false
				}
			},
			scripts: {
				files: ['<%= themepath %>js/_*.js'],
				tasks: ['concat'],
				options: {
					spawn: false
				}
			}
		}
	});

	/* For future reference: grunt.loadNpmTasks('grunt-modernizr'); */
	grunt.loadNpmTasks( 'grunt-autoprefixer' );
	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.loadNpmTasks( 'grunt-contrib-imagemin' );
	grunt.loadNpmTasks( 'grunt-contrib-jshint' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );

	grunt.loadNpmTasks('grunt-chokidar');
	grunt.registerTask('watch', ['chokidar']);

	grunt.loadNpmTasks( 'grunt-notify' );
	grunt.loadNpmTasks( 'grunt-sass' );
	grunt.loadNpmTasks( 'grunt-svgmin' );

	grunt.registerTask('default',['sass:dist','autoprefixer','concat:dist','uglify:dist']);
	grunt.registerTask('dist',['sass:dist','autoprefixer','jshint','concat:dist','uglify:dist','imagemin','svgmin']);
};
