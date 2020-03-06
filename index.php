<?php require('core/init.php');

//Get template and assign variables
$template = new Template('templates/frontpage.php');

//Assign Vars 
$template->heading = 'This is the template heading';

//Display template 
echo $template;  // we can use echo object because we used __toString magic method
