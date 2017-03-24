var gulp = require('gulp');

//copy gentelella plugins to assets
gulp.task('copyFiles', function () {
    gulp.src('./vendor/bower_components/gentelella/vendors/**')
        .pipe(gulp.dest('./public/assets/gentelella/vendors'));
    gulp.src('./vendor/bower_components/gentelella/production/**')
        .pipe(gulp.dest('./public/assets/gentelella/production'));
});

//copy custom css&js to public directory, don't need to run
gulp.task('copyCustomSrcAndBuildFiles', function () {
   gulp.src('./vendor/bower_components/gentelella/build/**')
       .pipe(gulp.dest('./public/assets/gentelella/build'));
    gulp.src('./vendor/bower_components/gentelella/src/**')
        .pipe(gulp.dest('./public/assets/gentelella/src'));
});
