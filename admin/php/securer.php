<?php
    if (!(isset($_SESSION['jayrick']) && $_SESSION['zabala']=="zabala")) {
        header("Location: index.php");
    }
?>