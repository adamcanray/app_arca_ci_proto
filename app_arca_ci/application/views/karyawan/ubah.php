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
                Form Ubah Data karyawan
            </div>
            <div class="card-body">
                <!-- form -->
                <form action="" method="post">
                    <!-- input hidden, menyimpan id -->
                    <input type="hidden" name="id" value="<?= $karyawan['id']; ?>">
                    <!-- input -->
                    <div class="form-group">
                        <label for="nama_karyawan">Nama</label><br>
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?= $karyawan['nama_karyawan']; ?>">
                        <small class="form-text text-danger"><?= form_error('nama_karyawan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="no_induk_pegawai">No Induk Pegawai(6 Digit)</label><br>
                        <!-- NIP redonly - tidak bisa diubah / tetapi rentan, karena bisa diubah dengan inspect element -->
                        <input type="text" class="form-control" id="no_induk_pegawai" name="no_induk_pegawai" value="<?= $karyawan['no_induk_pegawai']; ?>" readonly>
                        <small class="form-text text-danger"><?= form_error('no_induk_pegawai'); ?></small>

                    </div>
                    <div class="form-group">
                        <label for="gaji_pokok">Gaji Pokok</label><br>
                        <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" value="<?= $karyawan['gaji_pokok']; ?>">
                        <small class="form-text text-danger"><?= form_error('gaji_pokok'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="gaji_tunjangan">Gaji Tunjangan</label><br>
                        <input type="text" class="form-control" id="gaji_tunjangan" name="gaji_tunjangan" value="<?= $karyawan['gaji_tunjangan']; ?>">
                        <small class="form-text text-danger"><?= form_error('gaji_tunjangan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="gaji_lain">Gaji lain-lain</label><br>
                        <small class="small-muted">Ex input: (5xx,xxx.xx)</text>
                        <input type="text" class="form-control" id="gaji_lain" name="gaji_lain" value="<?= $karyawan['gaji_lain']; ?>">
                        <small class="form-text text-danger"><?= form_error('gaji_lain'); ?></small>
                    </div>
                    <!-- button -->
                    <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                </form>        
            </div>
        </div>

        </div>
    </div>
</div>