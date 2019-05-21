<?php
    if (isset($_POST['id']) && isset($_POST['n'])) {
        if (!empty($_POST['id']) && !empty($_POST['n'])) {
            require_once "../dbcon.php";
            $query = $db->prepare("UPDATE classes SET className = '".$_POST['n']."' WHERE classid = '".$_POST['id']."'");
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