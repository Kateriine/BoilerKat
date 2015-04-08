module.exports = function(grunt) {

  // 1. All configuration goes here
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // 2. Our main watch task
    watch: {
      sass: {
        files: ['scss/**/*.scss'],
        tasks: ['sass:dev', 'autoprefixer:dev']
      },
      concat: {
        files: ['js/uikit.js', 'js/components/form-select.js', 'js/site.js'],
        tasks: 'concat'
      },
      imagemin: {
        files: ['images/**/*.jpg', 'images/**/*.png'],
        tasks: 'imagemin'
      }
    },

    svgstore: {
      options: {
        prefix : 'chicon-', // This will prefix each ID
        includedemo: true,
        svg: { // will be added as attributes to the resulting SVG
          //class : 'hide svg-icons'
          version : '1.1',
          xmlns : 'http://www.w3.org/2000/svg',
          'xmlns:xlink' : 'http://www.w3.org/1999/xlink',
          'xml:space' : 'preserve'
        }
      },
      default : {
        files: {
          'images/icons.svg': ['images/iconsmin/*.svg'],
        },
      }
    },
    svgmin: {
        options: {
            plugins: [
                {
                    removeViewBox: false
                }, {
                    removeUselessStrokeAndFill: false
                }
            ]
        },
        dist: {
            expand: true,
            cwd: 'images/icons',
            src: ['*.svg'],
            dest: 'images/iconsmin',
            ext: '.svg'
        }
    },
    // 3. Our multiple taks: scss, concat, autoprefixer, etc.
    sass: {
      dev: {
        options: {
          style: 'expanded',
          trace: true
        },
        files: {
        'css/style.css': 'scss/style.scss'
        }
      },
      dist: {
        options: {
          style: 'compressed'
        },
        files: {
          'css/style.css': 'scss/style.scss'
        }
      }
    },
    concat: {
      dev: {
        src: ['js/uikit.js', 'js/components/form-select.js', 'js/site.js'],
        dest: 'js/build/main.min.js'
      }
    },
    autoprefixer: {
      dev: {
        options: {
          browsers: ['last 2 version', 'ie 9']
        },
        files: {
          'css/style.css': 'css/style.css'
        }
      }
    },
    uglify: {
      options: {
        mangle: false
      },
      my_target: {
        files: {
        'js/build/main.min.js': 'js/build/main.min.js'
        }
      }
    },
    imagemin: {
      png: {
        options: {
          optimizationLevel: 7
        },
        files: [
          {
            expand: true,
            cwd: 'images/',
            src: ['*.png'],
            dest: 'images/compressed/',
            ext: '.png'
          }
        ]
      },
      jpg: {
        options: {
          progressive: true
        },
        files: [
          {
            expand: true,
            cwd: 'images/',
            src: ['*.jpg'],
            dest: 'images/compressed/',
            ext: '.jpg'
          }
        ]
      }
    }
  });

  // 4. Where we tell Grunt to load all the tasks.
  require('load-grunt-tasks')(grunt);

  grunt.registerTask('svg', ['svgmin:dist', 'svgstore:default']);

  // 5. Where we tell Grunt what to do when we type "grunt xxx" into the terminal.

  // Using the 'grunt dev' command will autoprefix, compile scss, concatenate and activate the watch task
  grunt.registerTask('dev', ['sass:dev', 'autoprefixer:dev', 'concat', 'watch']);
  // Using the 'grunt prod' command will autoprefix, compile scss and compress the outputted CSS, concatenate JS, compress it, and compress images
  grunt.registerTask('prod', ['sass:dist', 'autoprefixer:dev', 'concat', 'uglify', 'imagemin']);
};