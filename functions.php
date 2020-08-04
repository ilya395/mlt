<?php

// хук события подклюсения скриптов
add_action('wp_enqueue_scripts', 'mlt_wp_media');

function mlt_wp_media() {
	wp_enqueue_style('libs_style', get_template_directory_uri() . '/assets/css/libs.min.css', [], null, false);
	wp_enqueue_style('main_style', get_template_directory_uri() . '/assets/css/main.css', [], null, false);

    wp_enqueue_script('libs_script', get_template_directory_uri() . '/assets/js/libs.min.js', [], null, true);
	wp_enqueue_script('main_script', get_template_directory_uri() . '/assets/js/common.js', [], null, true);
	wp_enqueue_script('test_script', get_template_directory_uri() . '/assets/js/common.js', [], null, true);
}

// подключаем к админке файлы для кастомизации
add_action( 'admin_enqueue_scripts', 'mlt_wp_admin');

function mlt_wp_admin() {
	wp_enqueue_style('custom_libs_style', get_template_directory_uri() . '/custom/css/bootstrap-grid.min.css', [], null, false);
	wp_enqueue_style('docs_dancing_style', get_template_directory_uri() . '/custom/css/style.css', [], null, false);

	wp_enqueue_script('docs_dancing_script', get_template_directory_uri() . '/custom/js/script.js', [], null, true);
}

// регистрация всякой шняги
add_action('after_setup_theme', 'mlt_after_setup');

function mlt_after_setup() {
    // меню
    register_nav_menu('top', 'Top Menu');
    // реегистрируем картинки в постах
    add_theme_support('post-thumbnails');
    // авто заполнение заголовка
    add_theme_support('title-tag');
    //
}

// регистрирем новые типы записей
add_action('init', 'registering_post_type');

