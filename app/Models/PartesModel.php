<?php

namespace App\Models;

use CodeIgniter\Model;

class PartesModel extends Model
{
    protected $table = 'partes'; 
    protected $primaryKey = 'id';

    protected $allowedFields = ['nome', 'veiculo_id', 'coord_x', 'coord_y', 'coord_z'];

    
}
