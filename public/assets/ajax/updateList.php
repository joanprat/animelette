<?php

require "connection.php";

$db = connect();
$res = $db->query("UPDATE list SET episodeSeen = ".$_POST['episodeUpdate'].", updateDate = SYSDATE() WHERE refAnime=".$_POST['refAnime']." AND refUser=".$_POST['refUser']);
if($db->affected_rows > 0) {
    echo true;
}else {
    echo false;
}
?>

