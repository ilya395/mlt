<?php

// хук события подклюсения скриптов
add_action('wp_enqueue_scripts', 'mlt_wp_media');

function mlt_wp_media() {
	wp_enqueue_style('libs_style', get_template_directory_uri() . '/assets/css/libs.min.css', [], null, false);
	wp_enqueue_style('main_style', get_template_directory_uri() . '/assets/css/main.css', [], null, false);

    wp_enqueue_script('libs_script', get_template_directory_uri() . '/assets/js/libs.min.js', [], null, true);
	wp_enqueue_script('main_script', get_template_directory_uri() . '/assets/js/common.js', [], null, true);
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

	$data = [];

	foreach ($posts as $post):
		setup_postdata($post);
		// var_dump($post);
		$list = array(
			'title' => get_the_title(),
			'excerpt' => get_the_excerpt(),
			'content' => get_the_content(),
			'preview' => get_the_post_thumbnail_url(),
		);
		array_push($data, $list);
	endforeach;

	$name_of_my_file = 'export.csv';
	$home_url = home_url('/');
	$my_file = $home_url . 'wp-content/themes/mlt/documents/' . $name_of_my_file; // get_home_path() 

	$fp = fopen($my_file, 'w');
	foreach ($data as $fields) {
		fputcsv($fp, $fields, ';', '|');
	}
	fclose($fp);

	// file_force_download($my_file);

	$res = array(
		'url'  => $my_file,
		'name' => $name_of_my_file,
	);
	$a = json_encode($res);
	echo $a;

    wp_die();
}

function file_force_download($file) {
	if (file_exists($file)) {
	  // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
	  // если этого не сделать файл будет читаться в память полностью!
	  if (ob_get_level()) {
		ob_end_clean();
	  }
	  // заставляем браузер показать окно сохранения файла
	  header('Content-Description: File Transfer');
	  header('Content-Type: application/octet-stream');
	  header('Content-Disposition: attachment; filename=' . basename($file));
	  header('Content-Transfer-Encoding: binary');
	  header('Expires: 0');
	  header('Cache-Control: must-revalidate');
	  header('Pragma: public');
	  header('Content-Length: ' . filesize($file));
	  // читаем файл и отправляем его пользователю
	  if ($fd = fopen($file, 'rb')) {
		while (!feof($fd)) {
		  print fread($fd, 1024);
		}
		fclose($fd);
	  }
	  exit;
	}
  }
	