<?php

require "connection.php";

$db = connect();
$isList = $db->query("SELECT * FROM list WHERE refUser = ".$_POST['refUser']." AND refAnime =".$_POST["refAnime"]);
if($db->affected_rows > 0) {
    $res = $db->query("DELETE FROM list WHERE refAnime=".$_POST['refAnime']." AND refUser = ".$_POST['refUser']);
    if($db->affected_rows > 0) {
        echo "true";
    }else {
        echo "false";
    }

}else {
    $res = $db->query("INSERT INTO list (refAnime, refUser, `status`, episodeSeen, score, updateDate) VALUES (".$_POST['refAnime'].", ".$_POST['refUser'].", '".$_POST['status']."', ".$_POST['caps'].", ".$_POST['score'].", SYSDATE())");
    if($db->affected_rows > 0) {
        echo "true";
    }else {
        echo "false";
    }
}
?>