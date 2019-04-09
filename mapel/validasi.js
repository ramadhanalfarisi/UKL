function Validasi(){

    var kode_mapel = document.getElementById('input');
    var mapel = document.getElementById('input2');
    var alokasi_waktu = document.getElementById('input3');
    var semester = document.getElementById('input4');
    var kode_guru = document.getElementById('input5');

    if(kode_mapel.value == ""){
        alert ("Anda Belum Mengisi Kode Mapel");
        kode_mapel.focus();
        return false;
    }
    else if(mapel.value == ""){
        alert ("Anda Belum Mengisi Matapelajaran");
        mapel.focus();
        return false;
    }
    else if(alokasi_waktu.value == ""){
        alert ("Anda Belum Mengisi Alokasi Waktu");
        alokasi_waktu.focus();
        return false;
    }
    else if(semester.value == ""){
        alert ("Anda Belum Mengisi Semester");
        semester.focus();
        return false;
    }
    else if(kode_guru.value == "-"){
        alert ("Anda Belum Mengisi Guru Pengajar");
        kode_guru.focus();
        return false;
    }
    else{
        return true;
    }
}