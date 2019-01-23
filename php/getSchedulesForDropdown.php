<?php
session_start();
include_once("classJoiner.php");
if (!empty($_POST['classId'])) {
    $cId = $_POST['classId'];
    $cJ = new classJoiner();
    echo "<option>---</option>";
    $scheds = $cJ->getSchedulesAvailableForClass($cId);
    foreach ($scheds as $sched) {
        echo "<option value='".$sched['scheduleid']."'>";
        echo $sched['schedule'];
        echo "</option>";
    }
}