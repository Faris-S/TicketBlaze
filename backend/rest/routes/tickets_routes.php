<?php

require_once __DIR__ . '/../services/ticketsService.class.php';

Flight::group('/tickets', function(){

    
/**
 * @OA\Get(
 *      path="/tickets/all",
 *      tags={"tickets"},
 *      summary="Get all tickets",
 *      @OA\Response(
 *          response=200,
 *          description="Array of all tickets in the database",
 *      ),
 * )
 */

    Flight::route('GET /all', function(){
        $ticketsService = new ticketsService();
        $data = $ticketsService->get_tickets();
        echo json_encode($data);
    });

/**
 * @OA\Get(
 *      path="/tickets/{ticketId}",
 *      tags={"tickets"},
 *      summary="Get a specific ticket",
 *      @OA\Response(
 *          response=200,
 *          description="Data of the ticket with the specified id in the database or false if the ticket does not exist",
 *      ),
 *      @OA\Parameter(@OA\Schema(type="number"), in="path", name="ticketId", required=true, description="Ticket Id"),
 * )
 */
    
    Flight::route('GET /@ticketId', function($ticketId){
        $ticketsService = new ticketsService();
        $data = $ticketsService->get_ticket($ticketId);
        echo json_encode($data);
    });

/**
 * @OA\Post(
 *      path="/tickets/add",
 *      tags={"tickets"},
 *      summary="Add a new ticket",
 *      @OA\Response(
 *          response=200,
 *          description="Add the ticket to the database and return the data of the added ticket or false if the ticket could not be added",
 *      ),
 *      @OA\RequestBody(
 *          description="Ticket object that needs to be added to the database",
 *          @OA\JsonContent(
 *              @OA\Property(property="subject", type="string", example="Hardware issues on PC", description="Ticket subject"),
 *              @OA\Property(property="department", type="number", example="1", description="Department id"),
 *              @OA\Property(property="importance", type="string", example="High", description="Ticket importance")
 *        )
 *      )
 * )
 */
    
    Flight::route('POST /add', function(){
        $ticketsService = new ticketsService();
    
        $subject = Flight::request()->data->subject;
        $department = Flight::request()->data->department;
        $importance = Flight::request()->data->importance;
        $sender_id = 5;
    
        $ticket = array(
            'subject' => $subject,
            'department' => $department,
            'importance' => $importance,
            'sender_id' => $sender_id
        );
    
        $data = $ticketsService->add_ticket($ticket);
    
        echo json_encode($data);
    });

/**
 * @OA\Get(
 *      path="/tickets/{ticketId}/messages",
 *      tags={"tickets"},
 *      summary="Get messages of a specific ticket",
 *      @OA\Response(
 *          response=200,
 *          description="Array of all messages of the ticket with the specified id in the database or false if the ticket does not exist",
 *      ),
 *      @OA\Parameter(@OA\Schema(type="number"), in="path", name="ticketId", required=true, description="Ticket Id"),
 * )
 */
    
    Flight::route('GET /@ticketId/messages', function($ticketId){
        $ticketsService = new ticketsService();
        $data = $ticketsService->get_messages($ticketId);
        echo json_encode($data);
    });

/**
 * @OA\Post(
 *      path="/tickets/add-message",
 *      tags={"tickets"},
 *      summary="Add a message to a ticket",
 *      @OA\Response(
 *          response=200,
 *          description="Add the message to the database and return the data of the added message or false if the message could not be added",
 *      ),
 *      @OA\RequestBody(
 *          description="Message object that needs to be added to the database",
 *          @OA\JsonContent(
 *              @OA\Property(property="ticketId", type="number", description="Ticket id to which the message belongs"),
 *              @OA\Property(property="message", type="string" , description="Message text"),
 *              @OA\Property(property="sent_by", type="number", description="User id of the sender")
 *        )
 *      )
 * )
 */
    
    Flight::route('POST /add-message', function(){
        $ticketsService = new ticketsService();
    
        $ticketId = Flight::request()->data->ticketId;
        $messageText = Flight::request()->data->message;
        $sent_at = date('Y-m-d H:i:s');
        $sent_by = Flight::request()->data->sent_by;
    
        $message = array(
            'ticket_id' => $ticketId,
            'message' => $messageText,
            'sent_at' => $sent_at,
            'sent_by' => $sent_by
        );
    
        $ticketsService->add_message($message);
    
        echo json_encode($message);
    });
});



