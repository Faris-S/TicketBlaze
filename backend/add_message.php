<?php

require_once __DIR__ . '/rest/services/ticketsService.class.php';

$ticketId = $_POST['ticketId'];
$message = $_POST['message'];
$sent_at = date('Y-m-d H:i:s');
$sent_by = $_POST['sent_by'];


$message = array(
    'ticket_id' => $ticketId,
    'message' => $message,
    'sent_at' => $sent_at,
    'sent_by' => $sent_by
);

echo json_encode($message);

$ticketsService = new ticketsService();

$ticketsService->add_message($message);