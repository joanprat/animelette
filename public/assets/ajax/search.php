<?php

require "connection.php";

$db = connect();

$title = trim($_POST["title"]);
$genre = $_POST["selectGenre"];
$year = $_POST["selectYear"];  
$season = $_POST["selectSeason"];
$format = $_POST["selectFormat"];    

if($title ==""){
    $title = "%";
}
if($genre=="Any"){
    $genre ="%";
}
if($year=="Any"){
    $year = "%";
}
if($season=="Any"){
    $season = "%";
}
if($format=="Any"){
    $format = "%";
}

$sql = "select * from anime an JOIN anime_genre ag ON an.idAnime = ag.idAnimeGenere JOIN genre gr ON ag.refGenre = gr.idGenre where (LOWER(an.nameEng) LIKE LOWER('".$title."%') OR LOWER(an.nameJap) LIKE LOWER('".$title."%')) AND LOWER(gr.nameGenre) LIKE LOWER('".$genre."%') AND an.yearBroadcast LIKE ('".$year."%') AND LOWER(an.season) LIKE LOWER('".$season."%') AND LOWER(an.type) LIKE LOWER('".$format."%')";
// echo $sql;
$res = mysqli_query($db,$sql);

foreach ($res as $value) {
            
    $animes[] = Array("idAnime" => $value["idAnime"], "nameEng" => $value["nameEng"], "nameJap" => $value["nameJap"], "yearBroadcast"=>$value["yearBroadcast"], "img"=>$value["img"]);
    
} 

     echo json_encode($animes);


?>