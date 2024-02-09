const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const browserSync = require("browser-sync").create();
const sourcemaps = require("gulp-sourcemaps");

const includePaths = [
  "node_modules/foundation-sites/scss",
  "node_modules/motion-ui/src",
];

function sassBuild() {
  return gulp
    .src(["assets/scss/app.scss"])
    .pipe(sourcemaps.init())
    .pipe(
      sass({
        includePaths: includePaths,
        outputStyle: "compressed",
      }).on("error", sass.logError)
    )
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest("assets/css"));
}

function serve() {
  browserSync.init({ port: "3030", proxy: "stagingsite.local", open: false });
  gulp.watch("assets/scss/*.scss", sassBuild);
  gulp.watch(["**/*.php"]).on("change", browserSync.reload);
}

gulp.task("sass", sassBuild);
gulp.task("serve", gulp.series("sass", serve));
gulp.task("default", gulp.series("sass", serve));
