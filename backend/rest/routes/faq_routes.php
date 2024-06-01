<?php

require __DIR__ . "/../services/faqService.class.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
 * @OA\Get(
 *      path="/faq",
 *      tags={"faq"},
 *      summary="Get all faq",
 *      security={{"ApiKey": {}}},
 *      @OA\Response(
 *          response=200,
 *          description="Array of all active faq in the database",
 *      ),
 *     @OA\Response(
 *         response=401,
 *        description="Token not provided"
 *    ),
 * )
 */
Flight::route("GET /faq", function(){
    try {
        $token = Flight::request()->getHeader('Authentication');
        if (!$token){
            Flight::halt(401, 'Token not provided');
        }
        $decoded = JWT::decode($token, new Key(JWT_SECRET, "HS256"));
    } catch (Exception $e) {
        Flight::halt(401, $e->getMessage());
    }

    $faqService = new faqService();
    $data = $faqService->get_faq();
    echo json_encode($data);
});