<?php require_once('core/init.php');
$topic = new Topic;

// Get category from url 
$category = isset($_GET['category']) ? ($_GET['category']) : null;
// Get user from url 
$user_id = isset($_GET['user']) ? ($_GET['user']) : null;

//Get template
$template = new Template('templates/topics.php');

//Assign template Variables 
//check for category filter 
if (isset($category)) {
    $template->topics = $topic->getByCategory($category);
    $template->title = 'Post in " ' . $topic->getCategory($category)->name . ' " ';
}

//check for user filter 
if (isset($user_id)) {
    $template->topics = $topic->getByUser($user_id);
    //$template->title = "Post by " . $user->getUser($user_id)->username;
}

if (!isset($category) && !isset($user_id)) {
    $template->topics = $topic->getAllTopics();
}
//Assign Vars 
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $topic->getTotalUser();

//Display template 
echo $template;  // we can use echo object because we used __toString magic method
