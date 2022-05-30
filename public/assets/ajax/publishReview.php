<?php

require "connection.php";

$db = connect();
$res = $db->query("INSERT INTO review (refAnime, refUser, content, publicationDate) VALUES (".$_POST['refAnime'].", ".$_POST['refUser'].", '".$_POST['content']."', SYSDATE())");
if($db->affected_rows > 0) {
    echo true;
}else {
    echo false;
}
?>