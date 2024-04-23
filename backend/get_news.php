<?php

require_once __DIR__ . '/rest/services/newsService.class.php';

$newsService = new newsService();

$data = $newsService->get_news();

echo json_encode($data);