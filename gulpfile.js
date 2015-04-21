var gulp = require('gulp'),
    watch = require('gulp-watch');
//JS
var js = ['js/uikit.js', 'js/components/form-select.js', 'js/site.js'],
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify');

//SCSS
var autoprefixer = require('gulp-autoprefixer'),
    scss = require('gulp-sass');

//SVG
var rename = require('gulp-rename'),
    cheerio = require('gulp-cheerio'),
    svgstore = require('gulp-svgstore'),
    svgmin = require('gulp-svgmin');

//IMG

var imagemin = require('gulp-imagemin'),
    cache = require('gulp-cache'),
    pngquant = require('imagemin-pngquant');



//JS
gulp.task('concat', function() {
  return gulp.src(js)
    .pipe(concat('main.js'))
    .pipe(gulp.dest('js/build/'));
});

gulp.task('compress', function() {
  return gulp.src('js/build/main.js')
    .pipe(uglify())
    .pipe(rename('main.min.js'))
    .pipe(gulp.dest('js/build/'));
});

//SCSS


gulp.task('scssExpanded', function () {
    return gulp.src('scss/style.scss')
        .pipe(scss({ outputStyle: 'expanded',sourceComments: 'normal' }))
        .pipe(autoprefixer('last 2 version', 'ie 9'))
        .pipe(gulp.dest('css/'));
});

gulp.task('scssCompressed', function () {
    return gulp.src('scss/style.scss')
        .pipe(scss({ outputStyle: 'compressed' }))
        .pipe(autoprefixer('last 2 version', 'ie 9'))
        .pipe(gulp.dest('css/'));
});


//SVG 
gulp.task('svgmin', function () {
    return gulp
        .src('images/icons/*.svg')
        .pipe(svgmin())
        .pipe(gulp.dest('images/iconsmin'));
});

gulp.task('svgstore', function () {
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

gulp.task('imagemin', function() {
  return gulp.src('images/**/*')
    .pipe(cache(imagemin({ 
        optimizationLevel: 5, 
        progressive: true, 
        interlaced: true,
        svgoPlugins: [{removeViewBox: false}],
        use: [pngquant()]
    })))
    .pipe(gulp.dest('images'));
});

gulp.task('watchdev', function() {
   // Watch .js files
  gulp.watch(js, ['concat']);
   // Watch .scss files
  gulp.watch('scss/**/*.scss', ['scssExpanded']);
   // Watch image files
  gulp.watch('images/**/*', ['imagemin']);
});

gulp.task('watchprod', function() {
   // Watch .js files
  gulp.watch(js, ['concat']);
   // Watch .scss files
  gulp.watch('scss/**/*.scss', ['scssCompressed']);
   // Watch image files
  gulp.watch('images/**/*', ['imagemin']);
});
gulp.task('dev', ['concat', 'scssExpanded', 'watchdev']);
gulp.task('prod', ['concat', 'compress', 'scssCompressed', 'imagemin', 'watchprod']);
gulp.task('svg', ['svgmin', 'svgstore']);
