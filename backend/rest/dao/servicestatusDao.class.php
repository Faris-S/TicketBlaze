<?php
require_once __DIR__ . '/BaseDao.class.php';

class servicestatusDao extends BaseDao {
    public function __construct() {
        parent::__construct("service_status");
    }

    public function get_servicestatus() {
        $query = "SELECT * FROM service_status ORDER BY timestamp DESC LIMIT 1";
        return $this->query($query, []);
    }
}