<?php
require_once __DIR__ . '/../dao/authDao.class.php';

class authService {
    private $authDao;

    public function __construct() {
        $this->authDao = new authDao();
    }

    public function get_user_by_email($email) {
        return $this->authDao->get_user_by_email($email);
    }

    public function add_user($user) {
        $user['password'] = password_hash($user['password'], PASSWORD_BCRYPT);
        return $this->authDao->add_user($user);
    }

}