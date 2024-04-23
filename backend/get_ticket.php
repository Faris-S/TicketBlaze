<?php

require_once __DIR__ . '/rest/services/ticketsService.class.php';

$ticketsService = new ticketsService();

$ticketId = $_GET['ticketId'] ?? NULL;

$data = $ticketsService->get_ticket($ticketId);

echo json_encode($data);