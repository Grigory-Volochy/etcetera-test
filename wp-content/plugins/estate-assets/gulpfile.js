/**
 * Console commands:
 * $ gulp fb-js => compiles Filters Block .js files to destination bundle
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
/* ------------------------ FILTERS BLOCK JS ----------------------- */
/* ----------------------------------------------------------------- */
var jsSourceDir = './src/js/';
var jsOutputDir = './static/js/';
gulp.task('fb-js', function(){
    var deferred = Q.defer();
    log('building Filters Block JS');
    gulp.src([jsSourceDir + '*.js'])
        .pipe(debug({title: 'Filters Block JS:'}))
        .pipe(uglify())
        .pipe(concat('filters-block.min.js'))
        .pipe(gulp.dest(jsOutputDir))
        .on('finish', deferred.resolve);
    return deferred.promise;
});
/* ----------------------------------------------------------------- */
/* ----------------------------------------------------------------- */
