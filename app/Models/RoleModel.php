<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table      = 'role';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array'; // Atau 'object'
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama']; // Kolom yang bisa diisi

    // Tambahkan timestamp jika Anda menggunakannya
    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Aturan validasi (Opsional, bisa juga di controller)
    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}
