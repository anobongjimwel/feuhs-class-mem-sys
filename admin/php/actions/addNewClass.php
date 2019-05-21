<?php
    if (isset($_POST['n']) && isset($_POST['sch'])) {
        if (!empty($_POST['n']) && !empty($_POST['sch'])) {
            require_once "../dbcon.php";
            $checkIfExist = $db->query("SELECT * FROM classes WHERE className = '".$_POST['n']."'");
            if ($checkIfExist->rowCount()<1) {
                require_once "../RandomizedKey.php";
                $randkey = new RandomizedKey();
                $stopKeyLooping = false;
                $key = "";
                while (!$stopKeyLooping) {
                    $key = $randkey::generate(8);
                    $KeyExists = $db->query("SELECT * FROM classes WHERE classId = '".$key."'");
                    if ($KeyExists->rowCount()<1) {
                        $insertClass = $db->prepare("INSERT INTO classes (`classId`, `className`) VALUES ('".$key."','".$_POST['n']."')");
                        if ($insertClass->execute()) {
                            $key2 = "";
                            $stopKeyLooping2 = false;
                            while (!$stopKeyLooping2) {
                                $key2 = $randkey::generate(12);
                                $Key2Exists = $db->query("SELECT * FROM schedules WHERE scheduleId = '".$key2."'");
                                if ($Key2Exists->rowCount()<1) {
                                    $insertSchedule = $db->prepare("INSERT INTO schedules (`classId`, `scheduleId`, `schedule`) VALUES ('".$key."','".$key2."','".$_POST['sch']."')");
                                    if ($insertSchedule->execute()) {
                                        echo "GOOD";
                                    } else {
                                        echo "BAD";
                                    }
                                    $stopKeyLooping2 = true;
                                }
                            }
                        }
                        $stopKeyLooping = true;

                    } else {
                        echo "DUPLICATE";
                    }
                }
            } else {
                echo "BAD";
            }
        } else {
            echo "BAD";
        }
    } else {
        echo "BAD";
    }
?>
