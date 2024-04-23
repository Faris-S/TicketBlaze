<?php
require_once __DIR__ . '/BaseDao.class.php';

class TicketsDao extends BaseDao {
    public function __construct() {
        parent::__construct("tickets");
    }

    public function get_tickets() {
        $query = "SELECT * FROM tickets";
        return $this->query($query, []);
    }

    public function get_messages($ticketId) {
        $query = "SELECT * FROM messages WHERE ticket_id = :ticket_id ORDER BY id;";
        return $this->query($query, [':ticket_id' => $ticketId]);
    }

    public function get_ticket($ticketId) {
        $query = "SELECT * FROM tickets WHERE id = :ticket_id";
        return $this->query_unique($query, [':ticket_id' => $ticketId]);
    }

    public function add_message($message){
        $query = "INSERT INTO messages (ticket_id, message, sent_at, sent_by) VALUES (:ticket_id, :message, :sent_at, :sent_by)";
        return $this->query($query, [
            'ticket_id' => $message['ticket_id'],
            'message' => $message['message'],
            'sent_at' => $message['sent_at'],
            'sent_by' => $message['sent_by']
        ]);
        return $message;
    }

    public function add_ticket($ticket){
        $query = "INSERT INTO tickets (subject, department, importance, sender_id) VALUES (:subject, :department, :importance, :sender_id)";
        $this->query($query, [
            'subject' => $ticket['subject'],
            'department' => $ticket['department'],
            'importance' => $ticket['importance'],
            'sender_id' => $ticket['sender_id']
        ]);
        return $this->conn->lastInsertId();
    }
}