<!-- halaman detail karyawan -->
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                    <div class="card-header">
                        Detail Data Karyawan
                    </div>
                    <div class="card-body">
                        
                        <!-- fituer img di v1.1 -->
                        <!-- <img width="200" class="ronded-cicle"src="<?= base_url(); ?>assets/img/foto-7.png" alt="Picture"> -->

                        <h5 class="card-title"><?= $karyawan['nama_karyawan']; ?></h5>
                        <h6 class="card-subtitle mb-3 text-muted"><?= $karyawan['no_induk_pegawai']; ?></h6>
                        <h6>Gaji Pokok:</h6>
                        <p class="card-subtitle mb-2">Rp<?= $karyawan['gaji_pokok'] ?></p>
                        <h6>Gaji Tunjangan:</h6>                        
                        <p class="card-subtitle mb-2">Rp<?= $karyawan['gaji_tunjangan'] ?></p>
                        <h6>Gaji lain-lain:</h6>                        
                        <p class="card-subtitle">Rp<?= $karyawan['gaji_lain'] ?></p>
                        <br>
                        <a href="<?= base_url(); ?>karyawan" class="btn btn-primary">Kembali</a>
                    </div>
            </div>
        </div>
    </div>
</div>