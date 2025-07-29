<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ArtikelModel; // Pastikan model sudah dibuat
use App\Models\KomenModel; // Pastikan model sudah dibuat

class Artikel extends Controller
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
        if (! $this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'));
        }

        if ($this->session->get('user_role') == "user") {
            $artikel = $this->artikelModel->select('artikel.*, users.full_name as author_name')
                ->join('users', 'users.id = artikel.author_id')
                ->where('author_id', $this->session->get('id_user'))
                ->orderBy('created_at', 'ASC')
                ->findAll();
        } else {
            $artikel = $this->artikelModel->select('artikel.*, users.full_name as author_name')
                ->join('users', 'users.id = artikel.author_id')
                ->orderBy('created_at', 'ASC')
                ->findAll();
        }

        // Tambahkan likes dan komens count serta formatted time
        foreach ($artikel as $key => $value) {
            $artikel[$key]['posted_ago'] = $this->artikelModel->getTimeAgo($artikel[$key]['created_at']);
            $artikel[$key]['komens_count'] = $this->komenModel->where('artikel_id', $artikel[$key]['id'])->countAllResults();
        }

        $data = [
            'artikel' => $artikel, // Kirim data diskusi ke view
        ];

        return view('diskusi/list', $data);
    }

    public function view($id = null)
    {
        if (! $this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'));
        }

        if ($id === null) {
            return redirect()->to(base_url('dashboard'))->with('error', 'ID artikel tidak ditemukan.');
        }

        $article = $this->artikelModel->getArticleDetails($id);
        if (empty($article)) {
            return redirect()->to(base_url('dashboard'))->with('error', 'Data artikel belum diapproved / tidak ditemukan.');
        }

        // Data artikel ditemukan, tampilkan
        $article['comments'] = $this->nestComments($article['comments']);
        $data = [
            'page_title' => $article['title'],
            'article' => $article,
        ];

        return view('diskusi/artikel', $data);
    }
    function nestComments($comments)
    {
        // dd($comments);
        $nested = [];

        foreach ($comments as $comment) {
            if ($comment['parrent_komen_id'] == 0) {
                $nested[$comment['id']] = $comment;
                $nested[$comment['id']]['replies'] = [];
            }
        }

        foreach ($comments as $comment) {
            if ($comment['parrent_komen_id'] != 0) {
                $nested[$comment['parrent_komen_id']]['replies'][] = $comment;
            }
        }

        return $nested;
    }

    public function addKomen($articleId = null)
    {
        if (! $this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'));
        }

        if ($articleId === null) {
            return redirect()->to(base_url('artikel'))->with('error', 'Artikel tidak valid.');
        }

        $rules = [
            'comment_text' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $komenData = [
            'artikel_id' => $articleId,
            'user_id' => $this->session->get('id_user'), // Ambil ID user dari session
            'comment_text' => $this->request->getPost('comment_text'),
        ];

        if ($this->komenModel->insert($komenData)) {
            session()->setFlashdata('success', 'Komentar berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan komentar. Coba lagi.');
        }

        return redirect()->to(base_url('lihat_artikel/' . $articleId));
    }

    public function balasKomen($articleId = null, $parrentKomenId = null)
    {
        if (! $this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'));
        }

        if ($articleId === null) {
            return redirect()->to(base_url('artikel'))->with('error', 'Artikel tidak valid.');
        }
        if ($parrentKomenId === null) {
            return redirect()->to(base_url('artikel'))->with('error', 'id_komen tidak valid.');
        }

        $rules = [
            'reply_text' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $komenData = [
            'artikel_id' => $articleId,
            'user_id' => $this->session->get('id_user'),
            'parrent_komen_id' => $parrentKomenId,
            'comment_text' => $this->request->getPost('reply_text'),
        ];

        if ($this->komenModel->insert($komenData)) {
            session()->setFlashdata('success', 'Komentar berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan komentar. Coba lagi.');
        }

        return redirect()->to(base_url('lihat_artikel/' . $articleId));
    }

    // Menampilkan form untuk menambah artikel baru
    public function create()
    {
        if (! $this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'));
        }

        $data = [
            'page_title' => 'Tambah Artikel Baru',
            'article' => [], // Kirim array kosong untuk form baru
            'errors' => session()->getFlashdata('errors'), // Ambil error validasi
        ];

        return view('diskusi/form', $data);
    }

    // Memproses data dari form tambah artikel
    public function store()
    {
        if (! $this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'));
        }

        // Aturan validasi
        $rules = [
            'title' => 'required|min_length[5]|max_length[255]',
            'content' => 'required|min_length[10]',
            'file_upload' => 'max_size[file_upload,2048]|ext_in[file_upload,pdf,png,jpg,jpeg,mp4,webm,ogg,doc,docx,ppt,pptx,zip,rar]', // Max 2MB, hanya beberapa ekstensi
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $files = $this->request->getFileMultiple('file_upload');
        foreach ($files as $file) {
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $fileName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $fileName); // Pindahkan file ke writable/uploads

                // TODO: Menyimpan nama file yang diupload ke DB jika ada Lampiran File
            }
        }


        $data = [
            'author_id' => $this->session->get('id_user'), // Ambil ID user dari session
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            // 'file_name' => $fileName,
        ];

        if ($this->artikelModel->insert($data)) {
            $this->session->setFlashdata('success', 'Artikel berhasil ditambahkan!');
            return redirect()->to(base_url('artikel')); // Redirect ke halaman diskusi
        } else {
            $this->session->setFlashdata('error', 'Gagal menambahkan artikel. Mohon coba lagi.');
            return redirect()->back()->withInput();
        }
    }

    // Menampilkan form untuk mengedit artikel yang sudah ada
    public function edit($id = null)
    {
        if (! $this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'));
        }

        if ($id === null) {
            return redirect()->to(base_url('artikel'))->with('error', 'ID artikel tidak valid.');
        }

        $article = $this->artikelModel->find($id);

        if (empty($article)) {
            return redirect()->to(base_url('artikel'))->with('error', 'Artikel tidak ditemukan.');
        }

        if ($this->session->get('user_role') == "user") {
            if ($article['author_id'] != $this->session->get('id_user')) {
                return redirect()->to(base_url('artikel'))->with('error', 'Anda tidak memiliki izin untuk mengedit artikel ini.');
            }
        }

        $data = [
            'page_title' => 'Edit Artikel',
            'article' => $article,
            'errors' => session()->getFlashdata('errors'),
        ];

        return view('diskusi/form', $data);
    }

    // Memproses data dari form edit artikel
    public function update($id = null)
    {
        if (! $this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'));
        }

        if ($id === null) {
            return redirect()->to(base_url('artikel'))->with('error', 'ID artikel tidak valid.');
        }

        $existingArticle = $this->artikelModel->find($id);

        if (empty($existingArticle)) {
            return redirect()->to(base_url('artikel'))->with('error', 'Artikel tidak ditemukan.');
        }

        if ($this->session->get('user_role') == "user") {
            if ($existingArticle['author_id'] != $this->session->get('id_user')) {
                return redirect()->to(base_url('artikel'))->with('error', 'Anda tidak memiliki izin untuk mengedit artikel ini.');
            }
        }

        // Aturan validasi (sama seperti store, sesuaikan jika ada perbedaan)
        $rules = [
            'title' => 'required|min_length[5]|max_length[255]',
            'content' => 'required|min_length[10]',
            'file_upload' => 'max_size[file_upload,2048]|ext_in[file_upload,pdf,png,jpg,jpeg,mp4,webm,ogg,doc,docx,ppt,pptx,zip,rar]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $files = $this->request->getFileMultiple('file_upload');
        foreach ($files as $file) {
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $fileName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $fileName); // Pindahkan file ke writable/uploads

                // TODO: Insert/Update nama file yang diupload ke DB jika ada update Lampiran File
                // TODO: Hapus nama file existing di DB jika ada update Lampiran File
            }

            // TODO: Hapus file existing pada sistem
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            // 'file_name' => $fileName,
        ];

        if ($this->artikelModel->update($id, $data)) {
            $this->session->setFlashdata('success', 'Artikel berhasil diperbarui!');
            return redirect()->to(base_url('artikel')); // Redirect ke detail artikel
        } else {
            $this->session->setFlashdata('error', 'Gagal memperbarui artikel. Mohon coba lagi.');
            return redirect()->back()->withInput();
        }
    }

    // Menghapus artikel
    public function delete($id = null)
    {
        if (! $this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'));
        }

        if ($id === null) {
            return redirect()->to(base_url('artikel'))->with('error', 'ID artikel tidak valid.');
        }

        $article = $this->artikelModel->find($id);

        if (empty($article)) {
            return redirect()->to(base_url('artikel'))->with('error', 'Artikel tidak ditemukan.');
        }

        if ($this->session->get('user_role') == "user") {
            if ($article['author_id'] != $this->session->get('id_user')) {
                return redirect()->to(base_url('artikel'))->with('error', 'Anda tidak memiliki izin untuk mengedit artikel ini.');
            }
        }

        // Hapus file terkait jika ada
        if (!empty($article['file_name']) && file_exists(WRITEPATH . 'uploads/' . $article['file_name'])) {
            unlink(WRITEPATH . 'uploads/' . $article['file_name']);
        }

        if ($this->artikelModel->delete($id)) {
            $this->session->setFlashdata('success', 'Artikel berhasil dihapus!');
            return redirect()->to(base_url('artikel'));
        } else {
            $this->session->setFlashdata('error', 'Gagal menghapus artikel. Mohon coba lagi.');
            return redirect()->to(base_url('artikel'));
        }
    }

    // approve artikel
    public function approve($id = null)
    {
        if (! $this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'));
        }

        if ($id === null) {
            return redirect()->to(base_url('artikel'))->with('error', 'ID artikel tidak valid.');
        }

        $article = $this->artikelModel->find($id);

        if (empty($article)) {
            return redirect()->to(base_url('artikel'))->with('error', 'Artikel tidak ditemukan.');
        }

        if ($this->session->get('user_role') == "user") {
            return redirect()->to(base_url('artikel'))->with('error', 'Anda tidak memiliki izin untuk menggaprove artikel ini.');
        }

        $data = [
            'is_approved' => !$article['is_approved'],
        ];

        if ($this->artikelModel->update($id, $data)) {
            $this->session->setFlashdata('success', 'Artikel berhasil diupdate!');
            return redirect()->to(base_url('artikel'));
        } else {
            $this->session->setFlashdata('error', 'Gagal menghapus artikel. Mohon coba lagi.');
            return redirect()->to(base_url('artikel'));
        }
    }

    // View File dari Artikel
    public function viewFile($fileName = null)
    {
        $path = WRITEPATH . 'uploads/' . $fileName;

        if (!file_exists($path)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("File tidak ditemukan");
        }

        // Cek MIME type
        $mime = mime_content_type($path);

        // Cek apakah tipe file bisa ditampilkan di browser
        $allowed = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf', 'video/mp4', 'video/webm', 'video/ogg'];
        if (!in_array($mime, $allowed)) {
            return $this->response->download($path, null);
        }

        return $this->response
            ->setHeader('Content-Type', $mime)
            ->setHeader('Content-Disposition', 'inline; filename="' . $fileName . '"')
            ->setBody(file_get_contents($path));
    }

    // Download File dari Artikel
    public function downloadFile($fileName = null)
    {
        $path = WRITEPATH . 'uploads/' . $fileName;

        if (!file_exists($path)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("File tidak ditemukan");
        }

        return $this->response->download($path, null);
    }

    // ... (metode processLogin, register, processRegister, logout yang sudah ada) ...
}
