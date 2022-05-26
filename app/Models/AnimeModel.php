<?php
namespace App\Models;

use CodeIgniter\Model;

class AnimeModel extends Model {
    protected $table = 'anime';
    protected $primaryKey = 'idAnime';
    protected $returnType = 'array';
    protected $allowedFields = [
        "nameEng",
        "nameJap",
        "airingStart",
        "airingFinish",
        "yearBroadcast",
        "season",
        "studio",
        "type",
        "totalEpisodes",
        "duration",
        "source",
        "banner",
        "img"
    ];
}


?>