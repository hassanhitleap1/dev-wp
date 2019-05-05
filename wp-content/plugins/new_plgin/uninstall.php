<?php
/**
 * the run when allow run 
 * 
 * @package new_plgin
 */

defined('WP_UNINSTALL_PLUGIN') or die('');


//clear database data the first way   
$books=get_post(['psot_type'=>'book','numberposts'=>-1]);
foreach ($posts as $book) {
    # code...
    wp_delete_post($book->ID,false); /// ture truch 
}


//clear database data the secound way    

// acess to gloubl db 
global $wpdb;

$wpdb->query("delete from wp_posts where post_type='book'");
$wpdb->query("delete from wp_postmeta where post_id not in(select id from  wp_posts')");

$wpdb->query("delete from wp_term_relationships where object_id not in(select id from  wp_posts')");



?>
