<?php
class User
{
    //Init DB variable 
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {

        //insert query
        $this->db->query('INSERT INTO users (name, email, avatar, username, password, about, last_activity)                    
                         VALUES (:name, :email, :avatar, :username, :password, :about, :last_activity)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':avatar', $data['avatar']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':about', $data['about']);
        $this->db->bind(':last_activity', $data['last_activity']);

        //Execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        //echo $this->db->lastInsertId();
    }

    public function uploadAvatar()
    {
        $allowedExts = ['gif', 'jpeg', 'jpg', 'png'];
        $temp = explode('.', $_FILES['avatar']['name']);
        $extension = end($temp);

        if ((($_FILES['avatar']['type'] == 'image/gif')
                || ($_FILES['avatar']['type'] == 'image/jpeg')
                || ($_FILES['avatar']['type'] == 'image/jpg')
                || ($_FILES['avatar']['type'] == 'image/pjpeg')
                || ($_FILES['avatar']['type'] == 'image/x-png')
                || ($_FILES['avatar']['type'] == 'image/png'))
            && ($_FILES['avatar']['size'] < 1000000)
            && in_array($extension, $allowedExts)
        ) {
            if ($_FILES['avatar']['error'] > 0) {
                redirect('register.php', $_FILES['avatar']['error'], 'error');
            } else {
                if (file_exists('images/avatar/' .  $_FILES['avatar']['name'])) {
                    redirect('register.php', 'File already exists', 'error');
                } else {
                    move_uploaded_file($_FILES['avatar']['tmp_name'], 'images/avatar/' . $_FILES['avatar']['name']);
                    return true;
                }
            }
        } else {
            redirect('register.php', 'Invalid file type ', 'error');
        }
    }
}
