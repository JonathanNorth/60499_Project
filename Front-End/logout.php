<?php
session_start();

//destroy the session when logging out, redirect to home page
if(session_destroy()) {
    header("Location: index.php");
}

?>