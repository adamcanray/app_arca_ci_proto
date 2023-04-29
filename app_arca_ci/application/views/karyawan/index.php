<div class="container">

    <!-- pengkondisian jika flaser berhasil -->
    <?php if ( $this->session->flashdata('flash') ) : ?>
        <!-- flasher -->
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    data Karyawan <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- tampilkan data karyawan -->
    <div class="row mt-3">
        <div class="col-md">
            <h2>Daftar Nama Karyawan</h2>
        </div>
    </div>
    <!-- tombol tambah data karyawan -->
    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>karyawan/tambah" class="btn btn-primary">Tambah Data Karyawan</a>
            <a href="<?= base_url(); ?>karyawan/bonus" class="btn btn-success">Bonus Tahunan Karyawan</a>
        </div>
    </div>

    <!-- tampilkan semua data yang ada di database denfgan foreach -->
        <div class="row mt-3">
            <div class="col-md-6">
                <!-- pagination -->
                <?= $this->pagination->create_links(); ?>
                <!-- form pencarian -->
                <div class="row">
                    <div class="col-md">
                        <!-- action ke controller kariyawan/ -->
                        <form action="<?= base_url('karyawan'); ?>" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Seacrh Keyword" name="keyword" autocomplete="off" autofocus>
                                <div class="input-group-append">
                                    <input class="btn btn-primary" type="submit" name="submit" value="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <h5>Total <strong><?= $total_rows;  ?></strong> Karyawan</h5>
                <?php foreach ( $karyawan as $krywn ) : ?>
                    <ul class="list-group">
                        <!-- if statment karyawan yang baru ditambahkan akan active -->

                        <li class="list-group-item mb-1 bg-soft-light">
                            <table>
                                <tr>
                                    <td>
                                        <?= '<strong>' . ++$start . '.</strong> ' . $krywn['nama_karyawan'] ?>
                                    </td>
                                </tr>
                            </table>
                            <small class="ml-3"><b>Gaji Pokok : Rp<?= $krywn['gaji_pokok']; ?></b></small>
                            <a class="btn badge badge-danger float-right ml-1" href="<?= base_url(); ?>karyawan/hapus/<?= $krywn['id']; ?>" onclick="return confirm('Yakin ingin hapus?');">hapus</a>
                            <a class="btn badge badge-success float-right ml-1" href="<?= base_url(); ?>karyawan/ubah/<?= $krywn['id']; ?>">edit</a>
                            <a class="btn badge badge-primary float-right" href="<?= base_url(); ?>karyawan/detail/<?= $krywn['id']; ?>">detail</a>
                        </li>
                    </ul>
                <?php endforeach; ?>
            </div>
            
            
            <!-- fitur di v1.1 -->
            <!-- fitur ininakna muncul ketika button detail ditekan -->
            <!-- <div class="col-md-6" style="background:#eee;">
                <div class="row">
                    <div class="col-md">
                        <button class="btn btn-danger float-right">x</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <h3>tampilkan detail karyawan</h3>
                    </div>
                </div>
            </div> -->

        </div>

</div><!-- end container -->