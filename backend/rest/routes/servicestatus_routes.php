<?php

require_once __DIR__ . '/../services/servicestatusService.class.php';

/**
 * @OA\Get(
 *      path="/service-status",
 *      tags={"service-status"},
 *      summary="Get the most recent service-status entries",
 *      security={{"ApiKey": {}}},
 *      @OA\Response(
 *          response=200,
 *          description="Recent service-status entry data",
 *      ),
 *     @OA\Response(
 *        response=401,
 *       description="Token not provided"
 *  ),
 * )
 */

Flight::route('GET /service-status', function(){
    $servicestatusService = new servicestatusService();
    $data = $servicestatusService->get_servicestatus();
    echo json_encode($data);
});