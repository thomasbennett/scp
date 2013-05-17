var $theme = 'scp',
    $theme_dir = 'wp-content/themes/'+$theme,
    $css_dir = $theme_dir + '/css/',
    $js_dir = $theme_dir + '/js/';

module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        copy: {
            main: {
                files: [
                    { expand: true, cwd: 'components/sass-bootstrap/', src: ['*.min.css'], dest: '<%= pkg.cssdir %>', filter: 'isFile' },
                    { expand: true, cwd: 'components/sass-bootstrap/js/', src: ['*.js'], dest: '<%= pkg.jsdir %>', filter: 'isFile' },
                ]
            }
        },

        concat: {
            options: {
                separator: ';'
            },
            js: {
                src: ['<%= pkg.jsdir %>/*.js'],
                dest: '<%= pkg.jsdir %>/<%= pkg.name %>.js'
            },
            css: {
                src: ['<%= pkg.cssdir %>/*.css'],
                dest: '<%= pkg.cssdir %>/<%= pkg.name %>.css',
            }
        },

        cssmin: {
            css: {
                src: '<%= concat.css.dest %>',
                dest: '<%= pkg.cssdir %>/<%= pkg.name %>.min.css',
            }
        },

        uglify: {
            options: {
                banner: '/* <%= pkg.name %>.js generated at <%= grunt.template.today("dd-mm-yyyy") %> */\n'
            },
            dist: {
                files: {
                    '<%= pkg.jsdir %>/<%= pkg.name %>.min.js': ['<%= concat.js.dest %>'],
                }
            }
        },

        /*
        jshint: {
            files: ['gruntfile.js', '<%= pkg.jsdir %>/*.js'],
        },
        */

        watch: {
            options: {
                livereload: true,
            },
            css: {
                files: '<%= pkg.scssdir %>/*.scss',
                tasks: ['sass', 'compass'],
            },
            scripts: {
                files: '<%= pkg.jsdir %>/*.js'
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-css');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['copy', 'concat', 'cssmin', 'uglify']);
}
