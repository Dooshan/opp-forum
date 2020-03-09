<?php
//URL format  

function urlFormat($str)
{
    //Strip out all whitespace 
    $str = preg_replace('/\s*/', '', $str);
    //Convert the string to all lowercase 
    $str = strtolower($str);
    //URL Encode 
    $str = urlencode($str);
    return $str;
}

//Format Date 
function formatDate($date)
{
    $date = date(" <b>F</b> j, Y, g:i a ", strtotime($date));
    // F - A full textual representation of a month (January through December)
    // j - The day of the month without leading zeros (1 to 31)
    // Y - A four digit representation of a year
    // g - 12-hour format of an hour (1 to 12)
    // i - Minutes with leading zeros (00 to 59)
    // a - Lowercase am or pm

    //strtotime($date)   convert an English textual date-time description to a UNIX

    return $date;
}

/*
 * Add classname if category is active
 *
 */
function is_active($category) {
    if(isset($_GET['category'])){
        if($_GET['category'] == $category) {
            return 'active';
        } else {
            return '';
        }
    }
    else {
        if ($category == null) {
            return 'active';
        }
    }

}

