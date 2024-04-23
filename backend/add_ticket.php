<?php

require_once __DIR__ . '/rest/services/ticketsService.class.php';

$subject = $_POST['subject'];
$department = $_POST['department'];
$importance = $_POST['importance'];
$sender_id = 5;

$ticket = array(
    'subject' => $subject,
    'department' => $department,
    'importance' => $importance,
    'sender_id' => $sender_id
);


$ticketsService = new ticketsService();

$data = $ticketsService->add_ticket($ticket);

echo json_encode($data);