<?php

class M_akun extends CI_Model
{
    function data_user($id_user)
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('level_user lu', 'u.level_user = lu.id_level');
        $this->db->where('u.id_user', $id_user);
        $query = $this->db->get();
        return $query->row_array();
    }

    function tambah_user($data)
    {
        return $this->db->insert('user', $data);
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit_data($where)
    {
        return $this->db->get_where('user', $where);
    }

    function update_user($where, $data)
    {
        return $this->db->update('user', $data, $where);
    }

    function tampil_data_admin($nama_level = 'admin')
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('level_user', 'user.level_user = level_user.id_level');
        $this->db->where("level_user.nama_level = '$nama_level'");
        $query = $this->db->get();
        return $query->result_array();
    }

    function tampil_data_member($nama_level = 'member')
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('level_user', 'user.level_user = level_user.id_level');
        $this->db->where("level_user.nama_level = '$nama_level'");
        $query = $this->db->get();
        return $query->result_array();
    }

    function tampil_data_chef($nama_level = 'chef')
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('level_user', 'user.level_user = level_user.id_level');
        $this->db->where("level_user.nama_level = '$nama_level'");
        $query = $this->db->get();
        return $query->result_array();
    }

    function tampil_data_driver($nama_level = 'driver')
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('level_user', 'user.level_user = level_user.id_level');
        $this->db->where("level_user.nama_level = '$nama_level'");
        $query = $this->db->get();
        return $query->result_array();
    }

    function tambah_menu($data)
    {
        return $this->db->insert('daftar_menu', $data);
    }

    function tampil_menu()
    {
        return $this->db->get('daftar_menu')->result_array();
    }

    function edit_menu($where)
    {
        return $this->db->get_where('daftar_menu', $where);
    }

    function update_menu($where, $data)
    {
        return $this->db->update('daftar_menu', $data, $where);
    }

    function getCart_menu($table, $id)
    {
        $this->db->where('id_menu', $id);
        $getData = $this->db->get($table);
        return $getData->row();
    }

    function tambah_cart($data)
    {
        return $this->db->insert('keranjang', $data);
    }

    function tambah_pesanan($data)
    {
        return $this->db->insert('pemesanan', $data);
    }

    function jumlah_pesanan()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function jumlah_menu()
    {
        $this->db->select('*');
        $this->db->from('daftar_menu');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function jumlah_member()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where("level_user = '2'");
        $query = $this->db->get();
        return $query->num_rows();
    }

    function pesanan_diproses()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where("status_pemesanan = '1'");
        $query = $this->db->get();
        return $query->num_rows();
    }

    function data_pesanan()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('status_pemesanan', 'pemesanan.status_pemesanan = status_pemesanan.id_status');
        $this->db->join('metode_pembayaran', 'metode_pembayaran.id_metode = pemesanan.metode_pembayaran');
        $this->db->join('user', 'user.id_user = pemesanan.id_pemesan');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where("status_pemesanan.status != 'selesai' ");
        $query = $this->db->get();
        return $query->result_array();
    }

    function riwayat_pesanan()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('status_pemesanan', 'pemesanan.status_pemesanan = status_pemesanan.id_status');
        $this->db->join('metode_pembayaran', 'metode_pembayaran.id_metode = pemesanan.metode_pembayaran');
        $this->db->join('user', 'user.id_user = pemesanan.id_pemesan');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where("status_pemesanan.status = 'selesai' ");
        $query = $this->db->get();
        return $query->result_array();
    }

    function pesanan_selesai()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('status_pemesanan', 'pemesanan.status_pemesanan = status_pemesanan.id_status');
        $this->db->join('metode_pembayaran', 'metode_pembayaran.id_metode = pemesanan.metode_pembayaran');
        $this->db->join('user', 'user.id_user = pemesanan.id_pemesan');
        $this->db->where("status_pemesanan.status = 'selesai' ");
        $query = $this->db->get();
        return $query->result_array();
    }

    function data_pesanan_admin()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('status_pemesanan', 'pemesanan.status_pemesanan = status_pemesanan.id_status');
        $this->db->join('metode_pembayaran', 'metode_pembayaran.id_metode = pemesanan.metode_pembayaran');
        $this->db->where("status_pemesanan.status != 'selesai' ");
        $query = $this->db->get();
        return $query->result_array();
    }

    function data_pesanan_chef()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('status_pemesanan', 'pemesanan.status_pemesanan = status_pemesanan.id_status');
        $this->db->join('metode_pembayaran', 'metode_pembayaran.id_metode = pemesanan.metode_pembayaran');
        $this->db->where("status_pemesanan.status = 'Terkonfirmasi'");
        $query = $this->db->get();
        return $query->result_array();
    }

    function data_pesanan_driver()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('status_pemesanan', 'pemesanan.status_pemesanan = status_pemesanan.id_status');
        $this->db->join('metode_pembayaran', 'metode_pembayaran.id_metode = pemesanan.metode_pembayaran');
        $this->db->where("status_pemesanan.status = 'selesai dibuat'");
        $query = $this->db->get();
        return $query->result_array();
    }

    function pesanan_dibuat()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('status_pemesanan', 'pemesanan.status_pemesanan = status_pemesanan.id_status');
        $this->db->join('metode_pembayaran', 'metode_pembayaran.id_metode = pemesanan.metode_pembayaran');
        $this->db->where("status_pemesanan.status = 'dibuat'");
        $query = $this->db->get();
        return $query->result_array();
    }

    function pesanan_diantar()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('status_pemesanan', 'pemesanan.status_pemesanan = status_pemesanan.id_status');
        $this->db->join('metode_pembayaran', 'metode_pembayaran.id_metode = pemesanan.metode_pembayaran');
        $this->db->where("status_pemesanan.status = 'diantar'");
        $query = $this->db->get();
        return $query->result_array();
    }

    function detail_pesanan($kode_transaksi)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('status_pemesanan', 'pemesanan.status_pemesanan = status_pemesanan.id_status');
        $this->db->where('kode_transaksi', $kode_transaksi);
        $query = $this->db->get();
        return $query->row_array();
    }

    function detail_keranjang($kode_transaksi)
    {
        $this->db->select('*');
        $this->db->from('keranjang');
        $this->db->join('daftar_menu', 'keranjang.id_menu = daftar_menu.id_menu');
        $this->db->where('kode_transaksi', $kode_transaksi);
        $query = $this->db->get();
        return $query->row_array();
    }

    function bayar($where, $update)
    {
        return $this->db->update('pemesanan', $update, $where);
    }

    function tambah_bukti($data)
    {
        return $this->db->insert('bukti_pembayaran', $data);
    }

    function tampil_bukti($kode_transaksi)
    {
        $this->db->select('*');
        $this->db->from('bukti_pembayaran');
        $this->db->where('kode_transaksi', $kode_transaksi);
        $query = $this->db->get();
        return $query->row_array();
    }

    function hapus_pesanan($kode_transaksi)
    {
        $this->db->trans_start();
        $this->db->delete('pemesanan', array('kode_transaksi' => $kode_transaksi));
        $this->db->delete('keranjang', array('kode_transaksi' => $kode_transaksi));
        $this->db->trans_complete();
    }
}
