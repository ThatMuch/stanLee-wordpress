import autoprefixer from "gulp-autoprefixer";
import babel from "gulp-babel";
import browserSync from "browser-sync";
import cleanCSS from "gulp-clean-css";
import concat from "gulp-concat";
import dartSass from "sass";
import gulp from "gulp";
import gulpSass from "gulp-sass";
import rename from "gulp-rename";
import uglify from "gulp-uglify";
import zip from "gulp-zip";

const sass = gulpSass(dartSass);

const config = await import("./wpgulp.config.js");

sass.compiler = dartSass;
browserSync.create();

gulp.task("styles", function () {
    return gulp
        .src("assets/styles/**/*.scss")
        .pipe(
            sass({
                silenceDeprecations: ["legacy-js-api", "mixed-decls", "color-functions", "global-builtin", "import"],
            }),
        )
        .pipe(sass().on("error", sass.logError))
        .pipe(
            autoprefixer({
                overrideBrowserslist: ["last 2 version", "safari 5", "ie 6", "ie 7", "ie 8", "ie 9", "opera 12.1", "ios 6", "android 4"],
            }),
        )
        .pipe(cleanCSS())
        .pipe(rename({ suffix: ".min" }))
        .pipe(gulp.dest("assets/styles/"))
        .pipe(
            browserSync.reload({
                stream: true,
            }),
        );
});
gulp.task("styles_admin", function () {
    return gulp
        .src(config.styleSRC)
        .pipe(
            sass({
                silenceDeprecations: ["legacy-js-api", "mixed-decls", "color-functions", "global-builtin", "import"],
            }),
        )
        .pipe(sass().on("error", sass.logError))
        .pipe(
            autoprefixer({
                overrideBrowserslist: ["last 2 version", "safari 5", "ie 6", "ie 7", "ie 8", "ie 9", "opera 12.1", "ios 6", "android 4"],
            }),
        )
        .pipe(cleanCSS())
        .pipe(rename({ suffix: ".min" }))
        .pipe(gulp.dest(config.styleDestination))
        .pipe(
            browserSync.reload({
                stream: true,
            }),
        );
});
gulp.task("scripts", function () {
    return gulp
        .src("assets/scripts/custom/*.js")
        .pipe(concat("all.js"))
        .pipe(
            babel({
                presets: ["@babel/env"],
            }),
        )
        .pipe(uglify())
        .pipe(rename({ suffix: ".min" }))
        .pipe(gulp.dest("assets/scripts/"))
        .pipe(
            browserSync.reload({
                stream: true,
            }),
        );
});
gulp.task("watch", function () {
    browserSync.init({
        proxy: config.projectURL,
        open: config.browserAutoOpen,
        injectChanges: config.injectChanges,
        watchEvents: ["change", "add", "unlink", "addDir", "unlinkDir"],
    });
    gulp.watch(config.watchStyles, gulp.series("styles"));
    gulp.watch("assets/styles/admin/*.scss", gulp.series("styles_admin"));
    gulp.watch(config.watchJsCustom, gulp.series("scripts"));
    gulp.watch(config.watchCss).on("change", browserSync.reload);
    gulp.watch(config.watchPhp).on("change", browserSync.reload);
    gulp.watch(config.watchJs).on("change", browserSync.reload);
});

// New task to create a production-ready zip
gulp.task("zip", function () {
    return gulp
        .src([
            "./**/*",
            "!./{node_modules,node_modules/**/*}",
            "!./assets/{sass,sass/*}",
            "!./gulpfile.js",
            "!./package.json",
            "!./package-lock.json",
            "!./wpgulp.config.js",
            "!./prettierignore",
            "!./prettierrc.yml",
        ])
        .pipe(zip("heptalytics.zip"))
        .pipe(gulp.dest("./../"));
});

// Add the zip task to a build command (optional)
gulp.task("build", gulp.series("styles", "scripts", "zip"));
gulp.task("default", gulp.parallel("styles", "scripts", "watch"));
