<?php
require_once __DIR__ . '/../dao/newsDao.class.php';

class newsService {
    private $newsDao;

    public function __construct() {
        $this->newsDao = new newsDao();
    }

    public function get_news() {
        $rows = $this->newsDao->get_news();
        return $rows;
    }

}