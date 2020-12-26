<?php

/**
 * PLUGIN NAME: live search
 * Author: Deepesh Dhakal
 * Description: Enable live search using Ajax
 * Version: 1.0.0
 * 
 * 
 */

 //include() or require() any necessary files here
include_once('tests/test.php'); //tests whether php is greater than 5
include_once('includes/class-live-search.php');


add_action('init', 'LiveSearch::initialize');
add_action('wp_head', 'LiveSearch::head');

 //tie into wordpress hooks and any functions that should run on load

 /*EOF*/

