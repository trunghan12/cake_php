<?php
    session_start();
    ob_start();
    session_destroy();
    unset($_SESSION);
    header("Location: index.php?page=login");

?>