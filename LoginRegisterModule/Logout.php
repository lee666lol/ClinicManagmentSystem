<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
 session_start();
    // Destroy session
    $user_data = null;
    if(session_destroy()) {
        // Redirecting To Home Page
        header("Location: ../MainMedicalPage.php");
    }
?>
