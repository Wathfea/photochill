// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

// Define default destination folder
var dest_js = 'public/js';
var dest_css = 'public/css';
var bower = 'bower_components';
var own_js = 'js';
var own_css = 'css';

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src([
            bower + '/jquery/dist/jquery.js',
            own_js + '/*.js',
            own_js + '/vendor/bootstrap.min.js',
            own_js + '/vendor/html5shiv.js',
            own_js + '/vendor/modernizr.min.js'
        ])
        .pipe(concat('all.js'))
        .pipe(gulp.dest('dist'))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(dest_js));
});

// Concatenate & Minify CSS
gulp.task('css', function() {
    return gulp.src([
            own_css + '/*.css'
        ])
        .pipe(concat('all.css'))
        .pipe(gulp.dest('dist'))
        .pipe(rename('all.min.css'))
        .pipe(gulp.dest(dest_css));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch(['js/*.js' , 'css/*.css'], ['scripts', 'css']);
});

// Default Task
gulp.task('default', ['scripts', 'css', 'watch']);