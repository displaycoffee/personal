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

var proxyURL = 'http://localhost/personal/base';

/* Development Variables
   ---------------------------------------------- */

var dev = 'dev';
var devJS = dev + '/assets/js';
var devSass = dev + '/assets/scss';

/* Distribution Variables
   ---------------------------------------------- */

var dist = 'dist';
var distJS = dist + '/assets/js';
var distCSS = dist + '/assets/css';

/* JavaScript
   ---------------------------------------------- */

var jsSources = [
	devJS + '/script1.js',
	devJS + '/script2.js'
];	

var vendorSources = [devJS + '/vendor/*.js'];

gulp.task('js', function() {
	gulp.src(jsSources)
		.pipe(concat('main.js'))
		.pipe(gulp.dest(devJS))
		.pipe(uglify())
		.pipe(gulp.dest(distJS));
	gulp.src(vendorSources)
		.pipe(gulp.dest(distJS + '/vendor'));
});

/* SASS
   ---------------------------------------------- */

var sassSources = [devSass + '/style.scss'];

gulp.task('sass', function() {
	gulp.src(sassSources)
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(gulp.dest(distCSS));
});

/* CSS
   ---------------------------------------------- */

var cssSources = [distCSS + '/*.css'];	

gulp.task('css', function() {
	gulp.src(cssSources)
		.pipe(browserSync.stream());
});

/* Static Files
   ---------------------------------------------- */

var staticSources = [dev + '/**/*.html'];

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
	gulp.watch(vendorSources, ['js']);
	gulp.watch(devSass + '/*.scss', ['sass']);
	gulp.watch(cssSources, ['css']);
	gulp.watch(staticSources, ['static']).on('change', browserSync.reload);
});

/* Default Gulp Task
   ---------------------------------------------- */

gulp.task('default', ['js', 'sass', 'css', 'static', 'watch']);