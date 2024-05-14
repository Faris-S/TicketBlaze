<?php

/**
 * @OA\Info(
 *   title="TicketBlaze API",
 *   description="APIs for the TicketBlaze application",
 *   version="1.0",
 *   @OA\Contact(
 *     email="faris.selimovic@stu.ibu.edu.ba",
 *     name="Faris Selimovic"
 *   )
 * ),
 * @OA\OpenApi(
 *   @OA\Server(
 *       url=BASE_URL
 *   )
 * )
 * @OA\SecurityScheme(
 *     securityScheme="ApiKey",
 *     type="apiKey",
 *     in="header",
 *     name="Authentication"
 * )
 */
