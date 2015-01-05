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
            },
            css: {
                src: 'css/**/*.css',
                dest: 'public/css/style.css'
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
        less: {
            development: {
                files: {
                    // "css/vendor/bootstrap.css": "bower_components/bootstrap/less/bootstrap.less"
                }
            }
        },
        watch: {
            files: ['<%= concat.vendor.src %>', '<%= concat.dist.src %>'],
            tasks: ['concat', 'jst', 'uglify']
        }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-jst');

    grunt.registerTask('default', ['less', 'concat', 'jst', 'uglify', 'watch']);

};