<?php

require __DIR__ . "/../services/faqService.class.php";

/**
 * @OA\Get(
 *      path="/faq",
 *      tags={"faq"},
 *      summary="Get all faq",
 *      @OA\Response(
 *          response=200,
 *          description="Array of all active faq in the database",
 *      ),
 * )
 */
Flight::route("GET /faq", function(){
    $faqService = new faqService();
    $data = $faqService->get_faq();
    echo json_encode($data);
});