<?php

require "connection.php";

$db = connect();

$exploreUserBar = $_POST["exploreUserBar"];
/*if($exploreUserBar == ""){
    $exploreUserBar="null";
}*/

$sql = "select * from user WHERE LOWER(username)LIKE LOWER('".$exploreUserBar."%')";
$res = mysqli_query($db,$sql);
foreach ($res as $value) {
            
    $users[] = Array("idUser" => $value["idUser"], "username" => $value["username"], "profilePic" => $value["profilePic"], "joinDate" => $value["joinDate"],  "engagement" => $value["engagement"]);
    
} 

      echo json_encode($users);

?>