<?php require('core/init.php');

$topic = new Topic;
// Get category from url 
$category = isset($_GET['category']) ? ($_GET['category']) : null; 


//Get template and 
$template = new Template('templates/topics.php');

//Assign template Varibales 
if(isset($category)) {
    $template->topics = $topic->getByCategory($category);
    $template->title = 'Post in " '. $topic->getCategory($category)->name. ' " '  ;
} else {
    $template->topics = $topic->getAllTopics();
}

//Assign Vars 

$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();

//Display template 
echo $template;  // we can use echo object because we used __toString magic method