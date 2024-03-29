<?php

// jika belum login
if (!isset($_SESSION['role'])) {
    header('location: login.php');
} 
?>