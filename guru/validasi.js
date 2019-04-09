function Validasi(){

    var nama_guru = document.getElementById('input');
    var jumlah_jam = document.getElementById('input2');
    var alamat = document.getElementById('input3');
    var telp = document.getElementById('input4');
    var email = document.getElementById('input5');

    if(nama_guru.value == ""){
        alert ("Anda Belum Mengisi Nama Guru");
        nama_guru.focus();
        return false;
    }
    else if(jumlah_jam.value == ""){
        alert ("Anda Belum Mengisi Jumlah Jam");
        jumlah_jam.focus();
        return false;
    }
    else if(alamat.value == ""){
        alert ("Anda Belum Mengisi Alamat");
        alamat.focus();
        return false;
    }
    else if(telp.value == ""){
        alert ("Anda Belum Mengisi No Telepon");
        semester.focus();
        return false;
    }
    else if(email.value == "-"){
        alert ("Anda Belum Mengisi Email");
        email.focus();
        return false;
    }
    else{
        return true;
    }
}