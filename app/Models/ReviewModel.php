<?php
namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model {
    protected $table = 'review';
    protected $primaryKey = 'idReview';
    protected $returnType = 'array';
    protected $allowedFields = [
        "refAnime",
        "refUser",
        "content"
    ];
}


?>