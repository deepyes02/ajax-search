<?php

/**
 * A mostly static page. We do however, have to supply one of the functions
 * with a valid url, lets see what this is doing
 */
header('Content-type:text/javascript');
include_once('./class-live-search.php');
$plugin_url = plugins_url();
$search_handler = $plugin_url . '/live-search/ajax_search_results.php';
?>
<script>
jQuery(document).ready(main);

function main(){
    jQuery('#search-2').append('<div id="ajax_search_results_go_here"></div>');
    //listen for changes in search field
    jQuery('#search-form-1').keyup(get_search_results);
}

function get_search_results(){
    // console.log(search_letter.innerText);
    let search_letter = document.querySelector('.search-form label');
    search_letter.innerText = "Searching...";
    let search_query = jQuery('#search-form-1').val();
    if(search_query != "" && search_query.length > 2) {
        search_letter.innerText = "Searching...";
        let mydumper = jQuery.get('/wp-content/plugins/live-search/ajax_search_results.php', {s:search_query}, write_results_to_page );
        // console.log(mydumper);
    } else {
        search_letter.innerText = "Type at least 3 letter to search...";
        console.log('Search term empty or too short');
    }
}

function write_results_to_page(data,status, xhr){
    let search_letter = document.querySelector('.search-form label');
    if (status == 'error'){
        let msg = 'Sorry but there was an error';
        console.error(msg + xhr.status + " " + xhr.statusText);
    } else {
        jQuery('#ajax_search_results_go_here').html(data);
        search_letter.innerText = "Search Results";
    }
}
</script>
