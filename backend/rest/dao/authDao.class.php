<?php

require_once __DIR__ . '/BaseDao.class.php';

class authDao extends BaseDao {
    public function __construct() {
        parent::__construct("users");
    }


    public function get_user_by_email($email) {
        return $this->query_unique("SELECT * FROM users WHERE email = :email", ["email" => $email]);
    }

    public function add_user($user) {
        try {
            return $this->query_unique("INSERT INTO users (name, surname, email, password) VALUES (:name, :surname, :email, :password)", $user);
        } catch (Exception $e) {
            Flight::halt(500, 'Error while registering the user (the email is probably already in use)')
            ;
        }
    }
}
