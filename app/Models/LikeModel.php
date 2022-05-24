<?php
namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model {
    protected $table = 'like';
    protected $primaryKey = 'idLike';
    protected $returnType = 'array';
    protected $allowedFields = [
        "refReview",
        "refUser"
    ];
}


?>