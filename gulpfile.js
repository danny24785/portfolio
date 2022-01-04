// node.js Packages / Dependencies
const gulp = require('gulp');
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const concat = require('gulp-concat');
const cleanCSS = require('gulp-clean-css');
const browserSync = require('browser-sync').create();
const autoprefixer = require('gulp-autoprefixer');

// Paths
var paths = {

    src: {
        js: 'src/js/*.js',
        scss: 'src/scss/**/*.scss'
    },
    dist: {
        css: 'assets/css',
        js: 'assets/js',
    }
}

var node_paths = ['node_modules/breakpoint-sass/stylesheets'];

// Watch (SASS, CSS, JS, and HTML) reload browser on change
var proxy_server = 'http://danny-halbesma.localtest.me/'


// Compile SCSS, minify and autoprefix CSS
gulp.task('sass', function () {
    return gulp.src(paths.src.scss)
        .pipe(sass(
            {
                outputStyle: 'expanded',
                includePaths: node_paths,
            }
        ).on('error', sass.logError))
        .pipe(autoprefixer(
            {
                "overrideBrowserslist": ["last 2 versions"]
            }
        ))
        .pipe(cleanCSS({ compatibility: 'ie8' }))
        .pipe(concat('portfolio.css'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest(paths.dist.css))
        .pipe(browserSync.stream());
});


// Minify + Combine JS
gulp.task('js', function () {
    return gulp.src(paths.src.js)
        .pipe(uglify())
        .pipe(concat('portfolio.min.js'))
        .pipe(gulp.dest(paths.dist.js))
        .pipe(browserSync.stream());
});


gulp.task('watch', function () {
    browserSync.init({
        proxy: proxy_server
    })

    gulp.watch(paths.src.scss, gulp.series('sass'));
    gulp.watch(paths.src.js, gulp.series('js'));
});


gulp.task('default', gulp.parallel('watch'));
