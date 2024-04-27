<?php

require_once __DIR__ . '/rest/services/ticketsService.class.php';

$ticketsService = new ticketsService();

$data = $ticketsService->get_tickets();

echo json_encode($data);