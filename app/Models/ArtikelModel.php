<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table      = 'artikel';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['author_id', 'title', 'content', 'created_at', 'updated_at', 'is_approved'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // Fungsi untuk mengambil detail diskusi beserta komentar-komentarnya
    public function getArticleDetails($id)
    {
        // Join dengan tabel users untuk mendapatkan nama penulis
        $this->select('artikel.*, users.full_name as author_name');
        $this->join('users', 'users.id = artikel.author_id');
        $this->where('is_approved', 1);
        $article = $this->find($id);

        if ($article) {
            // Ambil komentar untuk artikel ini
            $commentModel = new KomenModel();
            $comments = $commentModel->select('komen.*, users.full_name as author_name')->join('users', 'users.id = komen.user_id')->where('artikel_id', $id)->findAll();

            // Format waktu untuk komentar
            foreach ($comments as &$comment) {
                $comment['comment_posted_ago'] = $this->getTimeAgo($comment['created_at']);
            }
            $article['comments'] = $comments;
            $article['posted_ago'] = $this->getTimeAgo($article['created_at']);

            // ambil file untuk artikel ini
            $filesModel = new FilesModel();
            $dataFile = $filesModel->where('artikel_id', $id)->findAll();
            $article['files'] = $dataFile;
        }

        return $article;
    }

    public function getTimeAgo($timestamp)
    {
        $time = strtotime($timestamp);
        $diff = time() - $time;

        if ($diff < 60) {
            return $diff . ' seconds ago';
        } elseif ($diff < 3600) {
            return round($diff / 60) . ' minutes ago';
        } elseif ($diff < 86400) {
            return round($diff / 3600) . ' hours ago';
        } elseif ($diff < 2592000) { // 30 days
            return round($diff / 86400) . ' days ago';
        } elseif ($diff < 31536000) { // 365 days
            return round($diff / 2592000) . ' months ago';
        } else {
            return round($diff / 31536000) . ' years ago';
        }
    }
}
