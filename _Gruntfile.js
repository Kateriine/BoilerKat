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
        files: ['js/**/*.js', '!js/build/main.min.js'],
        tasks: 'concat'
      },
      imagemin: {
        files: ['images/**/*.jpg', 'images/**/*.png'],
        tasks: 'imagemin'
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
        src: ['js/**/*.js', '!js/build/main.min.js'],
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

  // 5. Where we tell Grunt what to do when we type "grunt xxx" into the terminal.

  // Using the 'grunt dev' command will autoprefix, compile scss, concatenate and activate the watch task
  grunt.registerTask('dev', ['sass:dev', 'autoprefixer:dev', 'concat', 'watch']);
  // Using the 'grunt prod' command will autoprefix, compile scss and compress the outputted CSS, concatenate JS, compress it, and compress images
  grunt.registerTask('prod', ['sass:dist','concat', 'uglify', 'imagemin']);
};