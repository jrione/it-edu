<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ArtikelModel; // Pastikan model sudah dibuat
use App\Models\KomenModel; // Pastikan model sudah dibuat

class Home extends Controller
{
    protected $session;
    protected $artikelModel;
    protected $komenModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->session = \Config\Services::session();
        $this->artikelModel = new ArtikelModel();
        $this->komenModel = new KomenModel();
    }

    public function index()
    {
        // if (! $this->session->get('isLoggedIn')) {
        //     return redirect()->to(base_url('auth/login'));
        // }

        $artikel = $this->artikelModel->select('artikel.*, users.full_name as author_name')
            ->join('users', 'users.id = artikel.author_id')
            ->where('is_approved', 1)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        foreach ($artikel as $key => $value) {
            $artikel[$key]['posted_ago'] = $this->artikelModel->getTimeAgo($artikel[$key]['created_at']);
            $artikel[$key]['komens_count'] = $this->komenModel->where('artikel_id', $artikel[$key]['id'])->countAllResults();
        }

        $data = [
            'artikel' => $artikel, // Kirim data diskusi ke view
        ];

        return view('dashboard', $data);
    }
}
