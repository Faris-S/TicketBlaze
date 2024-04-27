<?php
require_once __DIR__ . '/../dao/faqDao.class.php';

class faqService {
    private $faqDao;

    public function __construct() {
        $this->faqDao = new faqDao();
    }

    public function get_faq() {
        $rows = $this->faqDao->get_faq();
        return $rows;
    }

}