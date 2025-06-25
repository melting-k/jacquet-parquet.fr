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
const adminPath = './app/back-office/';
const prodPath = './prod/';
const adminProdPath = './prod/back-office/';
const sassPath = appPath + 'sass/';
const adminSassPath = adminPath + 'sass/';
const uploadsPath = './uploads/';
const localhostPath = '/hippodrome-beaumont.fr/app/index.php';
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

// Tâches spécifiques pour le répertoire Admin
gulp.task('sass-admin', function (done) {
    gulp
        .src(adminSassPath + 'app.scss')
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sassCompiler(sassOptions).on('error', sassCompiler.logError))
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(adminPath + 'css'))
        .pipe(browserSync.stream());  // Pour injecter les styles sans recharger la page
    done();  // Signaler que la tâche est terminée
});

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
gulp.task('serve', gulp.series('sass-app', 'sass-admin', function (done) {
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
    gulp.watch(adminPath + 'sass/**/*.scss', gulp.series('sass-admin')).on('change', function (event) {
        console.log(`Fichier SCSS modifié: ${event.path}`);
    }); 

    gulp
        .src(['./node_modules/font-awesome/fonts/*.*'])
        .pipe(gulp.dest(adminPath + 'fonts/'));

    // Watch pour les fichiers CSS (ceux-ci sont gérés par stream() donc pas de reload nécessaire)
    gulp.watch(appPath + 'css/**/*.css').on('change', bs.reload);  // Rechargement pour les fichiers CSS de l'app
    gulp.watch(adminPath + 'css/**/*.css').on('change', bs.reload);  // Rechargement pour les fichiers CSS de l'admin

    // Watch pour les fichiers JS (rechargement complet)
    gulp.watch(appPath + 'js/**/*.js').on('change', bs.reload);  // Rechargement pour les fichiers JS de l'app
    gulp.watch(adminPath + 'js/**/*.js').on('change', bs.reload);  // Rechargement pour les fichiers JS de l'admin

    gulp.watch(appPath + "**/*.{html,php}").on('change', bs.reload);
    gulp.watch(adminPath + "**/*.{html,php}").on('change', bs.reload);

    gulp.watch(appPath + "**/*.{html,php}").on('change', bs.reload);
    gulp.watch(adminPath + "**/*.{html,php}").on('change', bs.reload);

    gulp.watch(appPath + "img/**/*").on('change', bs.reload);
    gulp.watch(adminPath + "img/**/*").on('change', bs.reload);

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

// Build - Admin
gulp.task('build-admin', function (done) {
    del([adminProdPath], function (err) {
        if (err) throw err;

        gulp
            .src([
                adminPath + '**/*.*',
                adminPath + '.htaccess',
                '!' + adminPath + '**/*.{html,php}',
                '!' + adminPath + 'img/**/*',
                '!' + adminPath + 'css/**/*',
                '!' + adminPath + 'js/**/*',
                '!' + adminPath + 'sass/**/*'
            ])
            .pipe(gulp.dest(adminProdPath));

        fs.stat(adminPath + 'img/**/*', function (err) {
            if (err != null) {
                gulp.src(adminPath + 'img/**/*')
                    .pipe(gulp.dest(adminProdPath + 'img/'));
            }
        });

        gulp
            .src([adminPath + '**/*.{html,php}'])
            .pipe(useref({
                searchPath: [adminPath, 'node_modules']
            }))
            .on('error', console.error)
            .pipe(gulpif('*.js', uglify()))
            .pipe(gulpif('*.css', cleanCSS()))
            .pipe(gulp.dest(adminProdPath));

        gulp
            .src(['./node_modules/tinymce/**/*', '!./node_modules/tinymce/*.*'])
            .pipe(gulpif('*.js', uglify()))
            .pipe(gulpif('*.css', cleanCSS()))
            .pipe(gulp.dest(adminProdPath + 'js/'));

        done();  // Signaler que la tâche est terminée
    });
});

// Tâche de build pour les deux répertoires
gulp.task('build', gulp.series('build-app', 'build-admin'));
