/**
 * Created by podisto on 16/04/2017.
 */
var gulp = require('gulp');
var sass = require('gulp-sass');

var config = {
    bootstrapDir: './bower_components/bootstrap-sass/assets',
    publicDir: './web/dist'
};

gulp.task('css', function () {
    return gulp.src('./web-src/sass/app.scss')
        .pipe(sass({
            includePaths: [config.bootstrapDir + '/stylesheets']
        }))
        .pipe(gulp.dest(config.publicDir + '/css'));
});

gulp.task('fonts', function () {
    return gulp.src(config.bootstrapDir + '/fonts/**/*')
        .pipe(gulp.dest(config.publicDir + '/fonts'));
});

gulp.task('default', ['css', 'fonts']);
