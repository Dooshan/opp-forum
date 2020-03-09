<?php
/*
 * Get # replies of topic
 */
function replyCount($topic_id)
{
    $db = new Database;
    $db->query('SELECT * FROM replies WHERE topic_id = :topic_id');
    $db->bind(':topic_id', $topic_id);
    //Assign Rows
    $rows = $db->resultSet();
    //Get Count
    return $db->rowCount();
}

function getCategories() {
    $db = new Database;
    $db->query('SELECT * FROM categories');
    $results = $db->resultSet();
    return $results;
}