/* Required Sources
   ---------------------------------------------- */

var browserSync = require('browser-sync').create(),
	gulp = require('gulp'),
	autoprefixer = require('gulp-autoprefixer'),
	concat = require('gulp-concat'),
	cssnano = require('gulp-cssnano'),
	sass = require('gulp-sass'),
	uglify = require('gulp-uglify');

/* Variables
   ---------------------------------------------- */

var dev = 'dev/assets';
var dist = 'dist/assets';
var proxyURL = 'http://localhost/personal/base';

/* JavaScript
   ---------------------------------------------- */

var jsSources = [
	dev + '/js/script1.js',
	dev + '/js/script2.js'
];	

var vendorSources = [dev + '/js/vendor/*.js'];

gulp.task('js', function() {
	gulp.src(jsSources)
		.pipe(concat('main.js'))
		.pipe(gulp.dest(dev + '/js'))
		.pipe(uglify())
		.pipe(gulp.dest(dist + '/js'));
	gulp.src(vendorSources)
		.pipe(gulp.dest(dist + '/js/vendor'));
});

/* SASS
   ---------------------------------------------- */

var sassSources = [dev + '/scss/styles.scss'];

gulp.task('sass', function() {
	gulp.src(sassSources)
		.pipe(sass({
			outputStyle: 'expanded',
			indentType: 'tab',
			indentWidth : 1
		}).on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(gulp.dest(dev + '/css'));
});

/* CSS
   ---------------------------------------------- */

var cssSources = [
	dev + '/css/normalize.css',
	dev + '/css/styles.css'
];	

gulp.task('css', function() {
	gulp.src(cssSources)
		.pipe(cssnano())
		.pipe(gulp.dest(dist + '/css'))
		.pipe(browserSync.stream());
});

/* Static Files
   ---------------------------------------------- */

var staticSources = ['dev/*.html'];

gulp.task('static', function() {
	gulp.src(staticSources)
		.pipe(gulp.dest('dist'));
});

/* Watch All The Things
   ---------------------------------------------- */

gulp.task('watch', function() {
    browserSync.init({
        proxy: proxyURL,
        open: false
    })
	gulp.watch(jsSources, ['js']);
	gulp.watch(dev + '/scss/*.scss', ['sass']);
	gulp.watch(cssSources, ['css']);
	gulp.watch(staticSources, ['static']).on('change', browserSync.reload);
});

/* Default Gulp Task
   ---------------------------------------------- */

gulp.task('default', ['js', 'sass', 'css', 'static', 'watch']);