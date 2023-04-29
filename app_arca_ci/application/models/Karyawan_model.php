<?php
// class karyawan_model
class Karyawan_model extends CI_Model {
    // method getAllKaryawan
    public function getAllKaryawan()
    {
        // tampilkan dari data id terbaru
        $this->db->order_by('id', 'DESC');
        // kebalikan nilai semua data karyawan yang ada didatabase dalam bentuk array
        return $this->db->get('karyawan')->result_array();
    }
    // getKaryawan
    public function getKaryawan($per_page,$start, $keyword=null)
    {
        // jika ada keyword
        if ( $keyword ) {
            // tampilkan dari data id terbaru
            $this->db->order_by('id', 'DESC');
            // 
            $this->db->like('nama_karyawan', $keyword);
            // $this->db->or_like('email', $keyword);
        }
        // jika tidak ada keyword
        // tampilkan dari data id terbaru
        $this->db->order_by('id', 'DESC');
        // kembalikan nilai,  dan beri limit
        return $this->db->get('karyawan', $per_page,$start)->result_array();
    }
    // tambah data karyawan
    public function tambahDataKaryawan()
    {
        // siapkan data
        // di ci tidak usah menggunakan $_POST untuk mengambil data dari form
        // tetapi cukup lakukan $this->input->post('name', true),
        // parameter 'true' berarti seperti menggunakan fungsi htmlSpecialChars();
        // agar aman dari sql inject
        $data = [
            "no_induk_pegawai" => $this->input->post('no_induk_pegawai', true),
            "nama_karyawan" => $this->input->post('nama_karyawan', true),
            "gaji_pokok" => $this->input->post('gaji_pokok', true),
            "gaji_tunjangan" => $this->input->post('gaji_tunjangan', true),
            "gaji_lain" => $this->input->post('gaji_lain', true),
        ];
        // insert data ke database
        // insert('namaTabel', data yang ingin di insert)
        $this->db->insert('karyawan', $data); 
    }
    // method getKaryawanById
    public function getKaryawanById($id)
    {
        // ambil data karyawan menurut id, keluarkan dalam bentuk 1 baris array
        return $this->db->get_where('karyawan', ['id' => $id])->row_array();
    }
    // ubahDataKaryawan
    public function ubahDataKaryawan($id)
    {
        // 
        // siapkan data
        // di ci tidak usah menggunakan $_POST untuk mengambil data dari form
        // tetapi cukup lakukan $this->input->post('name', true),
        // parameter 'true' berarti seperti menggunakan fungsi htmlSpecialChars();
        // agar aman dari sql inject
        $data = [
            "nama_karyawan" => $this->input->post('nama_karyawan', true),
            "no_induk_pegawai" => $this->input->post('no_induk_pegawai', true),
            "gaji_pokok" => $this->input->post('gaji_pokok', true),
            "gaji_tunjangan" => $this->input->post('gaji_tunjangan', true),
            "gaji_lain" => $this->input->post('gaji_lain', true)
        ];
        // ambil data id yang di hidden tadi
        $this->db->where('id', $this->input->post('id'));
        // update data ke database
        // update('namaTabel', data yang ingin di insert)
        // kalo pake replace(), maka dihapus dulu barisnya, bikin yang baru
        $this->db->update('karyawan', $data);
    }
    // hapusDataKaryawan
    public function hapusDataKaryawan($id)
    {
        // hapus data dari tabel berdarakan id
        $this->db->delete('karyawan', ['id' => $id]);
    }

    // tambah data karyawan
    public function tambahKaryawanBonus($nama_karyawan,$gaji_pokok,$id)
    {
        // siapkan data dari tabel 'karyawan' untuk disimpan ke tambel 'karyawan_bonus_2019'
        $data = [
            "nama_karyawan" => $nama_karyawan,
            "gaji_pokok" => $gaji_pokok,
            "id_karyawan" => $id
        ];
        // insert data ke database
        // insert('namaTabel', data yang ingin di insert)
        $this->db->insert('karyawan_bonus', $data); 
    }
    // methid getAllKaryawanBonus
    public function getAllKaryawanBonus()
    {
        // susun dari data terbaru
        $this->db->order_by('id', 'DESC');
        // kebalikan nilai semua data karyawan yang ada didatabase dalam bentuk array
        return $this->db->get('karyawan_bonus')->result_array();
    }
    // hapusKaryawanBonus
    public function hapusKaryawanBonus($id)
    {
        // hapus data dari tabel berdarakan id
        $this->db->delete('karyawan_bonus', ['id' => $id]);
    }

    
}