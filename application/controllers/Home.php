<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    function index()
    {

        $this->load->view('templates_member/header');
        $this->load->view('home_member');
        $this->load->view('templates_member/footer.php');
    }

    // public function login()
    // {
    //     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required');

    //     $email = $this->input->post('email');
    //     $password = $this->input->post('password');

    //     $this->m_login->cek_login($email, $password);
    //     $user = $this->db->get_where('user', ['email' => $email])->row_array();

    //     // validasi login

    //     if ($user) {
    //         if (password_verify($password, $user['password'])) {
    //             $data = [
    //                 'email' => $user['email'],
    //                 'level_user' => $user['level_user']
    //             ];

    //             $this->session->set_userdata($data);
    //             if ($user['level_user'] == 1) {
    //                 redirect('admin');
    //             } else if ($user['level_user'] == 2) {
    //                 redirect('member');
    //             } else if ($user['level_user'] == 3) {
    //                 redirect('chef');
    //             } else {
    //                 redirect('driver');
    //             }
    //         } else {
    //             $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">Password Salah!. Silahkan Coba Lagi</div>');
    //             redirect('home');
    //         }
    //     } else {
    //         $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">Email Tidak Terdaftar!. Silahkan Coba Lagi</div>');
    //         redirect('home');
    //     }
    // }
}
