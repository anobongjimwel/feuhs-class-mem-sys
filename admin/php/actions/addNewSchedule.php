<?php
    if (isset($_POST['id']) && isset($_POST['sch'])) {
        if (!empty($_POST['id']) && !empty($_POST['sch'])) {
            require_once "../dbcon.php";
            $scheduleExists = $db->query("SELECT * FROM schedules WHERE scheduleId = '".$_POST['sch']."' AND classId = '".$_POST['id']."'")->rowCount();
            if (!$scheduleExists) {
                require_once "../RandomizedKey.php";
                
                $addSchedule = $db->prepare("INSERT INTO schedules (classId, scheduleId, schedule) VALUES ('','','')")
            } else {
                echo "DUPLICATE";
            }
        } else {
            echo "BAD";
        }
    } else {
        echo "BAD";
    }
?>