<?php
session_start();
include_once("classJoiner.php");
if (!empty($_POST['classId'])) {
    $cId = $_POST['classId'];
    $cJ = new classJoiner();
    echo "<option>---</option>";
    foreach ($cJ->getClassesAvailableExcept($cId) as $class) {
        echo "<option value='".$class['classid']."'>";
        echo $class['className'];
        echo "</option>";
    }
}