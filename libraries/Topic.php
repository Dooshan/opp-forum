<?php
class Topic
{
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
}
