const gulp = require('gulp'); // Подключаем Gulp
const sass = require('gulp-sass'); //Подключаем Sass пакет
const browserSync = require('browser-sync'); // Подключаем Browser Sync
const concat = require('gulp-concat'); // Подключаем gulp-concat (для конкатенации файлов)
const uglify = require('gulp-uglifyjs'); // Подключаем gulp-uglifyjs (для сжатия JS) 
const cssnano = require('gulp-cssnano'); // Подключаем пакет для минификации CSS
const rename = require('gulp-rename'); // Подключаем библиотеку для переименования файлов  
const del = require('del'); // Подключаем библиотеку для удаления файлов и папок 
const imagemin = require('gulp-imagemin'); // Подключаем библиотеку для работы с изображениями
const pngquant = require('imagemin-pngquant'); // Подключаем библиотеку для работы с png	
const cache = require('gulp-cache'); // Подключаем библиотеку кеширования  
const autoprefixer = require('gulp-autoprefixer');// Подключаем библиотеку для автоматического добавления префиксов             
const babel = require("gulp-babel");
const include = require('gulp-file-include'); // соединение частей файла/файлов в родительском файле через инклуды
const workHtml = `post`; // main // catalog // about // offers // contacts // post // stocks //

/* тут начинаются таски */

	/* task для сбора html () */
	const concatHtmlAll = () => {
		return gulp.src([
			'src/assets/templates/*.html',
		])
		.pipe(include({
			prefix: '@@'
		}))
		.pipe(rename({prefix: 'index-'}))
		.pipe(gulp.dest('src'))
	}
	exports.concatHtmlAll = concatHtmlAll;

	/* отравляем код рабочего файла в index.html, потомучто в него смотрит gulp */
	const concatHtmlWork = () => {
		return gulp.src([
			`src/assets/templates/${workHtml}.html`,
		])
		.pipe(include({
			prefix: '@@'
		}))
		.pipe(rename({basename: 'index'}))
		.pipe(gulp.dest('src'))
	}
	exports.concatHtmlWork = concatHtmlWork;

	/* task для изменения названия текущего/рабочего файла */
	const changeWorkHtml = () => {
		return gulp.src([`src/${workHtml}.html`])
			.pipe(rename({basename: 'index'}))
			// .pipe(gulp.dest('src'))
	}
	exports.changeWorkHtml = changeWorkHtml;

	/* task для сбора sass файлов в css */
	const inSass = () => { // Создаем таск "sass"
		return gulp.src([
			'src/assets/sass/**/*.sass'
			]) // Берем все sass файлы из папки sass и дочерних, если таковые будут
			.pipe(sass({
				includePaths: require('node-normalize-scss').includePaths
			})) // Преобразуем Sass в CSS посредством gulp-sass
			.pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true })) // Создаем префиксы	        
			.pipe(gulp.dest('src/assets/css')) // Выгружаем результата в папку build/css
			.pipe(browserSync.reload({stream: true})) // Обновляем CSS на странице при изменении
	}
	exports.inSass = inSass;

	/* включаем sync */
	const onBrowserSync = () => { // Создаем таск browser-sync
	    browserSync({ // Выполняем browserSync
	        server: { // Определяем параметры сервера
	            baseDir: 'src' // Директория для сервера - src
	            // где-то здесь настраивается согласие на использование тунеля
	        },
	        notify: false, // Отключаем уведомления
	        // tunnel: true
	    });
	}
	exports.onBrowserSync = onBrowserSync;

	/* перевод js в es5 */
	const es5 = () => {
		return gulp.src("src/assets/js/common.js")
		.pipe(babel({
			presets: ['@babel/env']// ['2015']
		}))
		.pipe(gulp.dest("src/assets/js/common_def.js"));
	}
	exports.es5 = es5

	/* обработка html, js */
	const scripts = () => {
	    return gulp.src(['src/assets/js/common.js', 'src/assets/libs/**/*.js'])
	    .pipe(browserSync.reload({ stream: true }))
	}
	exports.scripts = scripts;
	const code = () => {
	    return gulp.src('src/*.html')
	    .pipe(browserSync.reload({ stream: true }))
	}
	exports.code = code;
	const changeCode = () => {
	    return gulp.src('src/assets/templates/**/*.html') //templates/*.html
	    .pipe(browserSync.reload({ stream: true }))	// Обновляем CSS на странице при изменении
	}
	exports.changeCode = changeCode;
	const indexCode = gulp.series(
		gulp.parallel(
			concatHtmlWork,
			code,
			changeCode
		)
	)
	exports.indexCode = indexCode;

	/* сборка и сжатие библиотек и js */
	const allScripts = () => {
	    return gulp.src([ // Берем все необходимые библиотеки из libs
	        // 'src/libs/jquery/dist/jquery.js', // Берем jQuery
	        // 'src/libs/lottie/lottie_svg.js',
	        // 'src/libs/owlcarousel/owl.carousel.js',
	        // 'src/libs/touch/jquery.touchSwipe.min.js'
	        'src/assets/libs/inputmask.js',
	        'src/assets/libs/phone-ru.min.js'
	        ])
	        .pipe(concat('libs.min.js')) // Собираем их в кучу в новом файле libs.min.js
	        .pipe(uglify()) // Сжимаем JS файл
	        .pipe(gulp.dest('src/assets/js')); // Выгружаем в папку src/js
	}
	exports.allScripts = allScripts;

	/* минификации CSS библиотек */
	const cssLibs = () => {
	    return gulp.src([
	    	// 'src/assets/libs/normalize.css',
	    	// 'src/assets/libs/animate.css',
	    	// 'src/assets/libs/owl.carousel.css',
	    	// 'src/assets/libs/owl.theme.default.css',
	    	// 'src/assets/libs/libs.css', // Выбираем файл для минификации
	    	'src/assets/libs/normalize.css',
			'src/assets/libs/reset-css/reset.css',
			'src/assets/libs/bootstrap/bootstrap-grid.min.css'
	    	]) 
	    	.pipe(concat('libs.css'))
	        .pipe(cssnano()) // Сжимаем
	        .pipe(rename({suffix: '.min'})) // Добавляем суффикс .min
	        .pipe(gulp.dest('src/assets/css')); // Выгружаем в папку src/css
	}
	exports.cssLibs = cssLibs;

	/* очистка dist перед выгрузкой в продакшен */
	const clean = async () => {
	    return await del.sync('dist'); // Удаляем папку dist перед сборкой
	}
	exports.clean = clean;

	/* оптимизируем изображения */
	const img = () => {
	    return gulp.src('src/assets/images/**/*') // Берем все изображения из src
	        .pipe(cache(imagemin({ // С кешированием
	        // .pipe(imagemin({ // Сжимаем изображения без кеширования
	            interlaced: true,
	            progressive: true,
	            svgoPlugins: [{removeViewBox: false}],
	            use: [pngquant()]
	        }))/**/)
	        .pipe(gulp.dest('dist/assets/images')); // Выгружаем на продакшен
	}
	exports.img = img;

	/* в продакшен */
	const prebuild = async () => {
	    let buildCss = await gulp.src([ // Переносим CSS стили в продакшен
	        'src/assets/css/main.css',
	        'src/assets/css/libs.min.css'
		])
	    	.pipe(gulp.dest('dist/assets/css'))

	    let buildFonts = await gulp.src('src/assets/fonts/**/*') // Переносим шрифты в продакшен
	    	.pipe(gulp.dest('dist/assets/fonts'))

	    let buildJs = await gulp.src('src/assets/js/**/*') // Переносим скрипты в продакшен
	    	.pipe(gulp.dest('dist/assets/js'))

	    let buildHtml = await gulp.src('src/*.html') // Переносим HTML в продакшен
	    	.pipe(gulp.dest('dist'));
	}
	exports.prebuild = prebuild;

	/* очистка кэш Gulp */
	const clear = () => {
		return cache.clearAll();
	}
	exports.clear = clear;

	/* watch'er */
	const watch = () => {
		gulp.watch('src/assets/sass/**/*.sass', gulp.parallel(inSass)); // Наблюдение за sass файлами
		gulp.watch('src/assets/templates/*.html', gulp.parallel(indexCode));
	    gulp.watch('src/*.html', gulp.parallel(code)); // Наблюдение за HTML файлами в корне проекта
	    gulp.watch(['src/assets/js/common.js', 'src/assets/libs/**/*.js'], gulp.parallel(scripts)); // Наблюдение за главным JS файлом и за библиотеками
	}
	exports.watch = watch;

	/* new watch'er for html's */
	// gulp.task('watch-htmls', 'browser-sync', function(){
	//          gulp.watch('src/*.html',  gulp.parallel('code'));
	// });

	/* 'all-scripts', */           
const defaultTask = gulp.parallel(
	concatHtmlWork, 
	cssLibs, 
	inSass, 
	allScripts, 
	onBrowserSync, 
	watch
);
exports.defaultTask = defaultTask;

const buildTask = gulp.parallel(
	concatHtmlAll, 
	es5, 
	prebuild, 
	clean, 
	img, 
	inSass, 
	allScripts
);
exports.buildTask = buildTask;