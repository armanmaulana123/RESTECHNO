<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_akun');
        $this->load->library('cart');
        if (empty($this->session->userdata('id_user'))) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['jumlah'] = $this->m_akun->jumlah_pesanan();
        $data['menu'] = $this->m_akun->jumlah_menu();
        $data['member'] = $this->m_akun->jumlah_member();
        $data['pesanan'] = $this->m_akun->pesanan_diproses();
        // return var_dump($data['user']);
        return view('home_akun', $data);
    }

    public function profile()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        return view('profile', $data);
    }

    // Showing Data User //

    public function data_admin()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['tampil'] = $this->m_akun->tampil_data_admin();
        return view('data_admin', $data);
    }

    public function data_member()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['tampil'] = $this->m_akun->tampil_data_member();
        return view('data_member', $data);
    }

    public function data_chef()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['tampil'] = $this->m_akun->tampil_data_chef();
        return view('data_chef', $data);
    }

    public function data_driver()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['tampil'] = $this->m_akun->tampil_data_driver();
        return view('data_driver', $data);
    }

    // End Of Showing Data User //

    // Adding User //

    public function registrasi_admin()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        return view('register_admin', $data);
    }

    function aksi_register_admin()
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
        $config['upload_path']          = 'assets/img/profile/user/';  // folder upload 
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
            'level_user' => 1,
        ];
        if (empty($pesan)) {
            $result = $this->m_akun->tambah_user($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode(',', $pesan)
            ));
            redirect('akun/registrasi_admin');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Pendaftaran Berhasil Dilakukan'
            ));
            redirect('akun/data_admin');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Pendaftaran Gagal Dilakukan'
            ));
            redirect('akun/registrasi_admin');
        }
    }

    public function registrasi_chef()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        return view('register_chef', $data);
    }

    function aksi_register_chef()
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
        $config['upload_path']          = 'assets/img/profile/user/';  // folder upload 
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
            'level_user' => 3,
        ];
        if (empty($pesan)) {
            $result = $this->m_akun->tambah_user($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode(',', $pesan)
            ));
            redirect('akun/registrasi_chef');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Pendaftaran Berhasil Dilakukan'
            ));
            redirect('akun/data_chef');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Pendaftaran Gagal Dilakukan'
            ));
            redirect('akun/registrasi_chef');
        }
    }

    public function registrasi_driver()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        return view('register_driver', $data);
    }

    function aksi_register_driver()
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
        $config['upload_path']          = 'assets/img/profile/user/';  // folder upload 
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
            'level_user' => 4,
        ];
        if (empty($pesan)) {
            $result = $this->m_akun->tambah_user($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode(',', $pesan)
            ));
            redirect('akun/driver');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Pendaftaran Berhasil Dilakukan'
            ));
            redirect('akun/data_driver');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Pendaftaran Gagal Dilakukan'
            ));
            redirect('akun/registrasi_driver');
        }
    }

    // End Of Adding User//

    // Delete Data User //

    function hapus($id_user)
    {

        $where = array('id_user' => $id_user);
        $result = $this->m_akun->hapus_data($where, 'user');
        if ($result == true) {
            $this->session->set_flashdata('Pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Data Berhasil Dihapus'
            ));
            redirect('akun');
        } else {
            $this->session->set_flashdata('Pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Data Gagal Dihapus'
            ));
            redirect('akun');
        }
    }

    // End Of Delete Data User //

    // Edit Data User //

    function edit($id)
    {
        $where = array('id_user' => $id);
        $data['edit'] = $this->m_akun->edit_data($where)->row_array();
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));

        return view('edit_user', $data);
    }

    function update_user()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $pesan = array();

        if ($this->form_validation->run() == false) {
            array_push($pesan, validation_errors());
        }
        $config['upload_path']          = 'assets/img/profile/user/';  // folder upload 
        $config['allowed_types']        = 'gif|jpg|png'; // jenis file
        $config['max_size']             = 3000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image') && $_FILES['image']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $image = $_FILES['image']['size'] != 0 ? $file['file_name'] : $this->input->post('image1');


        $update = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'image' => $image,
        ];

        $where = array(
            'id_user' => htmlspecialchars($this->input->post('id_user', true))
        );

        if (empty($pesan)) {
            $result = $this->m_akun->update_user($where, $update);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode(',', $pesan)
            ));
            redirect('akun/edit');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Perubahan Berhasil Dilakukan'
            ));
            redirect('akun');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Perubahan Gagal Dilakukan'
            ));
            redirect('akun/edit');
        }
    }

    // End Of Edit Data User //

    // Showing Daftar Menu //

    public function daftar_menu_admin()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['menu'] = $this->m_akun->tampil_menu();
        return view('daftar_menu_admin', $data);
    }

    public function daftar_menu_user()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['menu'] = $this->m_akun->tampil_menu();
        return view('daftar_menu_user', $data);
    }

    public function daftar_menu_chef()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['menu'] = $this->m_akun->tampil_menu();
        return view('daftar_menu_chef', $data);
    }

    public function daftar_menu_driver()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['menu'] = $this->m_akun->tampil_menu();
        return view('daftar_menu_chef', $data);
    }

    // End Of Showing Daftar Menu

    // Adding Daftar Menu //

    public function tambah_daftar_menu()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        return view('tambah_daftar_menu', $data);
    }

    public function aksi_tambah_menu()
    {
        $this->form_validation->set_rules('kategori_menu', 'Kategori_menu', 'required|trim');
        $this->form_validation->set_rules('nama_menu', 'Nama_menu', 'required');
        $this->form_validation->set_rules('harga_menu', 'Harga_menu', 'required|numeric');
        $this->form_validation->set_rules('stok_menu', 'Stok_menu', 'required');

        $pesan = array();

        if ($this->form_validation->run() == false) {
            array_push($pesan, validation_errors());
        }
        $config['upload_path']          = 'assets/img/daftar_menu/';  // folder upload 
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
            'kategori_menu' => htmlspecialchars($this->input->post('kategori_menu', true)),
            'nama_menu' => htmlspecialchars($this->input->post('nama_menu', true)),
            'harga_menu' => htmlspecialchars($this->input->post('harga_menu', true)),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
            'image_menu' => $image
        ];
        if (empty($pesan)) {
            $result = $this->m_akun->tambah_menu($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode(',', $pesan)
            ));
            redirect('akun/tambah_daftar_menu');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Pendaftaran Berhasil Dilakukan'
            ));
            redirect('akun/daftar_menu');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Pendaftaran Gagal Dilakukan'
            ));
            redirect('akun/tambah_daftar_menu');
        }
    }

    // End Of Adding Daftar Menu //

    // Delete Daftar Menu //

    function hapus_menu($id_menu)
    {

        $where = array('id_menu' => $id_menu);
        $result = $this->m_akun->hapus_data($where, 'daftar_menu');
        if ($result == true) {
            $this->session->set_flashdata('Pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Data Berhasil Dihapus'
            ));
            redirect('akun/daftar_menu');
        } else {
            $this->session->set_flashdata('Pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Data Gagal Dihapus'
            ));
            redirect('akun/daftar_menu');
        }
    }

    // End Of Delete Daftar Menu //

    public function edit_menu($id_menu)
    {
        $where = array('id_menu' => $id_menu);
        $data['menu'] = $this->m_akun->edit_menu($where, 'daftar_menu')->row_array();
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));

        return view('edit_menu', $data);
    }

    public function update_menu()
    {
        $this->form_validation->set_rules('kategori_menu', 'Kategori_menu', 'required|trim');
        $this->form_validation->set_rules('nama_menu', 'Nama_menu', 'required|trim');
        $this->form_validation->set_rules('harga_menu', 'Harga_menu', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        $pesan = array();

        if ($this->form_validation->run() == false) {
            array_push($pesan, validation_errors());
        }
        $config['upload_path']          = 'assets/img/daftar_menu/';  // folder upload 
        $config['allowed_types']        = 'gif|jpg|png'; // jenis file
        $config['max_size']             = 3000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image') && $_FILES['image']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $image = $_FILES['image']['size'] != 0 ? $file['file_name'] : $this->input->post('image1');


        $update = [
            'kategori_menu' => htmlspecialchars($this->input->post('kategori_menu', true)),
            'nama_menu' => htmlspecialchars($this->input->post('nama_menu', true)),
            'harga_menu' => htmlspecialchars($this->input->post('harga_menu', true)),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
            'image_menu' => $image,
        ];

        $where = array(
            'id_menu' => htmlspecialchars($this->input->post('id_menu', true))
        );

        if (empty($pesan)) {
            $result = $this->m_akun->update_menu($where, $update);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode(',', $pesan)
            ));
            redirect('akun/daftar_menu_admin');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Pendaftaran Berhasil Dilakukan'
            ));
            redirect('akun/daftar_menu_admin');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Pendaftaran Gagal Dilakukan'
            ));
            redirect('akun/daftar_menu_admin');
        }
    }

    // Showing Cart //

    public function keranjang()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['keranjang'] = $this->cart->contents();

        return view('keranjang', $data);
    }

    // End Of Showing Cart //

    // Add Cart //

    public function addCart($id)
    {
        $getData = $this->m_akun->getCart_menu('daftar_menu', $id);
        $data = array(
            'id' => $getData->id_menu,
            'name' => $getData->nama_menu,
            'qty' => 1,
            'price' => $getData->harga_menu,
            'gambar' => $getData->image_menu
        );
        $this->cart->insert($data);
        redirect('akun/showCart');
    }

    // End Of Add Cart //

    // Action Of Showing Cart //

    public function showCart()
    {
        $keranjang = $this->cart->contents();
        redirect('akun/keranjang', $keranjang);
    }

    // End Of Action Of Showing Cart

    // Delete Item In Cart //

    public function hapus_item($rowid)
    {
        $this->cart->update(array('rowid' => $rowid, 'qty' => 0));
        redirect('akun/keranjang');
    }

    // End Of Delete Item In Cart //

    // Updating Cart Item //

    // public function update_item($rowid)
    // {
    //     $data = array(
    //         'rowid' => $rowid,
    //         'qty'   => $this->input->post('qty')
    //     );
    //     $this->cart->update($data);
    //     redirect('akun/keranjang', 'refresh');
    // }

    // Destroy Item In Cart //

    public function hapusCart()
    {
        $result = $this->cart->destroy();
        if ($result == true) {
            $this->session->set_flashdata('Pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Keranjang Berhasil Dihapus'
            ));
            redirect('akun/keranjang');
        } else {
            $this->session->set_flashdata('Pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Keranjang Gagal Dihapus'
            ));
            redirect('akun/keranjang');
        }
    }

    // End of Destroy Cart //

    // Checkout //

    public function checkout()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['keranjang'] = $this->cart->contents();

        return view('checkout', $data);
    }

    public function proses_checkout()
    {
        $keranjang = $this->cart->contents();

        $this->form_validation->set_rules('nama_penerima', 'Nama_penerima', 'required');
        $this->form_validation->set_rules('email_penerima', 'Email_penerima', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required|numeric');
        $this->form_validation->set_rules('alamat_penerima', 'Alamat_penerima', 'required');

        $pesan = array();

        if ($this->form_validation->run() == false) {
            array_push($pesan, validation_errors());
        } else {
            $order = array();
            foreach ($keranjang as $keranjang) {
                $sub_total = $keranjang['price'] * $keranjang['qty'];
                $data = array(
                    'id_user' => htmlspecialchars($this->input->post('id_user', true)),
                    'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true)),
                    'id_menu' => $keranjang['id'],
                    'qty' => $keranjang['qty'],
                    'sub_total' => $sub_total
                );
                $order[] = $data;
            }
            foreach ($order as $o) {

                $this->m_akun->tambah_cart($o);
            }


            $data = array(
                'id_pemesan' => htmlspecialchars($this->input->post('id_user', true)),
                'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true)),
                'total_bayar' => htmlspecialchars($this->input->post('total_bayar', true)),
                'nama_penerima' => htmlspecialchars($this->input->post('nama_penerima', true)),
                'email_penerima' => htmlspecialchars($this->input->post('email_penerima', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'alamat_penerima' => htmlspecialchars($this->input->post('alamat_penerima', true)),
                'status_pemesanan' => 2,
                'metode_pembayaran' => 3
            );

            $result = $this->m_akun->tambah_pesanan($data);
            if ($result == true) {
                $this->cart->destroy();
                $this->session->set_flashdata('pesan', array(
                    'status_pesan' => true,
                    'isi_pesan' => 'Pendaftaran Berhasil Dilakukan'
                ));
                redirect('akun/daftar_menu_user');
            } else {
                $this->session->set_flashdata('pesan', array(
                    'status_pesan' => false,
                    'isi_pesan' => 'Pendaftaran Gagal Dilakukan'
                ));
                redirect('akun/checkout');
            }
        }
    }

    // Ending of proses_checkout //

    // Data Pesanan User //

    public function data_pesanan_user()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['pesanan'] = $this->m_akun->data_pesanan();
        return view('data_pesanan_user', $data);
    }

    // Ending of Data Pesanan User //

    public function tampil_data_pesanan($kode_transaksi)
    {
        $data = $this->m_akun->detail_pesanan($kode_transaksi);
        echo json_encode($data);
    }

    public function tampil_detail_keranjang($kode_transaksi)
    {
        $data = $this->m_akun->detail_keranjang($kode_transaksi);
        echo json_encode($data);
    }

    public function pesanan($kode_transaksi)
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['pesanan'] = $this->m_akun->detail_keranjang($kode_transaksi);
        return view('pesanan', $data);
    }

    public function pesanan_user($kode_transaksi)
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['pesanan'] = $this->m_akun->detail_keranjang($kode_transaksi);
        return view('pesanan_user', $data);
    }

    public function hapus_pesanan($kode_transaksi)
    {
        $result = $this->m_akun->hapus_pesanan($kode_transaksi);
        if ($result == true) {
            $this->session->set_flashdata('Pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Data Berhasil Dihapus'
            ));
            redirect('akun/data_pesanan_user');
        } else {
            $this->session->set_flashdata('Pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Data Gagal Dihapus'
            ));
            redirect('akun/data_pesanan_user');
        }
    }

    public function riwayat_pesanan()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['pesanan'] = $this->m_akun->riwayat_pesanan();
        return view('riwayat_pesanan_user', $data);
    }

    public function pesanan_selesai()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['pesanan'] = $this->m_akun->pesanan_selesai();
        return view('pesanan_selesai', $data);
    }

    public function proses_bayar($kode_transaksi)
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['detail_pesanan'] = $this->m_akun->detail_pesanan($kode_transaksi);
        $data['detail_keranjang'] = $this->m_akun->detail_keranjang($kode_transaksi);
        return view('proses_bayar', $data);
    }

    public function tunai()
    {
        $data = [
            'status_pemesanan' => 1,
            'metode_pembayaran' => 1,
        ];

        $where = array(
            'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true))
        );

        $result = $this->m_akun->bayar($where, $data);

        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Pendaftaran Berhasil Dilakukan'
            ));
            redirect('akun/data_pesanan_user');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Pendaftaran Gagal Dilakukan'
            ));
            redirect('akun/data_pesanan_user');
        }
    }

    public function rekening()
    {
        $data = [
            'status_pemesanan' => 1,
            'metode_pembayaran' => 2,
        ];

        $where = array(
            'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true))
        );

        $result = $this->m_akun->bayar($where, $data);

        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Pendaftaran Berhasil Dilakukan'
            ));
            redirect('akun/data_pesanan_user');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Pendaftaran Gagal Dilakukan'
            ));
            redirect('akun/data_pesanan_user');
        }
    }

    public function bukti_pembayaran($kode_transaksi)
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['detail_pesanan'] = $this->m_akun->detail_pesanan($kode_transaksi);
        return view('bukti_pembayaran', $data);
    }

    public function proses_bukti_pembayaran()
    {
        $this->form_validation->set_rules('kode_transaksi', 'Kode_transaksi', 'required|trim');
        $this->form_validation->set_rules('nama_pengirim', 'Nama_pengirim', 'required|trim');
        $this->form_validation->set_rules('norek_pengirim', 'Norek_pengirim', 'required|trim');
        $this->form_validation->set_rules('nama_bank', 'Nama_bank', 'required');

        $pesan = array();

        if ($this->form_validation->run() == false) {
            array_push($pesan, validation_errors());
        }
        $config['upload_path']          = 'assets/img/bukti_pembayaran/';  // folder upload 
        $config['allowed_types']        = 'gif|jpg|png'; // jenis file
        $config['max_size']             = 3000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('bukti_pembayaran')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $image = $file['file_name'];


        $data = [
            'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true)),
            'nama_pengirim' => htmlspecialchars($this->input->post('nama_pengirim', true)),
            'norek_pengirim' => htmlspecialchars($this->input->post('norek_pengirim', true)),
            'nama_bank' => htmlspecialchars($this->input->post('nama_bank', true)),
            'bukti_pembayaran' => $image
        ];

        if (empty($pesan)) {
            $result['bukti'] = $this->m_akun->tambah_bukti($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode(',', $pesan)
            ));
            redirect('akun/data_pesanan_user');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Bukti Pembayaran Berhasil Dikirim!'
            ));
            redirect('akun/data_pesanan_user');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Bukti Pembayaran Gagal Dikirim!'
            ));
            redirect('akun/data_pesanan_user');
        }
    }

    public function data_pesanan_admin()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['pesanan'] = $this->m_akun->data_pesanan_admin();
        return view('data_pesanan_admin', $data);
    }

    public function bukti_pembayaran_admin($kode_transaksi)
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['bukti'] = $this->m_akun->tampil_bukti($kode_transaksi);
        $data['detail_pesanan'] = $this->m_akun->detail_pesanan($kode_transaksi);
        return view('tampil_bukti_pembayaran', $data);
    }

    public function konfirmasi_pembayaran()
    {
        $data = [
            'status_pemesanan' => 8,
        ];

        $where = array(
            'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true))
        );

        $result = $this->m_akun->bayar($where, $data);

        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Pesanan Terkonfirmasi'
            ));
            redirect('akun/data_pesanan_admin');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Pesanan Belum Dikonfirmasi'
            ));
            redirect('akun/data_pesanan_admin');
        }
    }

    public function data_pesanan_chef()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['pesanan'] = $this->m_akun->data_pesanan_chef();
        return view('data_pesanan_chef', $data);
    }

    public function pesanan_dibuat()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['pesanan'] = $this->m_akun->pesanan_dibuat();
        return view('pesanan_dibuat', $data);
    }

    public function lihat_pesanan_chef($kode_transaksi)
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['pesanan'] = $this->m_akun->detail_keranjang($kode_transaksi);
        $data['detail_pesanan'] = $this->m_akun->detail_pesanan($kode_transaksi);
        return view('lihat_pesanan_chef', $data);
    }

    public function buat_menu()
    {
        $data = [
            'status_pemesanan' => 4,
        ];

        $where = array(
            'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true))
        );

        $result = $this->m_akun->bayar($where, $data);

        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Status Pesanan Berhasil Diperbarui!'
            ));
            redirect('akun/data_pesanan_chef');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Status Pesanan Gagal Diperbarui!'
            ));
            redirect('akun/data_pesanan_chef');
        }
    }

    public function selesai_dibuat()
    {
        $data = [
            'status_pemesanan' => 9,
        ];

        $where = array(
            'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true))
        );

        $result = $this->m_akun->bayar($where, $data);

        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Status Pesanan Berhasil Diperbarui'
            ));
            redirect('akun/data_pesanan_chef');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Status Pesanan Gagal Diperbarui'
            ));
            redirect('akun/data_pesanan_chef');
        }
    }

    public function data_pesanan_driver()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['pesanan'] = $this->m_akun->data_pesanan_driver();
        return view('data_pesanan_driver', $data);
    }

    public function antar()
    {
        $data = [
            'status_pemesanan' => 5,
        ];

        $where = array(
            'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true))
        );

        $result = $this->m_akun->bayar($where, $data);

        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Status Pesanan Berhasil Diperbarui'
            ));
            redirect('akun/data_pesanan_driver');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Status Pesanan Gagal Diperbarui'
            ));
            redirect('akun/data_pesanan_driver');
        }
    }

    public function pesanan_diantar()
    {
        $data['user'] = $this->m_akun->data_user($this->session->userdata('id_user'));
        $data['pesanan'] = $this->m_akun->pesanan_diantar();
        return view('pesanan_diantar', $data);
    }

    public function selesai()
    {
        $data = [
            'status_pemesanan' => 6,
        ];

        $where = array(
            'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true))
        );

        $result = $this->m_akun->bayar($where, $data);

        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Status Pesanan Berhasil Diperbarui'
            ));
            redirect('akun/pesanan_diantar');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Status Pesanan Gagal Diperbarui'
            ));
            redirect('akun/pesanan_diantar');
        }
    }

    // Logout //

    public function logout()
    {
        session_destroy();
        redirect('auth');
    }

    // End Of Logout //
}
