<?php

namespace App\Models;

use CodeIgniter\Model;

class CompaniesModel extends Model
{
    protected $table = 'companies';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'address', 'phone', 'nit', 'nrc', 'business_line', 'legal_representative'];

}
