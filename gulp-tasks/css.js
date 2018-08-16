import gulp from 'gulp';
import postcss from 'gulp-postcss';
import sass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import pump from 'pump';

gulp.task( 'css', ( cb ) => {
	const fileSrc = [
		'./assets/scss/admin/admin-style.scss',
		'./assets/scss/frontend/style.scss',
		'./assets/scss/shared/shared-style.scss',
		'./assets/scss/styleguide/styleguide.scss'
	];
	const fileDest = './dist';

	const cssOpts = {
		stage: 0
	};

	const taskOpts = [
		require( 'postcss-import' ),
		require( 'postcss-preset-env' )( cssOpts )
	];

	pump( [
		gulp.src( fileSrc ),
		sass().on('error', sass.logError),
		sourcemaps.init( {
			loadMaps: true
		} ),
		postcss( taskOpts ),
		sourcemaps.write( './css', {
			mapFile: function( mapFilePath ) {
				return mapFilePath.replace( '.css.map', '.min.css.map' );
			}
		} ),
		gulp.dest( fileDest )
	], cb );
} );
