<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;
use CodeIgniter\Validation\Validation;

class Auth extends Controller
{
    protected $request;
    protected $session;
    protected $validation;

    public function __construct()
    {
        helper(['form', 'url', 'session']); // Load helper yang dibutuhkan
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation(); // Inisialisasi service validation
    }

    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('auth/login'); // Memuat view login
    }

    public function processLogin()
    {
        // Aturan validasi
        $rules = [
            'email' => 'required|valid_email',
            // 'password' => 'required|min_length[6]', // Sesuaikan min_length sesuai kebutuhan
        ];

        if (! $this->validate($rules)) {
            // Jika validasi gagal, kembalikan input dan error ke halaman login
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();
        // dd("test");

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                $roleModel = new RoleModel();
                $role = $roleModel->where('id', $user['id_role'])->first();

                // Login berhasil, set data session
                $this->session->set([
                    'id_user' => $user['id'],
                    'email_user' => $user['email'],
                    'nama_user' => $user['full_name'], // Sesuaikan dengan kolom di tabel user Anda
                    'id_user_role' => $user['id_role'], // Sesuaikan dengan kolom di tabel user Anda
                    'user_role' => $role['nama'], // Sesuaikan dengan kolom di tabel user Anda
                    'isLoggedIn' => TRUE,
                ]);

                // Redirect ke halaman dashboard
                return redirect()->to(base_url('dashboard'));
            } else {
                // Password salah
                $this->session->setFlashdata('error', 'Email atau password salah.');
                return redirect()->back()->withInput();
            }
        } else {
            // User tidak ditemukan
            $this->session->setFlashdata('error', 'Email atau password salah.');
            return redirect()->back()->withInput();
        }
    }

    public function register()
    {
        // Jika sudah login, redirect ke dashboard
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('dashboard'));
        }
        return view('auth/register'); // Memuat view register
    }

    public function processRegister()
    {
        // Definisikan aturan validasi untuk pendaftaran
        $rules = [
            'full_name' => 'required|min_length[3]|max_length[255]',
            'email'     => 'required|valid_email|is_unique[users.email]', // Pastikan email unik di tabel users
            'password'  => 'required|min_length[6]',
            'pass_confirm' => 'required|matches[password]', // Memastikan password cocok dengan konfirmasi
        ];

        // Jalankan validasi
        if (! $this->validate($rules)) {
            // Jika validasi gagal, kembalikan input dan error ke halaman register
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Jika validasi berhasil, simpan data user baru
        $userModel = new UserModel();

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Hash password
            'id_role'   => 2,
        ];

        if ($userModel->insert($data)) {
            $this->session->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
            return redirect()->to(base_url('auth/login')); // Redirect ke halaman login setelah register
        } else {
            $this->session->setFlashdata('error', 'Terjadi kesalahan saat registrasi. Mohon coba lagi.');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        // Hapus semua data session
        $this->session->destroy();
        // Redirect ke halaman login
        return redirect()->to(base_url('auth/login'));
    }
}
