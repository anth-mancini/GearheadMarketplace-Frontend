<?php

//on session close,clear session and erase session data

session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('Location: /');
die;
?>