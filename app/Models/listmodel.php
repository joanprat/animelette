<?php
namespace App\Models;

use CodeIgniter\Model;

class ListModel extends Model {
    protected $table = 'list';
    protected $primaryKey = 'isList';
    protected $returnType = 'array';
    protected $allowedFields = [
        "refAnime",
        "refUser",
        "status",
        "episodeSeen",
        "score",
        "addDate"
    ];
}


?>