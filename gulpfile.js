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
    svgstore = require('gulp-svgstore'),
    svgmin = require('gulp-svgmin'),
    notification = require('node-notifier'),
    gutil = require('gulp-util');

//JS
var jsFiles = [
  'js/uikit.js', 
  'js/components/form-select.js',
  'js/components/parallax.js', 
  'js/videojs/video.js', 
  'js/fancybox.js', 
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

// SVG
gulp.task('svgsymbol', function () {

  var cssFilter = filter('**/*.css', { restore: true })
  var svgFilter = filter('**/*.svg', { restore: true })

  return gulp.src('images/icons/*.svg')
    .pipe( plumber() )
    .pipe( svgmin() )
    .pipe( require('through2').obj(function( file, enc, cb ) { // clean the mess up
      var fileString = file.contents.toString()

      _.each([
        /<title>.*<\/title>/gi,
        /<desc>.*<\/desc>/gi,
        /<!--.*-->/gi,
        /<defs>.*<\/defs>/gi,
        / +sketch:type=\"MSShapeGroup\"/gi,
        / +sketch:type=\"MSPage\"/gi,
        / +sketch:type=\"MSLayerGroup\"/gi
      ], function( regex ) {
        fileString = fileString.replace(regex, '')
      })

      file.contents = new Buffer( fileString )
      this.push( file )

      cb()
    }) )
    .pipe(
      require('gulp-svg-symbols')({
        id: 'ug-Svg--%f',
        className: '.ug-Svg--%f',
        fontSize: 20
      })
    )
    .pipe( cssFilter )
    .pipe( rename('_svg-symbols.scss') )
    .pipe( gulp.dest('scss/') ) // save css
    .pipe( cssFilter.restore )
    .pipe( svgFilter )
    .pipe( require('gulp-rename')('svg-symbols.svg') )
    .pipe( gulp.dest('parts/shared/') ) // save template

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
gulp.task('svg', ['svgsymbol']);
