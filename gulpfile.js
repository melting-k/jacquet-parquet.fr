import gulp from 'gulp';
import browserSync from 'browser-sync';
import uglify from 'gulp-uglify';
import cleanCSS from 'gulp-clean-css';
import imagemin from 'gulp-imagemin';
import replace from 'gulp-replace';
import gulpSass from 'gulp-sass'; // On garde cette importation
import * as sass from 'sass'; // On importe directement le compilateur "sass"
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'gulp-autoprefixer';
import rename from 'gulp-rename';
import gulpif from 'gulp-if';
import useref from 'gulp-useref';
import del from 'delete';
import fs from 'fs';
import plumber from 'gulp-plumber';

// Configuration de gulp-sass pour utiliser le package sass
const sassCompiler = gulpSass(sass);

// Variables et chemins
const appPath = './app/';
const prodPath = './prod/';
const sassPath = appPath + 'sass/';
const localhostPath = '/jacquet-parquet.fr/app/index.php';
const localhostProxy = 'localhost';

// Options SASS
const sassOptions = {
    outputStyle: 'expanded'
};
const autoprefixerOptions = {
    overrideBrowserslist: [
        "Android 2.3",
        "Android >= 4",
        "Chrome >= 20",
        "Firefox >= 24",
        "Explorer >= 8",
        "iOS >= 6",
        "Opera >= 12",
        "Safari >= 6"
    ]
};

// Tâches spécifiques pour le répertoire App
gulp.task('sass-app', function (done) {
    gulp
        .src(sassPath + 'app.scss')
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sassCompiler(sassOptions).on('error', sassCompiler.logError))
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(appPath + 'css'))
        .pipe(browserSync.stream());  // Pour injecter les styles sans recharger la page
    done();  // Signaler que la tâche est terminée
});

// Serveur et watchers
gulp.task('serve', gulp.series('sass-app', function (done) {
    const bs = browserSync.create();  // Utilisation de browserSync sans create()
        
    // Initialisation de BrowserSync avec proxy
    bs.init({
        proxy: localhostProxy,
        startPath: localhostPath,
        port: 3000
    });

    // Watch pour les fichiers .scss
    gulp.watch(appPath + 'sass/**/*.scss', gulp.series('sass-app')).on('change', function (event) {
        console.log(`Fichier SCSS modifié: ${event.path}`);
    });  

    // Watch pour les fichiers CSS (ceux-ci sont gérés par stream() donc pas de reload nécessaire)
    gulp.watch(appPath + 'css/**/*.css').on('change', bs.reload);  // Rechargement pour les fichiers CSS de l'app

    // Watch pour les fichiers JS (rechargement complet)
    gulp.watch(appPath + 'js/**/*.js').on('change', bs.reload);  // Rechargement pour les fichiers JS de l'app

    gulp.watch(appPath + "**/*.{html,php}").on('change', bs.reload);

    gulp.watch(appPath + "img/**/*").on('change', bs.reload);

    done();  // Signaler que la tâche est terminée
}));


// Build - App
gulp.task('build-app', function (done) {
    del([prodPath], function (err) {
        if (err) throw err;
        gulp
            .src([
                appPath + '**/*.*',
                appPath + '.htaccess',
                '!' + appPath + '**/*.{html,php}',
                '!' + appPath + 'img/**/*',
                '!' + appPath + 'css/**/*',
                '!' + appPath + 'js/**/*',
                '!' + appPath + 'sass/**/*',
                '!' + adminPath + '**/*'
            ])
            .pipe(gulp.dest(prodPath));

        fs.stat(appPath + 'img/**/*', function (err) {
            if (err != null) {
                gulp.src(appPath + 'img/**/*')
                    .pipe(gulp.dest(prodPath + 'img/'));
            }
        });

        gulp
            .src([
                appPath + '**/*.{html,php}',
                '!' + adminPath + '**/*'
            ])
            .pipe(useref({
                searchPath: [appPath, 'node_modules']
            }))
            .pipe(gulpif('*.js', uglify()))
            .pipe(gulpif('*.css', cleanCSS()))
            .pipe(gulp.dest(prodPath));

        done();  // Signaler que la tâche est terminée
    });
});

// Tâche de build pour les deux répertoires
gulp.task('build', gulp.series('build-app'));
