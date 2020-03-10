<?php

/*
 * Redirect to page 
 */
function redirect($page = FALSE, $message = NULL, $message_type = NULL)
{
    if (is_string($page)) {
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME']; // $PHP_SELF is deprecated and should not be used because it will not work without register_globals being enabled
    }

    //Check for Message
    if ($message != NULL) {
        //Set message 
        $_SESSION['message'] = $message;
    }
    //Check for type
    if ($message_type != NULL) {
        //Set message type
        $_SESSION['message_type'] = $message_type;
    }
    header('Location: ' . $location);
    exit();
}

/*
 * Display Message
 */
function displayMessage()
{
    if (!empty($_SESSION['message'])) {
        //Assign message variables
        $message = $_SESSION['message'];

        if (!empty($_SESSION['message_type'])) {
            //assign type var 
            $message_type = $_SESSION['message_type'];
            //create output
            if ($message_type == 'error') {
                echo '<div class="alert alert-danger">' . $message . '</div>';
            } else {
                echo '<div class="alert alert-success">' . $message . '</div>';
            }
        }

        //unset message 
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } else {
        echo '';
    }
}
