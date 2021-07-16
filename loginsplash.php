<?php
if (!session_id()) @ session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if (!isset($_SESSION['userEmail'])) {
        $_SESSION['userEmail'] = $_POST['email'];
    }
    if (!isset($_SESSION['isAdmin'])) {
        $_SESSION['isAdmin'] = $_POST['admin'];
    }
}
header('Location: /');
?>