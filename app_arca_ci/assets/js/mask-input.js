// form tambah karyawan
$(document).ready(function(){
    // gaji pokok
    // mask dan set digit, lalu kirimkan placeholder ke id bersangkutan
    // reverse:true untuk digit uang, conton: 1,000 - 10,000 - 100,000, berarti direverse dari belakang
    $('#gaji_pokok').mask("0,000,000,000,000", {reverse: true, placeholder:"x,xxx,xxx,xxx,xxx"});
    // gaji tunjangan
    $('#gaji_tunjangan').mask("0,000,000,000,000", {reverse: true, placeholder:"x,xxx,xxx,xxx,xxx"});
    // gaji lain-lain
    $('#gaji_lain').mask("0,000,000,000,000", {reverse: true, placeholder:"x,xxx,xxx,xxx,xxx"});

    // form total bonus tahunan
    $('#total_bonus').mask("0,000,000,000,000.00", {reverse: true, placeholder:"Ex input: x,xxx,xxx,xxx,xxx"});
    // mask hasil total bonus tiap karyawan
    // $('#kalkulasi_total_bonus').mask("0,000,000,000,000.00", {reverse:true});
});

// kalkulasi total bonus
// string jadi kan array dengan separator ','
    // maka akan jadi array dan menghilangkan tanda koma
// lalu buat perulangan untuk mendefinisikan length pada array tersebut
    // setiap perulangannya akan menambahkan elemnt pada array ke variabel newString
    // newString += array[a]
// ubah newString menjadi Int, dengan parseInt(newString);