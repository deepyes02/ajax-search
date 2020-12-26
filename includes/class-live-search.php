<?php

/**
 * 
 * class LiveSearch
 * 
 * Adds basic Ajax functionality to the built in wordpress search widget
 * 
 * displays options without user having to submit the form
 */


 class LiveSearch {
     const plugin_name = 'Live Search';
     const min_php_version = 6;
     
     
 /**
  * Adds the necessary js or css to the pages to enable ajax search
  */
     public static function head() {
        if(self::_is_searchable_page()){
            $search_handler_url = plugins_url('ajax_search_results.php', dirname(__FILE__));
            include('live-search.js.php');
        }
     }
       /**
   * The main function for this plugin, similar to __construct()
   */
   public static function initialize() {
       Test::min_php_version(self::min_php_version, self::plugin_name);
       if(self::_is_searchable_page()){
           wp_enqueue_script('jquery');
           $src = plugins_url('css/live-search.css',dirname(__FILE__));
           wp_register_style('live-search-style', $src);
           wp_enqueue_style('live-search-style');
       }
   }
/**
* @return boolean simple true/false to see if page is searchable
*/
   private static function _is_searchable_page(){
       if (is_admin()){
           return false;
       } else {
           return true;
       }

   }

 }


