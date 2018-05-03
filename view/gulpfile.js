const del = require('del');
const gulp = require('gulp');
const watch = require('gulp-watch');
const sourcemaps = require('gulp-sourcemaps');
const less = require('gulp-less');
const cleanCss = require('gulp-clean-css');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');

const paths = {
	css: {
		source: ['less/style.less'],
		watch: ['less/*.less', 'components/**/*.less'],
		dest: 'css'
	},
	js: {
		source: ['components/**/*.js'],
		watch: 'components/**/*.js',
		dest: 'js'
	}
};

/*################################################ Tasky #############################################################*/

gulp.task('css:dev', function () {
	return gulp.src(paths.css.source)
	    .pipe(sourcemaps.init())
	    .pipe(less())
	    .pipe(sourcemaps.write('.'))
	    .pipe(gulp.dest(paths.css.dest));
});

gulp.task('css:build', function () {
	del(`${paths.css.dest}/style.min.css.map`);
	return gulp.src(paths.css.source)
		.pipe(less())
		.pipe(cleanCss())
		.pipe(gulp.dest(paths.css.dest));
});

gulp.task('js:dev', function () {
	return gulp.src(paths.js.source)
	    .pipe(sourcemaps.init())
	    .pipe(concat('script.min.js'))
	    .pipe(sourcemaps.write('.'))
	    .pipe(gulp.dest(paths.js.dest));
});

gulp.task('js:build', function () {
	del(`${paths.js.dest}/script.min.js.map`);
	return gulp.src(paths.js.source)
	    .pipe(concat('script.min.js'))
	    .pipe(uglify())
	    .pipe(gulp.dest(paths.js.dest));
});

gulp.task('build', ['css:build', 'js:build']);

gulp.task('watch', ['css:dev', 'js:dev'], function () {
	watch(paths.css.watch, function () {
		gulp.start(['css:dev']);
	});
	watch(paths.js.watch, function () {
		gulp.start(['js:dev']);
	});
});
