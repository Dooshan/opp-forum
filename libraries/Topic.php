<?php
class Topic{

    //init DB variable
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTopics()
    {
        $this->db->query("  SELECT topics.*, users.username, users.avatar, categories.name FROM topics
                            INNER JOIN users
                            ON topics.user_id = users.id
                            INNER JOIN categories
                            ON topics.category_id = categories.id
                            ORDER BY create_date DESC
                            ");

        $results = $this->db->resultSet();
        return $results;
    }

    public function getTotalTopics()
    {
        $this->db->query('SELECT * FROM topics');
        $rows = $this->db->resultSet();
        return $this->db->rowCount();
    }
    
    public function getTotalUser()
    {
        $this->db->query('SELECT * FROM users');
        $row = $this->db->resultSet();
        return $this->db->rowCount();
    }

    public function getTotalCategories()
    {
        $this->db->query('SELECT * FROM categories');
        $rows = $this->db->resultSet();
        return $this->db->rowCount();
    }

    public function getCategory($category_id)
    {
        $this->db->query('SELECT * FROM categories WHERE id = :category_id');
        $this->db->bind(':category_id', $category_id);
        //assign row 
        $row = $this->db->single();
        return $row;
    }

    public function getByCategory($category_id)
    {
        $this->db->query('SELECT topics.*, categories.*, users.username, users.avatar , categories.name FROM topics
                        INNER JOIN categories
                        ON topics.category_id = categories.id
                        INNER JOIN users
                        ON topics.user_id = users.id
                        WHERE topics.category_id = :category_id		
                        ');

        $this->db->bind(':category_id', $category_id);
        //Assign Result Set
        $results = $this->db->resultset();

        return $results;
    }

    public function getByUser($user_id)
    {
        $this->db->query('SELECT topics.*, categories.*, users.username, users.avatar FROM topics
                        INNER JOIN categories
                        ON topics.category_id = categories.id
                        INNER JOIN users
                        ON topics.user_id = users.id
                        WHERE topics.user_id = :user_id		
                        ');

        $this->db->bind(':user_id', $user_id);
        //Assign Result Set
        $results = $this->db->resultset();

        return $results;
    }

    public function getTopic($id)
    {
        $this->db->query('SELECT topics.*, users.username, users.avatar, users.name FROM topics
                        INNER JOIN users 
                        ON topics.user_id = users.id
                        WHERE topics.id = :id');

        $this->db->bind(':id', $id);
        //assign row 
        $row = $this->db->single();
        return $row;
    }


    public function getTotalReplies($topic_id)
    {
        $this->db->query('SELECT * FROM replies WHERE topic_id = '. $topic_id );
        $rows = $this->db->resultSet();
        return $this->db->rowCount();
    }

    public function getReplies($topic_id)
    {
        $this->db->query('SELECT replies.*, users.* FROM replies
                        INNER JOIN users 
                        ON replies.user_id = users.id
                        WHERE replies.topic_id = :topic_id
                        ORDER BY create_date ASC
                        ');

        $this->db->bind(':topic_id', $topic_id);
        //assign result set 
        $results = $this->db->resultSet();
        return $results;
    }
}
