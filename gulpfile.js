// node.js Packages / Dependencies
const gulp = require('gulp');
const { sass } = require('@mr-hope/gulp-sass');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const browserSync = require('browser-sync').create();
const autoprefixer = require('gulp-autoprefixer');
const include = require('gulp-include')
const minify = require('gulp-minify');
const cleanCSS = require('gulp-clean-css');

const project = 'portfolio'

// Paths
var paths = {

    src: {
        scss: 'src/scss/**/*.scss',
        jscombine: 'src/js-combine/**/*.js',
        js: 'src/js/**/*.js'
    },
    dist: {
        css: 'assets/css',
        js: 'assets/js',
        jscombine: 'assets/js',
    }
}

var node_paths = ['node_modules/breakpoint-sass/stylesheets'];

// Watch (SASS, CSS, JS, and HTML) reload browser on change
var proxy_server = 'http://danny-halbesma.localtest.me';


// Compile SCSS, minify and autoprefix CSS
gulp.task('sass', function () {
    const postcss = require('gulp-postcss')
    const precss = require('precss')

    return gulp.src(paths.src.scss)
        .pipe(sass({includePaths: node_paths}).on('error', sass.logError))
        .pipe(postcss([require('precss'), require('postcss-combine-media-query'), require('autoprefixer')]))
        .pipe(cleanCSS({ compatibility: 'ie8' }))
        .pipe(concat(project + '.css'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest(paths.dist.css))
        .pipe(browserSync.stream());
});


// Combine JS
gulp.task('jscombine', function () {
    return gulp.src(paths.src.jscombine)
        .pipe(include()).on('error', console.log)
        .pipe(concat('combined.js'))
        .pipe(rename(project + '.js'))
        .pipe(minify({
            ext: {
                min: '.min.js'
            },
            noSource: true
        }))
        .pipe(gulp.dest(paths.dist.jscombine))
        .pipe(browserSync.stream());
});

// Normal JS
gulp.task('js', function () {
    return gulp.src(paths.src.js)
        .pipe(include()).on('error', console.log)
        .pipe(minify({
            ext: {
                min: '.min.js'
            },
            noSource: true
        }))
        .pipe(gulp.dest(paths.dist.js))
        .pipe(browserSync.stream());
});


gulp.task('watch', function () {
    browserSync.init({
        proxy: proxy_server
    })
    gulp.watch(paths.src.scss, gulp.series('sass'));
    gulp.watch(paths.src.js, gulp.series('js'));
    gulp.watch(paths.src.jscombine, gulp.series('jscombine'));

});




gulp.task('default', gulp.parallel('watch'));