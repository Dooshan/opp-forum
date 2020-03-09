<?php
/*
 *  Template Class
 *  Creates a template/view object
 */

class Template
{
    //Path to Template 
    protected $template;
    //Variable passed in 
    protected $vars = [];

    //Class Constructor 
    public function __construct($template)
    {
        $this->template = $template;
    }

    //Get template variables 
    public function __get($key) {
        return $this->vars[$key];
    }

    //Set template variables 
    public function __set($key, $value)             
    {
        $this->vars[$key] = $value;
    }

    // Convert Object to string    
    public function __toString()
    {
        extract($this->vars); // if is an associative array. This function treats keys as variable names and values as variable values. 
        chdir(dirname($this->template)); //Change directory (Returns directory name component of path)
        ob_start(); //Turn on output buffering

        /* Output buffering is a way to tell PHP to hold some data before it is sent to the browser. 
         * Then you can retrieve the data and put it in a variable, 
         * manipulate it, and send it to the browser once you're finished.
         */
         

        include basename($this->template); // show only file name 
        return ob_get_clean(); //Get current buffer contents and delete current output buffer
    }

}
