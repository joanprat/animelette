<?php
namespace App\Models;

use CodeIgniter\Model;

class FollowerModel extends Model {
    protected $table = 'character';
    protected $primaryKey = 'idCharacter';
    protected $returnType = 'array';
    protected $allowedFields = [
        "nameCharacter",
        "surnameCharacter"
    ];
}
?>