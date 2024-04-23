<?php

require_once __DIR__ . '/rest/services/faqService.class.php';

$faqService = new faqService();

$data = $faqService->get_faq();

echo json_encode($data);