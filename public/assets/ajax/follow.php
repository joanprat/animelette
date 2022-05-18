<?php

require "connection.php";

$db = connect();
$res = $db->query("SELECT * FROM follower WHERE refUser = ".$_POST['refUser']." AND refUserFollower = ".$_POST['refUserFollower']);
if ($res->num_rows == 0) {
    $db->query("INSERT INTO follower (refUser, refUserFollower) VALUES (".$_POST['refUser'].", ".$_POST['refUserFollower'].");");
    echo "Now following";
}else if ($res->num_rows > 0) {
    $db->query("DELETE FROM follower WHERE refUser = ".$_POST['refUser']." AND refUserFollower = ".$_POST['refUserFollower'].";");
    echo "Now unfollowing";
}
?>