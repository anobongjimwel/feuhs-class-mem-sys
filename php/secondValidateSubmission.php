<?php
session_start();
include_once("classJoiner.php");
if (!empty($_POST['stno']) &&
    !empty($_POST['c1']) &&
    !empty($_POST['s1']) &&
    !empty($_POST['c2']) &&
    !empty($_POST['s2'])
) {
    $stNo = $_POST['stno'];
    $c1 = $_POST['c1'];
    $s1 = $_POST['s1'];
    $c2 = $_POST['c2'];
    $s2 = $_POST['s2'];
    $cJ = new classJoiner();
    if ($s1!=$s2 &&
        $c1!=$c2 &&
        $c1!="---" &&
        $s1!="---" &&
        $c2!="---" &&
        $s2!="---" &&
        $cJ->isScheduleAvailable($c1, $s1) &&
        $cJ->isScheduleAvailable($c2, $s2) &&
        !$cJ->hasPicked($stNo)) {
        if (!$cJ->isScheduledPickedAlready($c1, $s1, $stNo) &&
            !$cJ->isScheduledPickedAlready($c2, $s2, $stNo)) {
            if ($cJ->appendSchedulePick($c1, $s1, $stNo) &&
            $cJ->appendSchedulePick($c2, $s2, $stNo)) {
                echo "TRUE";
            } else {
                echo "Error: Can't add picked schedules to the system. Please try again in a few moments.";
            }
        } else {
            echo "Error: Can't add picked schedules to the system. There have been duplicates found, please review your class membership application";
        }

    } else {
        echo "Error: Can't add picked schedules to the system. Some schedules may have been already full or you have already picked your schedules.";
    }
}