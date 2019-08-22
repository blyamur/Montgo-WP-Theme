<?php
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 просмотров";
    }
	echo _e(' ', 'dot-b');
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function wp_default_image_editor( $editors ) {
    $gd_editor = 'WP_Image_Editor_GD';
    $editors = array_diff( $editors, array( $gd_editor ) );
    array_unshift( $editors, $gd_editor );
    return $editors;
}
add_filter( 'wp_image_editors', 'wp_default_image_editor' );
add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
) );

remove_action('wp_head', 'wp_generator'); // Убирает вывод используемого движка и его версии
remove_action('wp_head', 'rel_canonical'); // Убирает канонические линки
remove_action('wp_head', 'wp_shortlink_wp_head'); // Убирает короткую ссылку к текущей странице
remove_action('wp_head', 'wlwmanifest_link'); // Используется блог-клиентами, а вернее лишь одним из них - Windows Live Writer. Не используете WLW - удаляйте.
remove_action('wp_head', 'rsd_link'); // Используется различными блог-клиентами или веб-сервисами для публикации/изменения записей в блоге.
remove_action('wp_head', 'pagenavi_css'); // Убирает вывод лишнего css изи плагина WP-PageNavi
remove_action('wp_head', 'index_rel_link'); // Убирает ссылку на главную страницу
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Убирает ссылку на предыдущую запись
remove_action('wp_head', 'start_post_rel_link', 10, 0);  // Убирает ссылку на первую запись
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Убирает связь с родительской записью
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Убирает ссылку на следующую запись
remove_action('wp_head', 'feed_links_extra', 3); // Запрещаем вывод RSS фида для записей, тегов, рубрик и т.д. 
remove_action('wp_head', 'feed_links', 2); 
//полное отключение Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7); 
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
// Код ниже избавляет от wp-json и oembed
add_filter('rest_enabled', '__return_false'); // Отключаем сам REST API
// Отключаем фильтры REST API
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );
// Отключаем события REST API
remove_action( 'init', 'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );
// Отключаем Embeds связанные с REST API
remove_action( 'rest_api_init', 'wp_oembed_register_route');
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
remove_action('wp_head', 'wp_oembed_add_host_js'); 
// убираем meta rel='dns-prefetch' href='//s.w.org'
remove_action( 'wp_head', 'wp_resource_hints', 2 );
?>