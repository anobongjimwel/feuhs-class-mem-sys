<?php
session_start();
include_once("classJoiner.php");
if (!empty($_POST['classId']) && !empty($_POST['scheduleName'])) {
    $cId = $_POST['classId'];
    $sN = $_POST['scheduleName'];
    $cJ = new classJoiner();
    echo "<option>---</option>";
    foreach ($cJ->getSchedulesAvailableForClass($cId, $sN) as $sched) {
        echo "<option value='".$sched['scheduleid']."'>";
        echo $sched['schedule'];
        echo "</option>";
    }
}