function registering_post_type() {
    // товары
    register_post_type('product', [
        'label'  => null,
		'labels' => [
			'name'               => 'Товары', // основное название для типа записи
			'singular_name'      => 'Товар', // название для одной записи этого типа
			'add_new'            => 'Добавить товар', // для добавления новой записи
			'add_new_item'       => 'Добавление товара', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование товара', // для редактирования типа записи
			'new_item'           => 'Новый товар', // текст новой записи
			'view_item'          => 'Смотреть товар', // для просмотра записи этого типа.
			'search_items'       => 'Искать товар', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Товары', // название меню
        ],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => null, // зависит от public
		'exclude_from_search' => null, // зависит от public
		'show_ui'             => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-media-document', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor','thumbnail','excerpt','custom-fields'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => true,
    ]);
    // таксономия к товарам
    register_taxonomy( 'product_category', [ 'product' ], [ 
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Категории товаров',
			'singular_name'     => 'Категория товаров',
			'search_items'      => 'Поск категорий',
			'all_items'         => 'Все категории',
			'view_item '        => 'Посмотреть категорию',
			// 'parent_item'       => 'Parent Genre',
			// 'parent_item_colon' => 'Parent Genre:',
			'edit_item'         => 'Редактировать категорию',
			'update_item'       => 'Обновить категорию',
			'add_new_item'      => 'Добавить категорию',
			'new_item_name'     => 'Создать категорию',
			'menu_name'         => 'Категории товаров',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => false,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		// 'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );

	// проекты
    register_post_type('project', [
        'label'  => null,
		'labels' => [
			'name'               => 'Проекты', // основное название для типа записи
			'singular_name'      => 'Проект', // название для одной записи этого типа
			'add_new'            => 'Добавить проект', // для добавления новой записи
			'add_new_item'       => 'Добавление проекта', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование проекта', // для редактирования типа записи
			'new_item'           => 'Новый проект', // текст новой записи
			'view_item'          => 'Смотреть проект', // для просмотра записи этого типа.
			'search_items'       => 'Искать проект', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Проекты', // название меню
        ],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => null, // зависит от public
		'exclude_from_search' => null, // зависит от public
		'show_ui'             => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-admin-multisite', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor','thumbnail','excerpt','custom-fields'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
	]);
	
	// предложения, типа акции
    register_post_type('offer', [
        'label'  => null,
		'labels' => [
			'name'               => 'Акции', // основное название для типа записи
			'singular_name'      => 'Акция', // название для одной записи этого типа
			'add_new'            => 'Добавить акцию', // для добавления новой записи
			'add_new_item'       => 'Добавление акции', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование акции', // для редактирования типа записи
			'new_item'           => 'Новая акция', // текст новой записи
			'view_item'          => 'Смотреть акцию', // для просмотра записи этого типа.
			'search_items'       => 'Искать проект', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Акции', // название меню
        ],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => null, // зависит от public
		'exclude_from_search' => null, // зависит от public
		'show_ui'             => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-cart', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor','thumbnail','excerpt','custom-fields'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => true,
	]);
	
	// услуги
    register_post_type('service', [
        'label'  => null,
		'labels' => [
			'name'               => 'Услуги', // основное название для типа записи
			'singular_name'      => 'Услуга', // название для одной записи этого типа
			'add_new'            => 'Добавить услугу', // для добавления новой записи
			'add_new_item'       => 'Добавление услуги', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование услуги', // для редактирования типа записи
			'new_item'           => 'Новая услуга', // текст новой записи
			'view_item'          => 'Смотреть услугу', // для просмотра записи этого типа.
			'search_items'       => 'Искать услугу', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Услуги', // название меню
        ],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => null, // зависит от public
		'exclude_from_search' => null, // зависит от public
		'show_ui'             => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-chart-area', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor','thumbnail','excerpt','custom-fields'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => true,
    ]);

}

// цепляемся к хуку, чтобы получить url до местного обработчика ajax
add_action('wp_head', 'way_js_vars');

function way_js_vars() {

    $vars = array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'theme_url' => get_template_directory_uri(),
    );

    echo "<script>window.wp = " . json_encode($vars) . "</script>";
};

// фильтр для импорта
// add_filter( 'pmxi_options_options', function( $options ) {
// 	// Match the desired custom post type
// 	if ( $options['custom_type'] == 'product' ) {
// 	//   return $options;
// 		$options['custom_name']['name'] = 'name';
// 		$options['custom_value']['name'] = '{undefined2[1]}';
// 		$options['custom_mapping_rules']['name'] = json_encode( [
// 		'value_from_csv' => 'value_to_custom_field',
// 		'en' => 'English',
// 		] );

// 		$options['custom_name']['count'] = 'count';
// 		$options['custom_value']['count'] = '{undefined3[1]}';
// 		$options['custom_mapping_rules']['name'] = json_encode( [
// 		'value_from_csv' => 'value_to_custom_field',
// 		'en' => 'English',
// 		] );

// 		return $options;
// 	}
// 	// Configure the custom fields
// 	// $options['custom_name']['name'] = 'name';
// 	// $options['custom_value']['name'] = '{undefined2[1]}';
// 	// $options['custom_mapping_rules']['name'] = json_encode( [
// 	//   'value_from_csv' => 'value_to_custom_field',
// 	//   'en' => 'English',
// 	// ] );

// 	// $options['custom_name']['count'] = 'count';
// 	// $options['custom_value']['count'] = '{undefined3[1]}';
// 	// $options['custom_mapping_rules']['name'] = json_encode( [
// 	//   'value_from_csv' => 'value_to_custom_field',
// 	//   'en' => 'English',
// 	// ] );

// 	// return $options;
//   } );

// обработка ajax
add_action('wp_ajax_ajax_request_content', 'ajax_content'); // ajax от админа или авторизованого пользователя
add_action('wp_ajax_nopriv_ajax_request_content', 'ajax_content'); // ajax от неавторизованного пользователя
// обработка ajax звпроса
function ajax_content() {

	$post_type = (string)htmlspecialchars(trim($_POST['type']));
	$id = (int)htmlspecialchars(trim($_POST['id']));

	$args = array( // получает любые записи
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => $post_type, // тип получаемых записей
        // 'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	);
	$posts = get_posts($args);
	// var_dump($posts);
	global $post;

	$data = [];

	foreach ($posts as $post):
		if ($post->ID == $id):
			setup_postdata($post);
			// var_dump($post);
			$data = array(
				'title' => get_the_title(),
				'content' => get_the_content(),
				'preview' => get_the_post_thumbnail_url(),
				'sub-title' => wp_trim_words(get_the_excerpt(), 12, ''),
			);
		endif;
	endforeach;

	wp_reset_postdata();

	$result = json_encode($data);
    wp_reset_postdata();
    echo $result;
    
    wp_die();
}

// обработка ajax
add_action('wp_ajax_ajax_submit_form', 'ajax_form'); // ajax от админа или авторизованого пользователя
add_action('wp_ajax_nopriv_ajax_submit_form', 'ajax_form'); // ajax от неавторизованного пользователя
// обработка ajax звпроса
function ajax_form() {
    $title = (string)htmlspecialchars(trim($_POST['title']));
    $name = (string)htmlspecialchars(trim($_POST['name']));
    $phone = (string)htmlspecialchars(trim($_POST['phone']));
    
    // данные для сообщения
    $message = array(
        "Заголовок" => $title,
        "Имя" => $name,
        "Телефон" => $phone,
    );

    //формируем сообщение
    $text="----------- Заказ звонка с сайта ООО Жилдорстроя -----------\n";
    foreach($message as $key => $value) {
         $text .= "".$key.": ".$value."\n";
    };
    //
    $res = array(
        'text' => $message,
    );
    // отправляем ссобщение
    if ($name != "" and $phone != "") {
        if (message_to_telegram($text) == true) { // заменить на отправку на email
            $res[0]['success'] = 'Okay';
            $res[0]['to_telegram'] = 'Done';
        } else {
            $res[0]['error'] = 'Not_okay';
		}
		//
        if (message_to_email($title, $name, $phone) == true) { // заменить на отправку на email
            $res[1]['success'] = 'Okay';
            $res[1]['to_email'] = 'Done';
        } else {
            $res[1]['error'] = 'Not_okay';
        }  
    } else {
        // echo json_encode($res['error']);
        $res['error'] = 'Not_okay';
    };
	$a = json_encode($res);
	echo $a;

    wp_die();
}

function message_to_telegram($text){

	// //  open connection
	$ch = curl_init();
	$bot_token = '919656472:AAFtg4HI0cmd_fkpdJbSomlBMeJPCGIL9jM';
	
	$bot_url = 'https://api.telegram.org/bot' . $bot_token .'/sendMessage';
	
	$post = array(
		'chat_id' => '-1001352697643', // 
		'text' => $text,
	);
	//  set the url
	curl_setopt($ch, CURLOPT_URL, $bot_url);
	//  number of POST vars
	curl_setopt($ch, CURLOPT_POST, 1);
	//  POST data
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	//  To display result of curl
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// set proxy
	curl_setopt($ch, CURLOPT_PROXY, 'socks5://tgdm:superslivaestbanan@149.56.15.105:7653');
	// execute post
	$result = curl_exec($ch);
	
	//  close connection
	curl_close($ch);
	
	return true;
	
};

function message_to_email($title, $name, $phone) {
    
    //response generation function
    $response = "";
    //function to generate response
    // function generate_response($type, $message){
    //     global $response;
    //     if($type == "success") $response = "<div class='success'>{$message}</div>";
    //     else $response = "<div class='error'>{$message}</div>";
    // };

    //php mailer variables!
    $to = get_option('admin_email') . ', ';
    $to .= "ilya.ef@group-dvm.net"; // "info@whitealley.ru";
    $subject = "Someone sent a message from ".get_bloginfo('name');
    $headers = 'From: '. $email . "rn" . 'Reply-To: ' . $email . "rn";
    $message = "Заголовок сообщения: " . $title . "; " . "Имя: " . $name . "Номер: " . $phone;

    $message_sent = "Yes!";
    $message_unsent = "Not...";
    
    $sent = mail($to, $subject, $message, $headers);
    // if($sent) generate_response("success", $message_sent); //message sent!
    // else generate_response("error", $message_unsent);//message wasn't sent
    
    // $res = array(
    //     'success' => 'Получилось', 
    //     'err' => 'Не получилось',
    // );
    // echo json_encode($res);

	// wp_die();
	
	return true;
};

require_once ABSPATH . 'wp-admin/includes/file.php';

// обработка ajax
add_action('wp_ajax_action_for_export_elements', 'export_func'); // ajax от админа или авторизованого пользователя
add_action('wp_ajax_nopriv_action_for_export_elements', 'export_func'); // ajax от неавторизованного пользователя
// обработка ajax звпроса
function export_func() {
	$elements_for_export = (string)htmlspecialchars(trim($_POST['elements_for_export']));

	$data = [
		['id', 'title', 'excerpt', 'content', 'preview', 'terms', 'taxonomy', 'name', 'count', 'unit', 'amount', 'prodaem'],
	];

	// $arg_cat = array(
	// 	'orderby'      => 'name', // сортировка по названию
	// 	'order'        => 'ASC', // сортировка от меньшего к большему
	// 	'hide_empty'   => 1, // скрыть пустые рубрики
	// 	'taxonomy'     => 'product_category', // название таксономии                    
	// );
	// $categories = get_categories( $arg_cat );
	// foreach ($categories as $cat):
	// 	array_push($data[0], $cat->slug);
	// endforeach;

	$args = array( // получает любые записи
        'numberposts' => -1,
        'orderby'     => 'date',
		'order'       => 'DESC',
		'post_status' => 'publish',
        'post_type'   => $elements_for_export, // тип получаемых записей
        // 'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	);
	$posts = get_posts($args);
	// var_dump($posts);
	global $post;

	foreach ($posts as $post):
		setup_postdata($post);

		$list = [];

		// function write($func) {
		// 	if (strlen($func) > 0) {
		// 		return $list[] = $func;
		// 	} else {
		// 		return $list[] = '';
		// 	};
		// };

		// $categories = get_the_category(get_the_ID()); // get_object_taxonomies('product');
		// $list['categories'] = $categories['slug'];
		$terms = get_the_terms(get_the_ID(), 'product_category');
		$term = $terms[0]->slug;
		$taxonomy = $terms[0]->taxonomy;

		for ( $i = 0; $i < count( $data[0] ); $i++ ):
			if ($data[0][$i] == 'id') {
				$list[] = get_the_ID();
			};
			if ($data[0][$i] == 'title') {
				$list[] = get_the_title();
			};
			if ($data[0][$i] == 'excerpt') {
				// array_push($list, get_the_excerpt());
				$list[] = get_the_excerpt();
			};
			if ($data[0][$i] == 'content') {
				$text = str_replace( array("\r\n", "\r", "\n"), '',  get_the_content() ); // strip_tags
				$list[] = $text;
			};
			if ($data[0][$i] == 'preview') {
				// array_push($list, get_the_post_thumbnail_url());
				$list[] = get_the_post_thumbnail_url();
			};
			if ($data[0][$i] == 'terms') {
				$list[] = $term;
			};
			if ($data[0][$i] == 'taxonomy') {
				$list[] = $taxonomy;
			};
			if (
				$data[0][$i] != 'id' && $data[0][$i] != 'title' && $data[0][$i] != 'excerpt' && $data[0][$i] != 'content' && $data[0][$i] != 'preview' && $data[0][$i] != 'terms' && $data[0][$i] != 'taxonomy'
			) {
				$slug = $data[0][$i];

				$field_objects = get_field_objects(get_the_ID());
				foreach ($field_objects as $object):
					if ($object['name'] == $slug) {
						// write($object['value']);
						// array_push($list, $object['value']);
						$list[] = $object['value']; // $object['value'];
					}
					// $list[ $object['name'] ] = $object['value'];
				endforeach;
			}
		endfor;

		array_push($data, $list);

	endforeach;

	wp_reset_postdata();

	$name_of_my_file = 'export.csv';
	$my_file = get_home_path() . 'wp-content/themes/mlt/documents/' . $name_of_my_file;

	$home_url = home_url('/');
	$url_for_front = $home_url . 'wp-content/themes/mlt/documents/' . $name_of_my_file;

	$fp = fopen($my_file, 'w');
	$array_fp = array();
	foreach ($data as $fields) {
		$array_fp[] = $fields;
		fputcsv($fp, $fields, ';', '"');
	}
	fclose($fp);

	// file_force_download($my_file);

	$res = array(
		'url'  => $url_for_front,
		'name' => $name_of_my_file,
		'data' => $data,
		'fp' => $array_fp,
	);
	$a = json_encode($res);
	echo $a;

    wp_die();
}

// обработка ajax
add_action('wp_ajax_action_for_import_elements', 'import_func'); // ajax от админа или авторизованого пользователя
add_action('wp_ajax_nopriv_action_for_import_elements', 'import_func'); // ajax от неавторизованного пользователя
// обработка ajax звпроса
function import_func() {

	// для отправки на фронт
	// $list = [];
	$l['status'] = 'work';

	// if ($_POST['elements_for_import']) {
	// 	print_r($_POST['elements_for_import']);
	// }
	// $elements_for_export = (string)htmlspecialchars(trim($_POST['elements_for_export']));
	$elements_for_import = (string)htmlspecialchars(trim($_POST['elements_for_import']));
	$l['elements_for_import'] = $elements_for_import;

	// $field = $_POST['file'];

	// if( empty($_FILES) ) {
	// 	$list['empty'] = true;
	// 	// wp_send_json_error( 'Файлов нет...' )
	// } else {
	// 	$list['empty'] = false;
	// };
	
	// if ($_FILES['fileForImport']) {
	// 	print_r($_FILES['fileForImport']);
	// }
	// $files = $_FILES; // полученные файлы
	// $list['count'] = count($files);
	// $done_files = array();

	// $list['file_from_POST'] = $field;

	// $uploaddir = get_template_directory_uri() . '/uploads';

	// $uploaddir = get_home_path() . 'wp-content/themes/mlt/uploads';
	// $list['url'] = $uploaddir;
	// if( ! is_dir( $uploaddir ) ) {
	// 	mkdir( $uploaddir, 0777 );
	// 	$list['folder'] = 'created';
	// };

	// переместим файлы из временной директории в указанную
	// foreach( $files as $file ){
	// 	$file_name = $file['name'];
	// 	$list['name_on_server'] = $file_name;

	// 	$what_with_file = move_uploaded_file( $file['tmp_name'], "$uploaddir/$file_name" );
	// 	$list['what_with_file'] = $what_with_file;
	// 	if( $what_with_file ){
	// 		$done_files[] = realpath( "$uploaddir/$file_name" );
	// 	}
	// }

	function foo() {}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////

	$main_data = [];

	$name_of_my_file = 'import.csv';
	$my_file = get_home_path() . 'wp-content/themes/mlt/documents/' . $name_of_my_file;

	if (($fp = fopen($my_file, "r")) !== FALSE) {
		while (($data = fgetcsv($fp, 0, ";")) !== FALSE) {
			$list[] = $data;
		}
		fclose($fp);
		$main_data = $list;
		// print_r($list);
	};
	
	/////

	wp_reset_postdata();

	$args = array( // получает любые записи
        'numberposts' => -1,
        'orderby'     => 'date',
		'order'       => 'DESC',
		'post_status' => 'publish',
        'post_type'   => $elements_for_import, // тип получаемых записей
        // 'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	);
	$posts = get_posts($args);
	$request['I'] = $posts;
	$request['count_I'] = count($posts);

	global $post;

	$new_data = [];

	$index_of_title = null;
	for ($i = 0; $i < count($main_data[0]); $i++) {
		if ($main_data[0][$i] == 'title') {
			$index_of_title = $i;
		}
	};
	$request['index_of_title'] = $index_of_title;

	$i_iterator = [];

	if (count($posts) > 0) {
		$request['count_post'] = '>0';

		foreach ($posts as $k => $post):
			setup_postdata($post);

			$post_title = get_the_title();
			$match = false;

			$i_iterator[$k]['value'] = $post;
			$i_iterator[$k]['problem'] = array(
				0 => array(),
				1 => $post_title
			);	

			for ( $i = 1; $i < count($main_data); $i++ ) {
				$i_iterator[$k]['problem'][0] = $main_data[$i][$index_of_title];

				if ((string)$main_data[$i][$index_of_title] === (string)$post_title) {
					
					$match = true;
					$i_iterator[$k]['совпало'] = true;
					// проверить поля
					$this_post_id = get_the_ID();
					$updated_post_arr = array(
						'ID'		=> $this_post_id, // допустим, ID поста, заголовок которого нужно изменить, равен 500
						'post_type' => $elements_for_import,
						// 'post_title'    => 'Новый заголовок' // заголовок
						'post_status'   => 'publish',
					);

					$list_with_fields = $main_data[0];

					$list_with_custom_fields = get_field_objects($this_post_id);;

					foreach ($list_with_fields as $index => $item) {
						if ($item == 'title') {
							$updated_post_arr['post_title'] = $main_data[$i][$index];
						};
						if ($item == 'excerpt') {
							$updated_post_arr['post_excerpt'] = $main_data[$i][$index];
						};
						if ($item == 'content') {
							$updated_post_arr['post_content'] = $main_data[$i][$index];
						};
						if ($item == 'preview') {
							// $updated_post_arr['post_content'] = $main_data[$i]['content'];
						};
						if ($item == 'terms') {
							$updated_post_arr['category_name'] = $main_data[$i][$index];
						};
						if ($item == 'taxonomy') {

						};
					};
					foreach ($list_with_fields as $index => $item) {
						if (
							$item != 'title' && $item != 'excerpt' && $item != 'content' && $item != 'preview' && $item != 'terms' && $item != 'taxonomy'
						) {
							foreach ($list_with_custom_fields as $custom_field) {
								if ($item == $custom_field['name']) {
									update_field($item, $main_data[$i][$index], $this_post_id);
								}
							}
						};
					};
					
					// обновляем пост (все остальные его параметры останутся прежними)
					wp_insert_post( $updated_post_arr );
				} else {
					// скрыть пост, т.к. в новой выгрузке его нет
					$i_iterator[$k]['совпало'] = false;
					$this_post_id = get_the_ID();
					$updated_post_arr = array(
						'ID'		=> $this_post_id, // допустим, ID поста, заголовок которого нужно изменить, равен 500
						'post_status'   => 'draft',
					);
					wp_insert_post( $updated_post_arr );
				};
			};

		endforeach;

		$request['posts'] = $i_iterator;

		wp_reset_postdata();

		$arr[] = 'I';

		$l['complite'] = $arr;

		/////

		$args_new = array( // получает любые записи
			'numberposts' => -1,
			'orderby'     => 'date',
			'order'       => 'DESC',
			'post_status' => 'publish',
			'post_type'   => $elements_for_import, // тип получаемых записей
			// 'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
		);
		$posts_new = get_posts($args_new);
		
		global $post;

		for ($i = 1; $i < count($main_data); $i++) {

			$match = false;

			$main_data_item_title = '';
			foreach ($main_data[0] as $index => $item) {
				if ($item == 'title') {
					$main_data_item_title = $main_data[$i][$index];
				};
			};

			foreach ($posts_new as $post):
				setup_postdata($post);

				$post_new_title = get_the_title();

				if ($main_data_item_title == $post_new_title) {
					// заголоаок найден и ранее был изменен
					$match = false;
				} else {
					// это новый заголовок - добавить его
					$match = true;			
				}

			endforeach;

			if ($match == true) {
				$updated_post_arr = array(
					'post_status'   => 'publish',
					'post_title'    => $main_data[$i]['title'],
					'post_excerpt'  => $main_data[$i]['excerpt'],
					'post_content'  => $main_data[$i]['content'],
					'comment_status' => 'closed',
					'post_category' => $main_data[$i]['terms'],

				);

				$new_post_id = wp_insert_post( $updated_post_arr );	

				foreach ($main_data[0] as $t => $title) {
					if (
						$item != 'title' && $item != 'excerpt' && $item != 'content' && $item != 'preview' && $item != 'terms' && $item != 'taxonomy'
					) {
						// $slug = $main_data[$i][$j];
						// $rand_char = rand(1000000000000, 9999999999999);
						// $field_key = "field_1234567";

						update_field( $title, $main_data[$i][$t], $new_post_id );
					};
				};

			}

		}

	} else {
		$request['count_post'] = '=0';
		$index_of_title = null;
		for ($i = 0; $i < count($main_data[0]); $i++) {
			if ($main_data[0][$i] == 'title') {
				$index_of_title = $i;
			};
		};

		for ( $i = 1; $i < count($main_data); $i++ ) {

			$request['title_' + $i] = $main_data[$i][0];

			// проверить поля
			$this_post_id = wp_insert_post(wp_slash( array (
				'post_status'   => 'publish',
				'post_title'    => $main_data[$i][0],
				'post_type'     => $elements_for_import,
			) ));
			$request[$i] = $this_post_id;
			$updated_post_arr = array(
				'ID'		=> $this_post_id, // допустим, ID поста, заголовок которого нужно изменить, равен 500
				'post_title'    => 'Новый заголовок', // заголовок
				'post_type'     => $elements_for_import,
				'post_status'   => 'publish',
			);

			$list_with_fields = $main_data[0];

			// $list_with_custom_fields = get_field_objects($this_post_id);;

			foreach ($list_with_fields as $index => $item) {
				if ($item == 'title') {
					$updated_post_arr['post_title'] = $main_data[$i][$index];
				};
				if ($item == 'excerpt') {
					$updated_post_arr['post_excerpt'] = $main_data[$i][$index];
				};
				if ($item == 'content') {
					$updated_post_arr['post_content'] = $main_data[$i][$index];
				};
				if ($item == 'preview') {
					// $updated_post_arr['post_content'] = $main_data[$i]['content'];
				};
				if ($item == 'terms') {
					$updated_post_arr['category_name'] = $main_data[$i][$index];
				};
				if ($item == 'taxonomy') {

				};
			};

			// обновляем пост (все остальные его параметры останутся прежними)
			wp_insert_post( $updated_post_arr );

			foreach ($list_with_fields as $index => $item) {
				if (
					$item != 'title' && $item != 'excerpt' && $item != 'content' && $item != 'preview' && $item != 'terms' && $item != 'taxonomy'
				) {
					update_field($item, $main_data[$i][$index], $this_post_id);
				};
			};
			
		};
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////

	// $data = $done_files ? array('files' => $done_files ) : array('error' => 'Ошибка загрузки файлов.');

	$request['info'] = $l;
	$request['main_data'] = $main_data;

	$res = json_encode( $request );
	echo $res;

	wp_die();
};
	