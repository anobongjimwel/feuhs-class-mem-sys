<?php
    if (isset($_POST['id'])) {
        if (!empty($_POST['id'])) {
            require_once "../dbcon.php";
            $query = $db->prepare("DELETE FROM schedules WHERE scheduleId = '".$_POST['id']."'");
            $query->execute();
            if ($query->rowCount()<1) {
                echo "BAD";
            } else {
                echo "GOOD";
            }
        } else {
            echo "BAD";
        }
    } else {
        echo "BAD";
    }
?>