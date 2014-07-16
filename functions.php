<?php

//去除头部冗余代码
remove_action( 'wp_head', 'feed_links_extra', 3 ); 
remove_action( 'wp_head', 'rsd_link' ); 
remove_action( 'wp_head', 'wlwmanifest_link' ); 
remove_action( 'wp_head', 'index_rel_link' ); 
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); 
remove_action( 'wp_head', 'wp_generator' ); 


//隐藏admin Bar
add_filter('show_admin_bar', create_function($flag, 'return false;'));


//Gzip压缩
function initGzip() {
    if ( strstr($_SERVER['REQUEST_URI'], '/js/tinymce') )
        return false;
    if ( ( ini_get('zlib.output_compression') == 'On' || ini_get('zlib.output_compression_level') > 0 ) || ini_get('output_handler') == 'ob_gzhandler' )
        return false;
    if (extension_loaded('zlib') && !ob_start('ob_gzhandler'))
        ob_start();
}
add_action('init','initGzip'); 


//移除googlefont，因为天朝的屏蔽导致进入后台巨慢
function remove_open_sans() {
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
    wp_enqueue_style('open-sans','');
}
add_action('init','remove_open_sans');


/**
 * 自定义分页导航
 * @param  $range: 最大显示几页
 */
function getPagination($range = 9){
    global $paged, $wp_query;
    if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
    if($max_page > 1){if(!$paged){$paged = 1;}
    if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "'>最新</a>";}
    previous_posts_link('上页');
    if($max_page > $range){
        if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
        if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
        for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
        if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
        for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
    if($i==$paged) echo " class='current'";echo ">$i</a>";}}
    next_posts_link('下页');
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "'>最旧</a>";}}
}


//获取头像($param为用户email或者用户id)
function getAvatarUrl($param){ 
    $p = get_bloginfo('template_directory').'/img/avatar.jpg';
    if($param == '') {
        return $p;
    } else {
        preg_match("/src='(.*?)'/i", get_avatar( $param, '150'), $matches);
        return $matches[1];
    }
}

?>