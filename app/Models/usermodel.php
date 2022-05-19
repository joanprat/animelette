<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'user';
    protected $primaryKey = 'idUser';
    protected $returnType = 'array';
    protected $allowedFields = [
        "username",
        "profilePic",
        "banner",
        "password",
        "location",
        "gender",
        "birthDate",
        "joinDate",
        "engagement",
        "bio"
    ];
}


?>