<?php
require_once __DIR__ . '/BaseDao.class.php';

class faqDao extends BaseDao {
    public function __construct() {
        parent::__construct("faq");
    }

    public function get_faq() {
        $query = "SELECT * FROM faq WHERE active = 1";
        return $this->query($query, []);
    }
}