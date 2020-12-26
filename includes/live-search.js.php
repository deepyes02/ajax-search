<?php

/**
 * A mostly static page. We do however, have to supply one of the functions
 * with a valid url, lets see what this is doing
 */
header('Content-type:text/javascript');
include_once('../includes/class-live-search.php');
$plugin_url = plugins_url();
$search_handler = $plugin_url . '/ajax_search_results.php';

?>
<script>

jQuery(document).ready(main);

function main(){
    jQuery('#search-2').append('<div id="ajax_search_results_go_here"></div>');
    //listen for changes in search field
    jQuery('#search-form-1').keyup(get_search_results);
}

function get_search_results(){
    let search_query = jQuery('#search-form-1').val();
    if(search_query != "" && search_query.length > 2) {
        jQuery.get("./ajax_search_results.php", {s:search_query}, write_results_to_page );
    } else {
        console.log('Search term empty or too short');
    }
}

function write_results_to_page(){
    if (status == 'error'){
        let msg = 'Sorry but there was an error';
        console.error(msg + xhr.status + " " + xhr.statusText);
    } else {
        jQuery('#ajax_search_results_go_here').html(data);
    }
}

</script>