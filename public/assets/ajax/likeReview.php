<?php

require "connection.php";

$db = connect();
$res = $db->query("SELECT * FROM `like` WHERE refReview = ".$_POST['refReview']." AND refUser = ".$_POST['refUser']);
if ($res->num_rows == 0) {
    $db->query("INSERT INTO `like` (refReview, refUser) VALUES (".$_POST['refReview'].", ".$_POST['refUser'].");");
    $db->query("UPDATE user SET engagement = ".++$_POST['engagement']." WHERE idUser = ".$_POST['userWritter']);
    echo "Like";
}else if ($res->num_rows > 0) {
    $db->query("DELETE FROM `like` WHERE refReview = ".$_POST['refReview']." AND refUser = ".$_POST['refUser'].";");
    $db->query("UPDATE user SET engagement = ".--$_POST['engagement']." WHERE idUser = ".$_POST['userWritter']);
    echo "Like removed";
}
?>