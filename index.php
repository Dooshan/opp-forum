<?php require('core/init.php');

$topic = new Topic;

//Get template and assign variables
$template = new Template('templates/frontpage.php');

//Assign Vars 
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();


//Display template 
echo $template;  // we can use echo object because we used __toString magic method
