<?php
       $env = getenv('DB_NAME');

       if ($env != null) {
           header("Location: /index.html");
       } else {
           header("Location: /TicketBlaze/index.html");
       }

       die();
?>