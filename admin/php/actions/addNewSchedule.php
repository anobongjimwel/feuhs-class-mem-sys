<?php
    if (isset($_POST['id']) && isset($_POST['sch'])) {
        if (!empty($_POST['id']) && !empty($_POST['sch'])) {
            require_once "../dbcon.php";
            $scheduleExists = $db->query("SELECT * FROM schedules WHERE schedule = '".$_POST['sch']."' AND classId = '".$_POST['id']."'")->rowCount();
            if ($scheduleExists<1) {
                require_once "../RandomizedKey.php";
                $randKey = new RandomizedKey();
                $key = "";
                while (true) {
                    $key = $randKey::generate(12);
                    if ($db->query("SELECT * FROM schedules WHERE scheduleId = '$key'")->rowCount()<1) {
                        break;
                    }
                }
                $addSchedule = $db->prepare("INSERT INTO schedules (classId, scheduleId, schedule) VALUES ('".$_POST['id']."','$key','".$_POST['sch']."')");
                if ($addSchedule->execute()) {
                    echo "GOOD";
                } else {
                    echo "BAD";
                }
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