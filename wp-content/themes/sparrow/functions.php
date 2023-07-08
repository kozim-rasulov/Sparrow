<?
add_action("wp_enqueue_scripts", "themeStyle");
add_action("after_setup_theme", "themeMenu");
add_action("widgets_init", "themeSidebar");
add_action( 'init', 'register_post_types' );

function themeStyle()
{
    wp_enqueue_style("style", get_template_directory_uri() . "/style.css", [], "1.0.0");
    wp_enqueue_style("default", get_template_directory_uri() . "/assets/css/default.css", [], "1.0.1");
    wp_enqueue_style("layout", get_template_directory_uri() . "/assets/css/layout.css", [], "1.0.1");
    wp_enqueue_style("queries", get_template_directory_uri() . "/assets/css/media-queries.css", [], "1.0.0");


    wp_deregister_script('jquery-core');
    wp_deregister_script('jquery');

    // регистрируем
    wp_register_script('jquery-core', get_template_directory_uri() . "/assets/js/jquery-1.10.2.min.js", false, null, true);
    wp_register_script('jquery', get_template_directory_uri() . "/assets/js/jquery-migrate-1.2.1.min.js", array('jquery-core'), null, true);



    wp_enqueue_script('jquery');

    wp_enqueue_script("flexslider", get_template_directory_uri() . "/assets/js/jquery.flexslider.js", ['jquery'], "1.0.0", true);
    wp_enqueue_script("doubletaptogo", get_template_directory_uri() . "/assets/js/doubletaptogo.js", ['jquery'], "1.0.0", true);
    wp_enqueue_script("init", get_template_directory_uri() . "/assets/js/init.js", ['jquery'], "1.0.0", true);
    wp_enqueue_script("modernizr", get_template_directory_uri() . "/assets/js/modernizr.js", ['jquery'], "1.0.0", false);
}

function themeMenu()
{
    register_nav_menu("top", "Меню в шапке сайта");
    register_nav_menu("bottom", "Меню в подвале сайта");
    add_theme_support('custom-logo');
    add_theme_support( 'post-thumbnails', array( 'post', 'portfolio', 'slider', 'team' ) );
}

function themeSidebar()
{
    register_sidebar([
        'name'          => "Виджеты справа",
        'id'            => "sidebar-right",
        'description'   => 'Сюда вставляй виджеты',
        'class'         => '',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => "</div>\n",
    ]);
    register_sidebar([
        'name'          => "Виджеты на главной",
        'id'            => "sidebar-index",
        'description'   => 'Сюда вставляй виджеты',
        'class'         => '',
        'before_widget' => '<div class="columns">',
        'after_widget'  => "</div>\n",
    ]);
    register_sidebar([
        'name'          => "Виджеты социальных иконок",
        'id'            => "sidebar-social",
        'description'   => 'Сюда вставляй виджеты',
        'class'         => '',
        'before_widget' => '<ul class="footer-social">',
        'after_widget'  => "</ul>\n",
    ]);
}

function register_post_types(){

	register_post_type( 'portfolio', [
		'label'  => null,
		'labels' => [
			'name'               => 'Портфолио', // основное название для типа записи
			'singular_name'      => 'Портфолио', // название для одной записи этого типа
			'add_new'            => 'Добавить Портфолио', // для добавления новой записи
			'add_new_item'       => 'Добавление Портфолио', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Портфолио', // для редактирования типа записи
			'new_item'           => 'Новое Портфолио', // текст новой записи
			'view_item'          => 'Смотреть Портфолио', // для просмотра записи этого типа.
			'search_items'       => 'Искать Портфолио', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Портфолио', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','excerpt','thumbnail' ], // 'title','editor','author','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
	register_post_type( 'slider', [
		'label'  => null,
		'labels' => [
			'name'               => 'Слайдер', // основное название для типа записи
			'singular_name'      => 'Слайдер', // название для одной записи этого типа
			'add_new'            => 'Добавить Слайдер', // для добавления новой записи
			'add_new_item'       => 'Добавление Слайдер', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Слайдер', // для редактирования типа записи
			'new_item'           => 'Новое Слайдер', // текст новой записи
			'view_item'          => 'Смотреть Слайдер', // для просмотра записи этого типа.
			'search_items'       => 'Искать Слайдер', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Слайдер', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail' ], // 'title','editor','author','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
	register_post_type( 'team', [
		'label'  => null,
		'labels' => [
			'name'               => 'Сотрудник', // основное название для типа записи
			'singular_name'      => 'Сотрудник', // название для одной записи этого типа
			'add_new'            => 'Добавить Сотрудник', // для добавления новой записи
			'add_new_item'       => 'Добавление Сотрудник', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Сотрудник', // для редактирования типа записи
			'new_item'           => 'Новое Сотрудник', // текст новой записи
			'view_item'          => 'Смотреть Сотрудник', // для просмотра записи этого типа.
			'search_items'       => 'Искать Сотрудник', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Сотрудник', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail' ], // 'title','editor','author','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}
