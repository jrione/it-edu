<?php

namespace App\Models;

use CodeIgniter\Model;

class FilesModel extends Model
{
    protected $table      = 'files';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['artikel_id', 'nama_file_ori', 'nama_file_simpan', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // public function getCommentsByDiscussionId($artikelId)
    // {
    //     return $this->select('comments.*, users.full_name as comment_author')
    //         ->join('users', 'users.id = comments.user_id')
    //         ->where('artikel_id', $artikelId)
    //         ->orderBy('created_at', 'ASC')
    //         ->findAll();
    // }
}
