<?php
require_once __DIR__ . '/../dao/ticketsDao.class.php';

class ticketsService {
    private $ticketsDao;

    public function __construct() {
        $this->ticketsDao = new ticketsDao();
    }

    public function get_tickets($userId) {
        $rows = $this->ticketsDao->get_tickets($userId);
        return $rows;
    }

    public function get_messages($ticketId) {
        $rows = $this->ticketsDao->get_messages($ticketId);
        return $rows;
    }

    public function get_ticket($ticketId) {
        $rows = $this->ticketsDao->get_ticket($ticketId);
        return $rows;
    }

    public function add_message($message){
        return $this->ticketsDao->add_message($message);
    }

    public function add_ticket($ticket){
        return $this->ticketsDao->add_ticket($ticket);
    }

}