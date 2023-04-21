<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonasModel extends Model {
    protected $table = '';
    protected $primaryKey = '';
    protected $allowedFields = ['nombre', 'image', 
    'correo', 'telefono', 'estado_civil', 'hijos', 'intereses'];
}
