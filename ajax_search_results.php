<?php

if(!defined('WP_PLUGIN_URL')){
    require_once(realpath('../../../').'/wp-config.php');

}
// print_r(get_declared_classes());

if (empty($_GET['s'])){
    exit;
}
$max_posts = 3;
$wp_query = new WP_Query();
$wp_query->query(array('s'=>$_GET['s'], 'showposts'=>$max_posts));

foreach($wp_query->posts as $result){
    print_r($result);
}