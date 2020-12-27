<?php
/**
 * class Test
 * 
 * Basic Library for runtime test
 */

 if(!class_exists('Test')){
     class Test {
         /**
          * min php version
          * @param $min_php_version string min required php version, 5.6
          * @param $plugin_name string Name of the plugin for messageing purposes
          * @return none Exit with message if php is old
          */

          static function min_php_version($min_php_version, $plugin_name){
              $php_version = phpversion();
              $exit_msg = "The plugin '$plugin_name' requires PHP '$min_php_version' or newer, contact your system administrator about updating PHP. Use your browser to go back to the previous page. You are running on '$php_version'";
              if (version_compare(phpversion(), $min_php_version, '<')){
                  exit ($exit_msg);
              }
          }
          

     }
 }