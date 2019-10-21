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
	
function my_jpeg_quality($arg)
{
return (int)100;
}
add_filter('jpeg_quality', 'my_jpeg_quality');
add_filter( 'wp_image_editors', 'wp_default_image_editor' );
add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
) );

remove_action('wp_head', 'wp_generator'); // Убирает вывод используемого движка и его версии/Removes the output of the used engine and its version
remove_action('wp_head', 'rel_canonical'); // Убирает канонические линки/Removes canonical links
remove_action('wp_head', 'wp_shortlink_wp_head'); // Убирает короткую ссылку к текущей странице/Removes a short link to the current page
remove_action('wp_head', 'wlwmanifest_link'); // Используется блог-клиентами, а вернее лишь одним из них - Windows Live Writer. Не используете WLW - удаляйте.
remove_action('wp_head', 'rsd_link'); // Используется различными блог-клиентами или веб-сервисами для публикации/изменения записей в блоге.
remove_action('wp_head', 'pagenavi_css'); // Убирает вывод лишнего css изи плагина WP-PageNavi/Removes the output of excess css from the WP-PageNavi plugin
remove_action('wp_head', 'index_rel_link'); // Убирает ссылку на главную страницу/Removes the link to the main page
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Убирает ссылку на предыдущую запись/Removes the link to the previous entry
remove_action('wp_head', 'start_post_rel_link', 10, 0);  // Убирает ссылку на первую запись/Removes the link to the first entry
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Убирает связь с родительской записью/Removes the link to the parent entry
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); //Убирает ссылку на следующую запись/Removes the link to the next entry
remove_action('wp_head', 'feed_links_extra', 3); //Запрещаем вывод RSS фида для записей, тегов, рубрик и т.д./We prohibit the output of the RSS feed for posts, tags, categories, etc.
remove_action('wp_head', 'feed_links', 2); 
//полное отключение Emoji / complete shutdown emoji
remove_action('wp_head', 'print_emoji_detection_script', 7); 
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
// убираем meta rel='dns-prefetch' href='//s.w.org'   / remove meta
remove_action( 'wp_head', 'wp_resource_hints', 2 );
?>
