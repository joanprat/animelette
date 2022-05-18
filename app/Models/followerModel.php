<?php
namespace App\Models;

use CodeIgniter\Model;

class FollowerModel extends Model {
    protected $table = 'follower';
    protected $primaryKey = 'idFollower';
    protected $returnType = 'array';
    protected $allowedFields = [
        "refUser",
        "refUserFollower"
    ];
}


?>