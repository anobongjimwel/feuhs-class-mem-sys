<?php
    if (isset($_POST['id'])) {
        if (!empty($_POST['id'])) {
            require_once "../dbcon.php";
            $query = $db->prepare("DELETE FROM classes WHERE classid = '".$_POST['id']."'");
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