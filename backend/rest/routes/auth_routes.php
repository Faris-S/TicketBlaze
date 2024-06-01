<?php

require __DIR__ . '/../services/authService.class.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

Flight::group('/auth', function(){

/**
 * @OA\Post(
 *      path="/auth/login",
 *      tags={"authentification"},
 *      summary="Log in",
 *      @OA\Response(
 *          response=200,
 *          description="Log in the user and return the user data or 401 if the user does not exist",
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Invalid username or password"
 *     ),
 *      @OA\RequestBody(
 *          description="User object that needs to log in",
 *          @OA\JsonContent(
 *              @OA\Property(property="email", type="email", example="email@email.com", description="User email"),
 *              @OA\Property(property="password", type="string", example="password", description="User password")
 *        )
 *      )
 * )
 */

    Flight::route('POST /login', function(){
        $data = Flight::request()->data->getData();
        $authService = new authService();
        $user = $authService->get_user_by_email($data['email']);
        if(!$user || !password_verify($data['password'], $user['password'])){
            Flight::halt(401, 'Invalid username or password');
        }
        unset($user['password']);
        
        $jwt_payload = [
            'user' => $user,
            'iat' => time(),
            'exp' => time() + (60*60*24),


        ];

        $token = JWT::encode($jwt_payload, Config::JWT_SECRET(), "HS256");

        Flight::json(
            array_merge($user, ['token' => $token])
        );
    });

/**
 * @OA\Post(
 *      path="/auth/register",
 *      tags={"authentification"},
 *      summary="Register a new user",
 *      @OA\Response(
 *          response=200,
 *          description="User is registered",
 *      ),
 *      @OA\Response(
 *         response=500,
 *         description="Error while registering the user (the email is probably already in use)"
 *    ),
 *      @OA\Response(
 *        response=400,
 *          description="All fields are required"
 *   ),
 *      @OA\RequestBody(
 *          description="User object that needs to log in",
 *          @OA\JsonContent(
 *              @OA\Property(property="name", type="string", example="John", description="User name"),
 *              @OA\Property(property="surname", type="string", example="Doe", description="User surname"),
 *              @OA\Property(property="email", type="email", example="email@email.com", description="User email"),
 *              @OA\Property(property="password", type="string", example="password", description="User password")
 *        )
 *      )
 * )
 */

    Flight::route('POST /register', function(){
        $authService = new authService();
        $name = Flight::request()->data->name;
        $surname = Flight::request()->data->surname;
        $email = Flight::request()->data->email;
        $password = Flight::request()->data->password;

        if ($name == "" || $surname == "" || $email == "" || $password == "") {
            Flight::halt(400, 'All fields are required');
        }

        $data = [
            "name" => $name,
            "surname" => $surname,
            "email" => $email,
            "password" => $password
        ];

        $reponse = $authService->add_user($data);

    });


/**
 * @OA\Post(
 *      path="/auth/logout",
 *      tags={"authentification"},
 *      summary="Log out of the system",
 *      security={{"ApiKey": {}}},
 *      @OA\Response(
 *          response=200,
 *          description="Logged out"
 *     )
 * )
 */

    Flight::route("POST /logout", function(){
        try {
            $token = Flight::request()->getHeader('Authentication');
            if (!$token){
                Flight::halt(401, 'Token not provided');
            }
            $decoded = JWT::decode($token, new Key(Config::JWT_SECRET(), "HS256"));
            Flight::json(["jwt_decoded" => $decoded, 'user' => $decoded->user]);
        } catch (Exception $e) {
            Flight::halt(401, $e->getMessage());
        }
    });
});