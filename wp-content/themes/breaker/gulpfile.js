/**
 * Created by Bogdan on 22.03.2017.
 */
var gulp        = require('gulp');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;
var sass        = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

// browser-sync task for starting the server.
// gulp.task('browser-sync', function() {
//     //watch files
//     var files = [
//     './style.css',
//     './*.php'
//     ];

//     //initialize browsersync
//     browserSync.init(files, {
//     notify: false
//     });
gulp.task('browser-sync', function() { // Создаем таск browser-sync
    browserSync.init({
    proxy: "https://breaker"
    });
});

// Sass task, will run when any SCSS files change & BrowserSync
// will auto-update browsers
gulp.task('sass', function () {
    return gulp.src('sass/*.scss')
        .pipe(sass())
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true })) // Создаем пр
        .pipe(gulp.dest('./.'))
        .pipe(reload({stream:true}));
});

// Default task to be run with `gulp`
gulp.task('default', ['sass', 'browser-sync'], function () {
    gulp.watch("sass/**/*.scss", ['sass']);
});
