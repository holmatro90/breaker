<?php

add_action('init', 'register_post_types');
function register_post_types(){
register_post_type('videos', array(
'labels' => array(
'name' => __( 'Videos' ),
'singular_name' => __( 'Video' ),
'add_new'            => 'Add new videos', // для добавления новой записи
'add_new_item'       => 'Add new videos', // заголовка у вновь создаваемой записи в админ-панели.
'edit_item'          => 'Edit videos', // для редактирования типа записи
'new_item'           => 'New videos', // текст новой записи
'view_item'          => '', // для просмотра записи этого типа.

),
'description'         => '',
'public'              => true,
'publicly_queryable'  => true,
'exclude_from_search' => true,
'show_ui'             => true,
'show_in_menu'        => true, // показывать ли в меню адмнки
'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
'show_in_nav_menus'   => null,
'show_in_rest'        => true, // добавить в REST API. C WP 4.7
'rest_base'           => null, // $post_type. C WP 4.7
'menu_position'       => null,
'menu_icon'           => 'dashicons-video-alt3',
'capability_type'   => 'post',
//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
'hierarchical'        => true,
'supports'            => array('title','editor','custom-fields','thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
'taxonomies'          => array('directors'),
'has_archive'         => true,
'rewrite'             => true,
'query_var'           => true,
) );


	register_post_type('contacts', array(
		'labels' => array(
			'name' => __( 'Contacts' ),
			'singular_name' => __( 'Contact' ),
			'add_new'            => 'Add new contacts', // для добавления новой записи
			'add_new_item'       => 'Add new contacts', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit contacts', // для редактирования типа записи
			'new_item'           => 'New contacts', // текст новой записи
			'view_item'          => '', // для просмотра записи этого типа.

		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'show_ui'             => true,
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null,
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-phone',
		'capability_type'   => 'post',
//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => true,
		'supports'            => array('title','editor','custom-fields','thumbnail','tag'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => null,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}





add_action('init', 'create_taxonomy');
function create_taxonomy(){
// заголовки
// весь список: http://wp-kama.ru/function/get_taxonomy_labels
$labels = array(
'name'              => 'Directors',
'singular_name'     => 'Director',
'search_items'      => 'Search Directors',
'all_items'         => 'All Directors',
'parent_item'       => 'Parent Director',
'parent_item_colon' => 'Parent Director:',
'edit_item'         => 'Edit Director',
'update_item'       => 'Update Director',
'add_new_item'      => 'Add New Director',
'new_item_name'     => 'New Director Name',
'menu_name'         => 'Director',
);
// параметры
$args = array(
'label'                 => '', // определяется параметром $labels->name
'labels'                => $labels,
'description'           => '', // описание таксономии
'public'                => true,
'publicly_queryable'    => null,
'show_in_nav_menus'     => true,
'show_ui'               => true,
'show_tagcloud'         => true,
'show_in_rest'          => null,
'rest_base'             => null,
'hierarchical'          => true,
'update_count_callback' => '',
'rewrite'               => true,
//'query_var'             => $taxonomy, // название параметра запроса
'capabilities'          => array(),
'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
'_builtin'              => false,
'show_in_quick_edit'    => null, // по умолчанию значение show_ui
);
register_taxonomy('directors', array('videos'), $args );
}
