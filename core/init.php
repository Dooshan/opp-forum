<?php
session_start();

// Include Configuration
require_once ('config/config.php');

// Helper Functions Files   
require_once ('helpers/system_helper.php');
require_once ('helpers/db_helper.php');
require_once ('helpers/format_helper.php');


//Autoload Classes
/*  function __autoload ($class_name) {  
 *        require_once ('libraries/'. $class_name. '.php' );
 *   } THIS METHOD DEPRECATED
 */

spl_autoload_register(function ($class) {
    require_once ('libraries/' . $class . '.php');
});
