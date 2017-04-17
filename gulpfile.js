/**
 * Created by podisto on 16/04/2017.
 */
var gulp = require('gulp');
var sass = require('gulp-sass');

var config = {
    bootstrapDir: './node_modules/bootstrap-sass/assets',
    publicDir: './web/dist'
};

gulp.task('css', function () {
    return gulp.src('./web-src/scss/main.scss')
        .pipe(sass({
            includePaths: [config.bootstrapDir + '/stylesheets']
        }))
        .pipe(gulp.dest(config.publicDir + '/css'));
});

gulp.task('js', function () {
    return gulp.src(['./bower_components/jquery/dist/jquery.js',
        config.bootstrapDir + '/javascripts/bootstrap.js'
    ])
        .pipe(gulp.dest(config.publicDir + '/js'));
});

gulp.task('fonts', function () {
    return gulp.src(config.bootstrapDir + '/fonts/**/*')
        .pipe(gulp.dest(config.publicDir + '/fonts'));
});

gulp.task('default', ['css', 'fonts', 'js']);
