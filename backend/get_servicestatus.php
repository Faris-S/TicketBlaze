<?php

require_once __DIR__ . '/rest/services/servicestatusService.class.php';

$servicestatusService = new serviceStatusService();

$data = $servicestatusService->get_servicestatus();

echo json_encode($data);