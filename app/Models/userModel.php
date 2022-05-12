<?php
namespace App\Models;

use CodeIgniter\Model;

class AnimeModel extends Model {
    protected $table = 'user';
    protected $primaryKey = 'idUser';
    protected $returnType = 'array';
    protected $allowedFields = [
        "nameEng",
        "nameJap",
        "yearBroadcast",
        "season",
        "studio",
        "type",
        "totalEpisodes"
    ];
}
?>