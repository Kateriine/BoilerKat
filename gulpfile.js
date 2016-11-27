var gulp = require('gulp'),
    argv = require('yargs').argv,
    gulpif = require('gulp-if'),
    watch = require('gulp-watch'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    filter = require('gulp-filter'),
    _      = require('lodash'),
    plumber = require('gulp-plumber'),
    autoprefixer = require('gulp-autoprefixer'),
    scss = require('gulp-sass'),
    imagemin = require('gulp-imagemin'),
    cache = require('gulp-cache'),
    pngquant = require('imagemin-pngquant'),
    rename = require('gulp-rename'),
    cheerio = require('gulp-cheerio'),
    svgstore = require('gulp-svgstore'),
    svgmin = require('gulp-svgmin'),
    notification = require('node-notifier'),
    gutil = require('gulp-util'),
    through2 = require('through2'),
    svgSymbols = require('gulp-svg-symbols');

//JS
var jsFiles = [
  'js/core/core.js', 
  'js/core/touch.js',
  'js/core/utility.js',
  'js/core/smooth-scroll.js',
  'js/core/scrollspy.js', 
  'js/core/toggle.js',
  'js/core/alert.js', 
  'js/core/button.js', 
  'js/core/dropdown.js', 
  'js/core/grid.js', 
  'js/core/modal.js', 
  'js/core/nav.js', 
  'js/core/offcanvas.js', 
  'js/core/switcher.js',
  'js/core/tab.js',
  'js/core/cover.js', 
  'js/components/parallax.js', 
  'js/svgxuse.min.js',
  'js/videojs/video.js', 
  'js/fancybox.js', 
  'js/slick.js', 
  'js/site.js'
  ];

function handleError(err){
  // Notification
  var notifier = notification
  notifier.notify({ message: 'Error: ' + err.message });
  // Log to console

  gutil.log(gutil.colors.red('Error'), err.toString());
  this.emit('end')
}

// JavaScript Files concatenation
gulp.task('js', function() {

  return gulp.src(jsFiles)
    .pipe(concat('main.min.js'))
    .pipe(gulpif(argv.production, uglify()))
    .pipe(gulp.dest('js/build/'))
});


// Scss file compilation
gulp.task('scss', function () {

  return gulp.src('scss/style.scss')
    .pipe(scss({ outputStyle: 'expanded',sourceComments: 'normal' }))
    .on('error',handleError )
    .pipe(autoprefixer('last 2 version', 'ie 9'))
    .pipe(gulpif(argv.production, scss({ outputStyle: 'compressed' })))
    .pipe(gulp.dest('css/'))
});

// Images compression
gulp.task('imagemin', function() {

  return gulp.src('images/**/*')
    .pipe(cache(imagemin({
      optimizationLevel: 5,
      progressive: true,
      interlaced: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant()]
    })))
    .pipe(gulp.dest('images'))
});

//SVG 
gulp.task('svgmin', function () {
    return gulp
        .src('images/icons/*.svg')
        .pipe(svgmin())
        .pipe(gulp.dest('images/iconsmin'));
});

// SVG
gulp.task('svgSymbol', function () {
    return gulp
        .src('images/iconsmin/*.svg')
        .pipe(rename({prefix: 'chicon-'}))
        .pipe(svgstore({'inlineSvg':true}))
        .pipe(cheerio(function ($) {
                $('svg').attr({
                    'version': '1.1',
                    'xmlns:xlink': 'http://www.w3.org/1999/xlink',
                    'xml:space': 'preserve'
                });
                $('path').attr({
                    'fill': 'currentColor'
                });
                $('polygon').attr({
                    'fill': 'currentColor'
                });
                $('circle').attr({
                    'fill': 'currentColor'
                });
                $('rect').attr({
                    'fill': 'currentColor'
                });
        
        }))
        .pipe(rename('icons.svg'))
        .pipe(gulp.dest('images'));
});

// Watching assets
gulp.task('watch', function() {
  gulp.watch(jsFiles, ['js']);
  gulp.watch('scss/**/*.scss', ['scss']);
});



// Main tasks
//// `gulp` — For production just run `gulp --production`
gulp.task('default', ['js', 'scss', 'watch']);

// Optimize and compress images
gulp.task('img', ['imagemin']);

// Converts a bunch of SVG files to a single svg file containing each one as a symbol.
// See https://github.com/Hiswe/gulp-svg-symbols/
gulp.task('svg', ['svgmin', 'svgSymbol']);
