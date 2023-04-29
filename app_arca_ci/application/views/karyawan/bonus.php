<!-- container -->
<div class="container">
<!-- pengkondisian jika flaser berhasil -->
<?php if ( $this->session->flashdata('flash') ) : ?>
    <!-- flasher -->
    <div class="row mt-3">
        <div class="col-md">
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                data Karyawan <strong>gagal</strong> <?= $this->session->flashdata('flash'); ?>.
                <br><small class="">Karena <strong>Nama Karyawan</strong> sudah terpilih</small>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>
    <!-- row utama -->
    <div class="row mt-3">
        <!-- basis col kiri -->
        <div class="col-md-6">
            <h2>Bonus Tahunan Karyawan</h2>
            <p>karyawan yang memiliki <strong>Gaji Pokok</strong> diatas 2,500,000.00 dan <strong>Tunjangan</strong> 1,000,000.00 behak mendapatkan <strong>bonus</strong></p>
            <!-- tombol kembali data karyawan -->
            <div class="row mt-3">
                <div class="col-md-6">
                    <a href="<?= base_url(); ?>karyawan" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <!-- form pencarian -->
            <div class="row">
                <div class="col-md">
                    <h3>Karyawan :</h3>
                    <!-- action ke controller kariyawan method bonus -->
                    <form action="<?= base_url('karyawan/bonus'); ?>" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Karyawan" name="keyword" autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" name="submit" value="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- total rows karyawan -->
            <div class="row mb-1">
                <div class="col-md">
                    <h5>Total <strong><?= $rows_karyawan ?></strong> Karyawan 

                        <?php 
                            // jika keyword terisi dan menekan tombol cari
                            if ( !$keyword < 1 ){
                                // maka keluarkan keyword
                                echo ", dengan keyword<strong> " . $keyword . "</strong>";
                            }
                        ?>
                    
                    </h5>
                </div>
            </div>
            <!-- tampilkan data karyawan -->
            <div class="row mb-5" style="background:;max-height:60vh;overflow-x:hidden;">
                <div class="col-md">
                    <?php foreach ( $karyawan as $krywn ) : ?>
                        <ul class="list-group">
                            <!-- if statment karyawan yang baru ditambahkan akan active -->
                            <li class="list-group-item mb-1 bg-soft-light">
                                <a class="btn btn-success float-right ml-1" href="<?= base_url(); ?>karyawan/karyawanToBonus/<?= $krywn['id']; ?>">pilih</a>
                                <table>
                                    <tr>
                                        <td>
                                            <?= $krywn['nama_karyawan'] ?>
                                        </td>
                                    </tr>
                                </table>
                                <small class="ml-3">
                                    <b>Gaji Pokok : Rp<?= $krywn['gaji_pokok']; ?></b>
                                </small>
                                <br>
                                <small class="ml-3">
                                    <b>Gaji Tunjangan : Rp<?= $krywn['gaji_tunjangan']; ?></b>
                                </small>
                            </li>
                        </ul>
                    <?php endforeach; ?>
                </div>
            </div>
        </div><!-- end basis col kiri -->
        <!-- basis col kanan -->
        <div class="col-md-6">
            <!-- total bonus tahunan -->
            <div class="row mt-3">
                <div class="col-md">
                    <form action="" method="post" autocomplete="off">
                        <div class="form-group">
                            <h3>Total Bonus Tahunan</h3>
                            <div class="form-group">
                                <input class="form-control" id="total_bonus" type="text" name="total_bonus" >
                                <!-- <button class="form-control btn btn-primary mt-1" type="submit" name="submit_bonus">Submit Bonus</button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- tampilkna total bonus -->
            <div class="row mt-3">
                <div class="col-md">
                    <h4>
                        Total Bonus adalah  <small class="text-muted">Rp</small>
                        <strong id="total_bonus_digit"></strong>
                    </h4>            
                </div>
            </div>

            <!-- tampikan data karyawan yang terpilih -->
            <div class="row mt-3">
                <div class="col-md">
                    <h5>Dibagikan ke <strong><?= $rows_karyawan_bonus; ?></strong> Karyawan terpilih.</h5>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md" style="background:;max-height:60vh;overflow-x:hidden;">
                    <!-- untku nomer -->
                    <?php 
                        $i=1;
                        // jika bla = 0 maka kelipatan ganjil, jika 1 maka kelipatan genap.
                        $bla=0;
                        // $count_karyawan_bonus = count($karyawan_bonus);
                    ?>
                    <?php foreach ( $karyawan_bonus as $k_bns ) : ?>
                    <!-- <?= var_dump($count_karyawan_bonus); ?> -->
                        <ul class="list-group">
                            <li class="list-group-item bg-soft-light mb-1">
                                <a class="btn badge-danger float-right ml-1" href="<?= base_url(); ?>karyawan/hapusBonus/<?= $k_bns['id']; ?>">X</a>
                                <?= '<strong>'  . $i++ .  '.</strong> ' . $k_bns['nama_karyawan']; ?>
                                <br>
                                <small>
                                    Gaji Pokok : Rp<?= $k_bns['gaji_pokok']; ?>
                                    <br>
                                    <strong>
                                        <!-- tampiklan kalkulasi total bonus -->
                                        <div id="kalkulasi_total_bonus">
                                            Gaji Bonus : 
                                            <!-- ++$bla, agar var $bla ditambah satu terlebih dahulu baru buat perulangan -->
                                            <!-- 
                                                karna $bla=0, ditambah 1 dulu maka hasilnya 1. 
                                                dan nilai $bla=1 ditambah 1 dulu hasilnya 2 dan tambah lagi 1 hasilnya 3. 
                                                dan nilai $bla=3 ditambah 1 dulu hasilnya 4 dan tambah lagi 1 hasilnya 5,
                                                dst.  
                                            -->
                                            <!-- angka random yang dihasilkan ++$bla adalah bilangan ganjil 1,3,5,7, dst. -->
                                            <strong id="hasil_kalkulasi_bonus<?= ++$bla; ?>"></strong>
                                        </div>
                                        <!-- untuk live input bonus -->
                                        <script>
                                            $(document).ready(function(){
                                                $('#total_bonus').keyup(function(){
                                                    var total_bonus = document.getElementById('total_bonus').value;
                                                    // console.log(total_bonus);
                                                    document.getElementById('total_bonus_digit').innerHTML = total_bonus;
                                                    // ==================================================================
                                                    // ubah total bonus ke int
                                                    // simpan ke variabel - string
                                                    var totalString = total_bonus;
                                                    // string ke array, sparator(',')
                                                    var totalArray = totalString.split(',');
                                                    // simpan newString, hasil dari looping
                                                    var newString = '';
                                                    // array to string dengan looping sebanyak array.length
                                                    for ( var a = 0; a < totalArray.length; a++ ) {
                                                        // tambahkan element array index ke a, kedalam var newString
                                                        newString += totalArray[a];
                                                    }
                                                    // ubah string tanpa tanda kome(,) ke integer
                                                    var newStringToInt = parseInt(newString);
                                                    // kalkulasi bonus dibagi berapa banyaknya orang
                                                    var kalkulasi = newStringToInt / <?= $rows_karyawan_bonus ?>;
                                                    // SOLVED AT-2:56PM-29-juli-2019==================================================================
                                                    var deleteDot = kalkulasi.toString().split('.');
                                                    // statment jika input dibagi hasilnya adalah banyak bilangan dibelakang titik, 
                                                    if ( deleteDot.length > 1 ){
                                                        // maka ambil 2 digit sajadi belakang titik
                                                        // dengan mengubah array setelah element ke-0, yaitu ke-1
                                                        var takeTwoDigit = deleteDot[1].split('').slice(0,2);
                                                        var twoDigitString = '';
                                                        // loop untuk memasukna element array pada string
                                                        for ( var b=0; b < takeTwoDigit.length; b++ ){
                                                            twoDigitString += takeTwoDigit[b];
                                                        }
                                                        // delete semua digit setelah titik
                                                        deleteDot.pop();
                                                        // console.log(twoDigitString);
                                                        // console.log(takeTwoDigit);
                                                        // console.log(deleteDot);
                                                        // toString
                                                        kalkulasi = deleteDot.toString();
                                                    }
                                                    // jika udentified maka defaultkan / bulatkan menjadi '.00'
                                                    else {
                                                        twoDigitString = '00';
                                                    }
                                                    // buat format rupiah
                                                    // kalkulasi ubah ke string, jadikan array(dengan sparator=''), reverse array dan join array(separator='')
                                                    var reverse = kalkulasi.toString().split('').reverse().join(''),
                                                    // var reverse macth kan dengan regex
                                                    ribuan  = reverse.match(/\d{1,3}/g),
                                                    // join ribuan dengan koma(setiap 3 digit), jadikan array(dengan separator=''), 
                                                    // lalu reverse(ke susunan awal, karna 2 kali reverse) dan terakhir join array(separator='')
                                                    ribuan  = ribuan.join(',').split('').reverse().join('');
                                                    // buat variabel untuk menyimpan pemanggilan element (+ $bla agar nama id sesuai, karena diawal id diubah dengan menambahkan var $bla sesuai perulangan)
                                                    var idp = document.getElementById("hasil_kalkulasi_bonus" + <?= $bla++; ?>);
                                                    // console.log(idp);
                                                    // cetak ke dalam element html
                                                    idp.innerHTML = "Rp"+ribuan+"."+twoDigitString;
                                                });
                                            });
                                        </script>
                                    </strong>
                                </small>
                            </li>
                        </ul>
                    <?php endforeach; ?>
                </div>
            </div>
        </div><!-- end basis col kanan -->
    </div><!-- end row utama -->
</div><!-- end container -->