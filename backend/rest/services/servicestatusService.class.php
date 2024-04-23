<?php
require_once __DIR__ . '/../dao/servicestatusDao.class.php';

class servicestatusService {
    private $servicestatusDao;

    public function __construct() {
        $this->servicestatusDao = new servicestatusDao();
    }

    public function get_servicestatus() {
        $rows = $this->servicestatusDao->get_servicestatus();
        return $rows;
    }

}