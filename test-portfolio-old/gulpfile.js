var gulp = require('gulp'),
	browserSync = require('browser-sync'),
	useref = require('gulp-useref'),
	gulpif = require('gulp-if'),
	uglify = require('gulp-uglify'),
	cleanCss = require('gulp-clean-css'),
	rimraf = require('gulp-rimraf'),
	filter = require('gulp-filter'),
	size = require('gulp-size'),
	imagemin = require('gulp-imagemin');




	gulp.task('server', function(){
		browserSync({
			port: 3000,
			server:{
				baseDir: '.'
			}
		});
	});

	gulp.task('watch', function(){
		gulp.watch([
			'app/css/**/*.css',
			'app/*.html',
			'app/js/**/*.js'

			]).on('change', browserSync.reload);
	});


	gulp.task('default', ['server', 'watch']);

// Build

	gulp.task('useref', function(){
		return gulp.src('app/*.html')
			.pipe(useref())
			.pipe(gulpif('*.js', uglify()))
			.pipe(gulpif('*.css', cleanCss()))
			.pipe(gulp.dest('dist'));

	});


//Clear
	gulp.task('clear', function(){
		return gulp.src('dist', { read: false})
		.pipe(rimraf());
	})

//Fonts 
	gulp.task('fonts', function(){
		gulp.src('app/fonts/**/*.*')
		// .pipe(filter(['*.eot', '*.svg', '*.ttf', '*.woff', '*.woff2', '*.css']))
		.pipe(gulp.dest('dist/fonts'))	
	});

//Images 
	gulp.task('images', function(){
		return gulp.src('app/images/*')
		.pipe(imagemin({
			progressive:true,
			interlaced: true
		}))
		.pipe(gulp.dest('dist/images'));
	});

//Extras
	gulp.task('extras', function(){
		return gulp.src([
			'app/*.*',
			'!app/*.html'
			]).pipe(gulp.dest('dist'));
	})

//Build 
gulp.task('build', ['clear'], function(){
	gulp.start('dist');
})

gulp.task('dist', ['useref', 'images', 'fonts', 'extras'], function(){
	return gulp.src('dist/**/*').pipe(size({title: 'build'}));
});