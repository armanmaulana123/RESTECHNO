<?php

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!empty($this->session->userdata('id_user'))) {
            redirect('akun');
        }
        $this->load->model('m_auth');
    }

    function index()
    {
        return view('login');
    }

    function aksi_login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('auth');
        }

        $email = htmlspecialchars($this->input->post('email', true));
        $password = htmlspecialchars($this->input->post('password', true));

        $user = $this->m_auth->cek_user($email);
        // return var_dump(password_verify(1, 1));
        $hash = password_hash($user['password'], PASSWORD_DEFAULT);
        if (password_verify(md5($password), $hash)) {
            $data = [
                'id_user' => $user['id_user'],
                'nama' => $user['nama'],
                'no_hp' => $user['no_hp'],
                'alamat' => $user['alamat'],
                'email' => $user['email'],
                'level_user' => $user['level_user']
            ];
            $this->session->set_userdata($data);
            // return var_dump ($user);
            if ($user['level_user'] >= 1 && $user['level_user'] <= 4) {
                redirect('akun');
            } else {
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Password Salah'
            ));
            redirect('auth');
        }
    }

    function registrasi_member()
    {
        return view('register_member');
    }

    function aksi_register_member()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]', [
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $pesan = array();

        if ($this->form_validation->run() == false) {
            array_push($pesan, validation_errors());
        }
        $config['upload_path']         = 'assets/img/profile/user/';  // folder upload 
        $config['allowed_types']        = 'gif|jpg|png'; // jenis file
        $config['max_size']             = 3000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $image = $file['file_name'];


        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => md5($this->input->post('password', true)),
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'image' => $image,
            'level_user' => 2,
        ];
        if (empty($pesan)) {
            $result = $this->m_auth->tambah_user($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode(',', $pesan)
            ));
            redirect('auth/registrasi_member');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Pendaftaran Berhasil Dilakukan'
            ));
            redirect('auth');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Pendaftaran Gagal Dilakukan'
            ));
            redirect('auth/registrasi_member');
        }
    }
}
