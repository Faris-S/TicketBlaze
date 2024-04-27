<?php

require_once __DIR__ . '/rest/services/ticketsService.class.php';


$ticketId = $_GET['ticketId'] ?? NULL;

$ticketsService = new ticketsService();

$data = $ticketsService->get_messages($ticketId);

echo json_encode($data);