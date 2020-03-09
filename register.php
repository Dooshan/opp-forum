<?php require('core/init.php');

//Get template and assign variables
$template = new Template('templates/register.php');

//Assign Vars 


//Display template 
echo $template;  // we can use echo object because we used __toString magic method