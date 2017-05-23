var gulp         = require('gulp');
var minifyCss    = require('gulp-minify-css');
var sass         = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('scss', function(){
    return gulp.src('scss/main.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer('last 4 versions'))
        // .pipe(minifyCss())
        .pipe(gulp.dest('css'))
});

gulp.task('watcher',function(){
    gulp.watch('scss/*.scss',  ['scss']);
});

//____________________________
gulp.task('default', ['watcher', 'scss']);