<?php
// class karyawan
class Karyawan extends CI_Controller {
    // 
    public function __construct()
    {
        parent::__construct();
        // load  model
        $this->load->model('Karyawan_model', 'karyawan');
        // load validation form
        $this->load->library('form_validation');
    }
    // buat method index
    public function index()
    {
        // title
        $data['judul'] = 'Data Karyawan | PT. Arca International';
        // dorm cari
        // ambil data keyword
        // jika tombol submit ditekan
        if ( $this->input->post("submit") ) {
            // maka masukan ke pencarian
            $data['keyword'] = $this->input->post('keyword');
            // jalankan session dengan menset keyword dengan data keyword
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            // tampilkan semua data sesuai keyword pencarian
            $data['keyword'] = $this->session->userdata('keyword');
        }
        // query terakhir
        $this->db->like('nama_karyawan', $data['keyword']);
        // $this->db->or_like('email', $data['keyword']);
        
        // config
        // load pagination
        $this->load->library('pagination');
        // tabel
        $this->db->from('karyawan');
        // total baris
        // count_all_result - akan menghitung berapa banyak baris yang dikembalikan pada query terakhir yang kita lakukan
        $config['total_rows'] = $this->db->count_all_results();
        // simpan total rows ke data, agar bisa dipanggil dengan variabel
        $data['total_rows'] = $config['total_rows'];
        // per page
        $config['per_page'] = 5;
        // initialize
        $this->pagination->initialize($config);
        // segment adalah ambil data dari uri / url segment ke tiga
        $data['start'] = $this->uri->segment(3);
        // simpan semua data tampilan dari model peoples dengan method getAllPeoples()
        // getPeople(berapaDataYangtampil, mulaiDariDataKeberapa) - parameternya 2 (limit), 3 parameter jika menggunakan fitur search data
        $data['karyawan'] = $this->karyawan->getKaryawan($config['per_page'], $data['start'], $data['keyword']);

        // tampilkan semua data karyawan
        // $data['karyawan'] = $this->karyawan->getAllKaryawan();
        
        // load view
        $this->load->view('templates/header', $data);
        $this->load->view('karyawan/index', $data);
        $this->load->view('templates/footer');
    }
    // method tambah
    public function tambah()
    {
        // title
        $data['judul'] = 'Tambah Data Karyawan';
        // set rules validation form
        // set_rules 3 parameter
        //  - element, mana yang ingin kita kasih rules, diambil berdasarkan name
        //  - nama alias, nama lain dari parameter ke-1, contoh: begitu tombol submit ditekan, keluar pesan "field 'nama' harus diisi"
        //  - rules nya, apa 
        // no_induk_pegawai itu uqnique
        $is_unique =  '|is_unique[karyawan.no_induk_pegawai]';
        $this->form_validation->set_rules('nama_karyawan', 'Nama', 'required');
        $this->form_validation->set_rules('no_induk_pegawai', 'NIP', 'required|numeric' . $is_unique);
        $this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required');
        $this->form_validation->set_rules('gaji_tunjangan', 'Gaji Tunjangan', 'required');
        $this->form_validation->set_rules('gaji_lain', 'Gaji Lain', 'required');
        // validation form ci
        // jika gagal melewati validasi
        if ( $this->form_validation->run() == FALSE ) {
            // maka
            $this->load->view('templates/header', $data);
            $this->load->view('karyawan/tambah');
            $this->load->view('templates/footer');    
        } else {
            // jika berhasil, maka insert ke database
            // dengan..
            // jalankan fungsi di dalam model, file/class Mahasiswa_model panggil fungsi tambahDataMahasiswa() 
            $this->karyawan->tambahDataKaryawan();
            // sebelum redirect, set_flasdata(namaSession,isiNya)
            $this->session->set_flashdata('flash', 'Ditambahkan');
            // fungsi redirect ci, parameter(controller, method)
            redirect('karyawan');

        }
    }
    // method bonus
    public function bonus()
    {
        // title
        $data['judul'] = 'Bonus Tahunan Karyawan | PT. Arca International';

        // dorm cari
        // ambil data keyword
        // jika tombol submit ditekan
        if ( $this->input->post("submit") ) {
            // maka masukan ke pencarian
            $data['keyword'] = $this->input->post('keyword');
            // jalankan session dengan menset keyword dengan data keyword
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            // tampilkan semua data sesuai keyword pencarian
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // query terakhir
        $this->db->like('nama_karyawan', $data['keyword']);
        // $this->db->or_like('email', $data['keyword']);

        // karyawan
        // tampilkan semua data karyawan
        $data['karyawan'] = $this->karyawan->getAllKaryawan();
        // total rows dari tabel karyawan_bonus_2019
        $data['rows_karyawan'] = $this->db->affected_rows($data['karyawan']);
        
        // karyawan terpilih bonus
        // tampilkan semua da ditabel karyawan_bonus_2019
        $data['karyawan_bonus'] = $this->karyawan->getAllKaryawanBonus();
        // total rows dari tabel karyawan_bonus_2019
        $data['rows_karyawan_bonus'] = $this->db->affected_rows($data['karyawan_bonus']);

        // ---------------TOTAL BONUS TAHUNAN HANYA DITAMPILKAN TIDAK DISIMPAN DIDATABASE
        // tampilkan data total_bonus_tahunan
        // $data['total_bonus_tahunan'] = $this->karyawan->getTotalBonusTahunan();
        
        // load view
        $this->load->view('templates/header', $data);
        $this->load->view('karyawan/bonus', $data);
        $this->load->view('templates/footer');
    }
    // hapus bonus tahunan
    public function hapusBonusTahunan($id)
    {
        // jalan kan model dan method
        $this->karyawan->eksekusiHapusBonusTahunan($id);
        // redierect
        redirect('karyawan/bonus');
    }
    // method detail
    public function detail($id)
    {
        // title
        $data['judul'] = 'Detail Karyawan';
        // data karyawan
        $data['karyawan'] = $this->karyawan->getKaryawanById($id);
        // load view
        $this->load->view('templates/header', $data);
        $this->load->view('karyawan/detail', $data);
        $this->load->view('templates/footer');
    }
    // methof ubah
    public function ubah($id)
    {
        // title
        $data['judul'] = 'Ubah Data Karyawan';
        // data karyawan
        $data['karyawan'] = $this->karyawan->getKaryawanById($id);
        // set rules validation form
        // set_rules 3 parameter
        //  - element, mana yang ingin kita kasih rules, diambil berdasarkan name
        //  - nama alias, nama lain dari parameter ke-1, contoh: begitu tombol submit ditekan, keluar pesan "field 'nama' harus diisi"
        //  - rules nya, apa 
        $this->form_validation->set_rules('nama_karyawan', 'Nama', 'required');
        $this->form_validation->set_rules('no_induk_pegawai', 'NIP', 'required|numeric');
        // validation form ci
        // jika gagal melewati validasi
        if ( $this->form_validation->run() == FALSE ) {
            // maka
            $this->load->view('templates/header', $data);
            $this->load->view('karyawan/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            // jika berhasil, maka insert ke database
            // dengan..
            // jalankan fungsi di dalam model, file/class Mahasiswa_model panggil fungsi tambahDataMahasiswa() 
            $this->karyawan->ubahDataKaryawan($id);
            // sebelum redirect, set_flasdata(namaSession,isiNya)
            $this->session->set_flashdata('flash', 'Diubah');
            // fungsi redirect ci, parameter(controller, method)
            redirect('karyawan');

        }
    }
    // hapus data karyawan
    public function hapus($id)
    {
        // jalankan model dan method
        $this->karyawan->hapusDataKaryawan($id);
        // setflasher
        $this->session->set_flashdata('flash', 'Dihapus');
        // fungsi redirect ke kontroller karyawan
        redirect('karyawan');
    }
    // karyawanToBonus
    public function karyawanToBonus($id)
    {
        // ambil data karyawan di tabel 'karyawan' lalu simpan ke variabel
        $karyawan = $this->db->get_where('karyawan', ['id' => $id])->row_array();
        // ambil data karyawan di tabel 'karyawan_bonus_2019' lalu simpan ke variabel
        $karyawan_bonus = $this->db->get_where('karyawan_bonus', ['id_karyawan' => $id])->row_array();
        
        // jika id 'karyawan' TIDAK sama dengan id_karyawan di tabel 'karyawan_bonus_2019' maka true
        if ( $karyawan['id'] !== $karyawan_bonus['id_karyawan'] ) {
            // maka
            // jika berhasil, maka insert ke database
            // dengan..
            // insert / simpan semua data karyawan terpilih ke tabel karyawan_bonus_2019
            $this->karyawan->tambahKaryawanBonus($karyawan['nama_karyawan'],$karyawan['gaji_pokok'],$karyawan['id']);
            // fungsi redirect ke kontroller karyawan, method bonus
            redirect('karyawan/bonus');
        } else {
            // jika id sama (berarti karyawan tersebut sudah ada di database)
            // sebelum redirect, set_flasdata(namaSession,isiNya)
            $this->session->set_flashdata('flash', 'Ditambahkan');
            // redierect
            redirect('karyawan/bonus');
        }

    }
    // karyawan bonus
    // hapusBonus
    public function hapusBonus($id)
    {
        // jalankan model dan method
        $this->karyawan->hapusKaryawanBonus($id);
        // setflasher
        // $this->session->set_flashdata('flash', 'Dihapus');
        // fungsi redirect ke kontroller karyawan
        redirect('karyawan/bonus');
    }
    //total bonus


}