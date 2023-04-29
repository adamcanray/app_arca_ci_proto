<div class="container">

    <!-- tombol tambah data karyawan -->
    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>karyawan" class="btn btn-primary">Kembali</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
        
        <div class="card">
            <div class="card-header">
                Form Tambah Data karyawan
            </div>
            <div class="card-body">
                <!-- form -->
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="nama_karyawan">Nama</label><br>
                        <small class="text-muted">Ex input: Adam Canray</small>
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan">
                        <small class="form-text text-danger"><?= form_error('nama_karyawan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="no_induk_pegawai">No Induk Pegawai(6 Digit)</label><br>
                        <small class="text-muted">Ex input: (12xxxx) - setiap karyawan memiliki Nomor Induk Pegawai yang berbeda</small>
                        
                        <input type="text" class="form-control" id="no_induk_pegawai" name="no_induk_pegawai" minlength="6" maxlength="6">
                        <small class="form-text text-danger"><?= form_error('no_induk_pegawai'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="gaji_pokok">Gaji Pokok</label><br>
                        <small class="text-muted">Ex input: (3,xxx,xxx,xxx,xxx)</small>
                        <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok">
                        <small class="form-text text-danger"><?= form_error('gaji_pokok'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="gaji_tunjangan">Gaji Tunjangan</label><br>
                        <small class="text-muted">Ex input: (1,xxx,xxx,xxx)</small>
                        <input type="text" class="form-control" id="gaji_tunjangan" name="gaji_tunjangan">
                        <small class="form-text text-danger"><?= form_error('gaji_tunjangan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="gaji_lain">Gaji lain-lain</label><br>
                        <small class="small-muted">Ex input: (5,xxx,xxx,xxx)</text>
                        <input type="text" class="form-control" id="gaji_lain" name="gaji_lain">
                        <small class="form-text text-danger"><?= form_error('gaji_lain'); ?></small>
                    </div>
                    <!-- button -->
                    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                </form>        
            </div>
        </div>

        </div>
    </div>
</div>