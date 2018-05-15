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

/*################################################ Global ############################################################*/

const color = {
	err: '\x1b[31m%s\x1b[0m',
	warn: '\x1b[33m%s\x1b[0m',
	info: '\x1b[34m%s\x1b[0m'
};

const errorHandlers = {
	css: function(err) {
		console.log('css: ');
		err.extract.forEach(function (val) {
			console.log(color.err, val);
		});
		this.emit('end');
	},
	js: function(err) {
		console.log('js: ');
		console.log(color.err, err);
		this.emit('end');
	},
	skip: function(err) {
		this.emit('end');
	}
};

/*################################################ Tasks #############################################################*/

gulp.task('css:dev', function () {
	return gulp.src(paths.css.source)
	    .pipe(sourcemaps.init())
	    .pipe(less().on('error', errorHandlers.css))
	    .pipe(sourcemaps.write('.'))
	    .pipe(gulp.dest(paths.css.dest));
});

gulp.task('css:build', function () {
	del(`${paths.css.dest}/style.min.css.map`);
	return gulp.src(paths.css.source)
		.pipe(less().on('error', errorHandlers.css))
		.pipe(cleanCss().on('error', errorHandlers.skip))
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
	    .pipe(uglify().on('error', errorHandlers.js))
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
