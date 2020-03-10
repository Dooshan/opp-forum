<?php require_once ('core/init.php'); ?>

<?php 
//Create topic object 
$topic = new Topic;
$topic_id = $_GET['id'];

//Get template and assign variables
$template = new Template('templates/_topic.php');

//Assign Vars 
$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)->title;


//Display template 
echo $template;  // we can use echo object because we used __toString magic method
