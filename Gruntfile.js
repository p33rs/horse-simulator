module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            options: {
                separator: ';\n'
            },
            vendor: {
                src: [
                    'bower_components/jquery/dist/jquery.min.js',
                    'bower_components/underscore-amd/underscore-min.js',
                    'bower_components/backbone-amd/backbone-min.js',
                ],
                dest: 'public/js/vendor.js'
            },
            dist: {
                src: [
                    'js/src/namespace.js',
                    'js/src/model/*.js',
                    'js/src/collection/*.js',
                    'js/src/**/*.js'
                ],
                dest: 'public/js/horse.js'
            }
        },
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n',
                mangle: true
            },
            dist: {
                files: {
                    '<%= concat.dist.dest %>': ['<%= concat.dist.dest %>']
                }
            }
        },
        jst: {
            compile: {
                options: {
                    processName: function(filepath) {
                        return filepath.substr(13, filepath.length-17);
                    }
                },
                files: {
                    'public/js/templates.js': ['js/templates/**/*.tpl']
                }
            }
        },
        sass: {
            dist: {
                files: { 'public/css/style.css' : 'css/index.scss' }
            }
        },
        watch: {
            src: {
                files: [
                    '<%= concat.vendor.src %>',
                    '<%= concat.dist.src %>'
                ],
                tasks: ['concat', 'uglify']
            },
            tpl: {
                files: 'js/templates/**/*.tpl',
                tasks: 'jst'
            },
            sass: {
                files: 'css/**/*',
                tasks: 'sass'
            },
            gruntfile: {
                files: 'Gruntfile.js'
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-jst');

    grunt.registerTask('default', ['sass', 'concat', 'jst', 'uglify', 'watch']);

};