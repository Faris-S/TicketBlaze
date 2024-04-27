<?php
require_once __DIR__ . '/BaseDao.class.php';

class newsDao extends BaseDao {
    public function __construct() {
        parent::__construct("news");
    }

    public function get_news() {
        $query = "SELECT * FROM news WHERE active = 1";
        return $this->query($query, []);
    }
}