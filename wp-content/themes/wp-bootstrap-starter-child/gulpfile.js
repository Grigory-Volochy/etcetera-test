/**
 * Console commands:
 * $ gulp theme-css => compiles .less and css files to destination bundle
 * $ gulp theme-js => compiles .js files to destination bundle
 */


var Q = require('q'),
    gulp = require('gulp'),
    util = require('gulp-util'),
    concat = require('gulp-concat'),
    minifyCss = require('gulp-cssnano'),
    less = require('gulp-less'),
    sourcemaps = require('gulp-sourcemaps'),
    uglify = require('gulp-uglify'),
    debug = require('gulp-debug'),
    plumber = require('gulp-plumber'),
    notify = require('gulp-notify'),
    autoprefixer = require('gulp-autoprefixer');
var log = function (message) {
    util.log(util.colors.green(message));
};
var log_error = function (message) {
    util.log(util.colors.green(message));
};
var errorHandler = function (err) {
    notify.onError({
        title: "Gulp Error",
        message: "Error: <%= error.message %>",
        sound: "Bottle"
    })(err);
    this.emit('end');
}
var _gulpsrc = gulp.src;
gulp.src = function () {
    return _gulpsrc.apply(gulp, arguments)
        .pipe(plumber({
            errorHandler: errorHandler
        }));
};
function clean(target){
    var deferred = Q.defer();
    log('cleaning files: ' + target);

    gulp.src(target)
        .on('error', log)
        .on('finish', deferred.resolve);

    return deferred.promise;
}





/* ----------------------------------------------------------------- */
/* --------------------------- THEME CSS --------------------------- */
/* ----------------------------------------------------------------- */
var lessSourceDir = './src/less/';
var lessOutputDir = './static/css/';
gulp.task('theme-css', function () {
    var deferred = Q.defer();
    log('building Frontend CSS');
    gulp.src([lessSourceDir + '*.less'])
        .pipe(debug({title: 'FRONTEND APP LESS:'}))
        .pipe(sourcemaps.init().on('error', log))
        .pipe(less())
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 99 versions'],
            cascade: false
        }))
        .pipe(sourcemaps.write().on('error', log))
        .pipe(minifyCss({
            discardComments: {removeAll: true},
            discardEmpty: true,
            discardDuplicates: true,
            zindex: false
        }))
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 99 versions'],
            cascade: false
        }))
        .pipe(concat('theme.min.css'))
        .pipe(gulp.dest(lessOutputDir))
        .pipe(debug({title: 'Writing:'}))
        .on('finish', deferred.resolve)
        .on('error', errorHandler);
    return deferred.promise;
});
/* ----------------------------------------------------------------- */
/* ----------------------------------------------------------------- */





/* ----------------------------------------------------------------- */
/* ---------------------------- THEME JS --------------------------- */
/* ----------------------------------------------------------------- */
var jsSourceDir = './src/js/';
var jsOutputDir = './static/js/';
gulp.task('theme-js', function(){
    var deferred = Q.defer();
    log('building WPBS Child Theme JS');
    gulp.src([jsSourceDir + '*.js'])
        .pipe(debug({title: 'WPBS Child Theme JS:'}))
        .pipe(uglify())
        .pipe(concat('theme.min.js'))
        .pipe(gulp.dest(jsOutputDir))
        .on('finish', deferred.resolve);
    return deferred.promise;
});
/* ----------------------------------------------------------------- */
/* ----------------------------------------------------------------- */
