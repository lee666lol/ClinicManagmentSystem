<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
 session_start();
    if(!isset($_SESSION["StaffId"])) {
        header("Location: Login.php");
        exit();
    }
?>
