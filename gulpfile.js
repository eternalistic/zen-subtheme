/**
*
* The packages we are using.
* Not using gulp-load-plugins as it is nice to see whats here.
*
**/
var gulp         = require('gulp');
var sass         = require('gulp-sass');
var sassGlob     = require('gulp-sass-glob');
var autoprefixer = require('gulp-autoprefixer');
var plumber      = require('gulp-plumber');
var browserSync  = require('browser-sync');
var livereload   = require('gulp-livereload');
var imagemin     = require('gulp-imagemin');
var pngquant     = require('imagemin-pngquant');

// Path.
path             = require('path');

/**
*
* Styles.
* - Compile.
* - Autoprefixer.
* - Catch errors (gulp-plumber).
*
**/
gulp.task('sass', function() {
  gulp.src('sass/**/*.{scss,sass}')
  .pipe(sassGlob())
  .pipe(sass({
    outputStyle: 'expanded',
    includePaths: [
      path.join(__dirname, 'bower_components/support-for/sass')
    ]
  }))
  .pipe(autoprefixer({
    browsers: ['last 2 versions'],
    cascade: false
  }))
  .pipe(plumber())
  .pipe(gulp.dest('css'))
  // .pipe(browserSync.stream())
  .pipe(livereload())
});

/**
*
* BrowserSync.io
* - Watch CSS and JS for changes
* - View project at: localhost:3000
*
**/
//gulp.task('browser-sync', ['sass'], function() {
//  browserSync.init({
//    proxy: 'd67-p53-prod-ol.local'
//  });
//  gulp.watch('./sass/**/*.{scss,sass}', ['sass'])
//  gulp.watch('js/**/*.js');
// });

/**
*
* Images
* - Compress them!
*
**/
gulp.task('images', function () {
  return gulp.src('images/*')
  .pipe(imagemin({
    progressive: true,
    svgoPlugins: [{removeViewBox: true}],
    use: [pngquant()]
  }))
  .pipe(gulp.dest('images'));
});

/**
*
* Default task.
* - Runs Sass, scripts, and images.
* - Prepares all files for deployment.
*
**/
gulp.task('default', ['sass', 'images']);


/**
*
* Watch task.
* - Runs Sass and scripts.
* - Watchs for file changes for sass and scripts.
* - Refreshes browser after files have been compiled.
*
**/
gulp.task(
  'watch', [
    'sass'
  ],
  function () {
    gulp.watch('./sass/**/*.{scss,sass}', ['sass'])
    gulp.watch('js/**/*.js');
    livereload.listen();
  }
);
