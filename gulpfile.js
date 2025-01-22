var gulp = require("gulp");
var sass = require("gulp-sass")(require("sass"));
//var autoprefixer = require("gulp-autoprefixer");
var cleanCSS = require("gulp-clean-css");
var concat = require("gulp-concat");
var uglify = require("gulp-uglify");
var rename = require("gulp-rename");
var browserSync = require("browser-sync").create();
var zip = require("gulp-zip");
var imagemin = require("gulp-imagemin");

const config = require("./wpgulp.config.js");

gulp.task("optiimage", function () {
    return gulp
        .src("assets/images/")
        .pipe(imagemin({ progressive: true }))
        .pipe(gulp.dest("assets/optiimage/"));
});

gulp.task("styles", function () {
    return (
        gulp
            .src("assets/styles/**/*.scss")
            .pipe(sass().on("error", sass.logError))
            //.pipe(autoprefixer("last 2 versions"))
            .pipe(cleanCSS())
            .pipe(rename({ suffix: ".min" }))
            .pipe(gulp.dest("assets/styles/"))
            .pipe(
                browserSync.reload({
                    stream: true,
                }),
            )
    );
});
gulp.task("styles_admin", function () {
    return (
        gulp
            .src(config.styleSRC)
            .pipe(sass().on("error", sass.logError))
            //.pipe(autoprefixer("last 2 versions"))
            .pipe(cleanCSS())
            .pipe(rename({ suffix: ".min" }))
            .pipe(gulp.dest(config.styleDestination))
            .pipe(
                browserSync.reload({
                    stream: true,
                }),
            )
    );
});
gulp.task("scripts", function () {
    return gulp
        .src(config.jsCustomSRC)
        .pipe(concat("all.js"))
        //.pipe(uglify())
        .pipe(rename({ suffix: ".min" }))
        .pipe(gulp.dest(config.jsCustomDestination))
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

