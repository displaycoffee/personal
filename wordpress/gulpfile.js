/* Required Sources
   ---------------------------------------------- */

var browserSync = require('browser-sync').create(),
	gulp = require('gulp'),
	autoprefixer = require('gulp-autoprefixer'),
	concat = require('gulp-concat'),
	sass = require('gulp-sass'),
	uglify = require('gulp-uglify');

/* Global Variables
   ---------------------------------------------- */

var wpFolder = 'plugins';
var dirName = 'custom-stuff';
var proxyURL = 'http://localhost/personal/wordpress';

/* Development Variables
   ---------------------------------------------- */

var dev = 'dev/' + wpFolder + '/' + dirName;
var devJS = dev + '/assets/js';
var devSass = dev + '/assets/scss';

/* Distribution Variables
   ---------------------------------------------- */

var dist = 'wp-content/' + wpFolder + '/' + dirName;
var distJS = dist + '/assets/js';
var distCSS = dist + '/assets/css';

/* JavaScript
   ---------------------------------------------- */

var jsSources = [
	devJS + '/media-library.js',
	devJS + '/image-reset.js',
	devJS + '/run-functions.js'
];

gulp.task('js', function() {
	gulp.src(jsSources)
		.pipe(concat('functions.js'))
		.pipe(gulp.dest(devJS))
		.pipe(uglify())
		.pipe(gulp.dest(distJS));
});

/* SASS
   ---------------------------------------------- */

var sassSources = [devSass + '/styles.scss'];

gulp.task('sass', function() {
	gulp.src(sassSources)
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(gulp.dest(distCSS));
});

/* CSS
   ---------------------------------------------- */

var cssSources = [distCSS + '/**.css'];	

gulp.task('css', function() {
	gulp.src(cssSources)
		.pipe(browserSync.stream());
});

/* Static Files
   ---------------------------------------------- */

var staticSources = [dev + '/**/*.php'];

gulp.task('static', function() {
	gulp.src(staticSources)
		.pipe(gulp.dest(dist));
});

/* Watch All The Things
   ---------------------------------------------- */

gulp.task('watch', function() {
    browserSync.init({
        proxy: proxyURL,
        open: false
    })
	gulp.watch(jsSources, ['js']);
	gulp.watch(devSass + '/*.scss', ['sass']);
	gulp.watch(cssSources, ['css']);
	gulp.watch(staticSources, ['static']);
});

/* Default Gulp Task
   ---------------------------------------------- */

gulp.task('default', ['js', 'sass', 'css', 'static', 'watch']);