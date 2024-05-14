<?php

require_once __DIR__ . '/../services/newsService.class.php';

/**
 * @OA\Get(
 *      path="/news",
 *      tags={"news"},
 *      summary="Get all news",
 *      @OA\Response(
 *          response=200,
 *          description="Array of all active news in the database",
 *      ),
 * )
 */

Flight::route('GET /news', function(){
    $newsService = new newsService();
    $data = $newsService->get_news();
    echo json_encode($data);
});