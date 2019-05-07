<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: ../../log1.html");
   }
?>