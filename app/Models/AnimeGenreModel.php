<?php
namespace App\Models;

use CodeIgniter\Model;

class AnimeGenreModel extends Model {
    protected $table = 'anime_genre';
    protected $primaryKey = 'idAnimeGenere';
    protected $returnType = 'array';
    protected $allowedFields = [
        "refAnime",
        "refGenre"
    ];
}


?>