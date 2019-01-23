<?php
    session_start();
    include_once("classJoiner.php");
    if (!empty($_POST['studentNum'])) {
        $studentNum = $_POST['studentNum'];
        $cJ = new ClassJoiner();
        if ($cJ->studentNumberExists($_POST['studentNum'])) {
            $_SESSION['studentNum'] = $studentNum;
            echo "TRUE";
        } else {
            echo "FALSE";
        }
    }