<?php

if(!defined('WP_PLUGIN_URL')){
    require_once(realpath('../../../').'/wp-config.php');
}
// print_r(get_declared_classes());
if (empty($_GET['s'])){
    echo "Please add <?s>=<string> to search for the term you want";
    exit;
}
$max_posts = 10;
$wp_query = new WP_Query();
$wp_query->query(array('s'=>$_GET['s'], 'showposts'=>$max_posts));
//if there are no results
if(!count($wp_query->posts)){
    print file_get_contents('templates/no_results.tpl');
    exit;
}

//otherwise show the results;

$container = array('content'=>'');//define container's only placeholder
$single_tpl = file_get_contents('templates/single_result.tpl');
foreach($wp_query->posts as $result){
    // echo($result->post_title);
    $result->permalink = get_permalink($result->ID);
    $container['content'] .= parse($single_tpl, $result);
}

//wrap the results
$result_container_tpl = file_get_contents('templates/results_container.tpl');
print parse($result_container_tpl, $container);

/**
 * parse
 * a simple parsing function for basic templating
 * 
 * @param $tpl string A formatting string containing [+placeholders+];
 * @param $hash array An associative array containing keys and values, eg array('key'=>'value')
 * @return string Placeholdders corresponding to the keys of the has will be replaced with the
 * values the resulting string will be returned to
 */

 function parse($tpl, $hash){
     foreach ($hash as $key => $value){
         $tpl = str_replace('[+'.$key.'+]', $value, $tpl);
     }
     return $tpl;
 }

