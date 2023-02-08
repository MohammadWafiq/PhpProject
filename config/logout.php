<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("location: index.php");
} else {
    session_destroy();
    unset($_SESSION['logged_in']);
    unset($_SESSION['email']);
    header("location: index.php");
}
