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

var proxyURL = 'http://localhost/personal/codes';

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

var jsSources = [devJS + '/*.js'];

gulp.task('js', function() {
	gulp.src(jsSources)
		.pipe(gulp.dest(distJS));
});

/* SASS
   ---------------------------------------------- */

var sassSources = [devSass + '/*.scss'];

gulp.task('sass', function() {
	gulp.src(sassSources)
		.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
		.pipe(autoprefixer({
            browsers: ['last 2 versions', 'Explorer >= 10', 'Android >= 4.1', 'Safari >= 7', 'iOS >= 7']
        }))
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

var staticSources = [
	dev + '/**/*.html',
	dev + '/**/*.php'
];

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
	gulp.watch(staticSources, ['static']).on('change', browserSync.reload);
});

/* Default Gulp Task
   ---------------------------------------------- */

gulp.task('default', ['js', 'sass', 'css', 'static', 'watch']);
