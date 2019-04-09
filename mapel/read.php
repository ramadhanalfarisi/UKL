<?php
session_start();
if(!(isset($_SESSION['user']))){
    header ("location: ../login/form-login.php");
}

include '../connect.php';

$query = "SELECT kode_mapel,mapel,alokasi_waktu,semester,nama_guru
          FROM matapelajaran LEFT JOIN guru
          USING (kode_guru)
          ORDER BY kode_mapel";

$result = mysqli_query($connect,$query);
$num = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../master.css">
</head>
<body>
<h1 style="margin-left:670px">Data Matapelajaran</h1>
<a id="lepas"href="form-create.php">Tambah</a>

<div id="menu">

    <h1 style="color:white; text-align:center">S C H O O L A R</h1>
    <p style=" text-align:center;
                  color:white;
                  font-size:20px"
                  > Welcome <?php echo $_SESSION['user'];?></p>

    <ul>
        <p><a href="../guru/read.php">Data Guru</a></p>
        <p><a href="read.php">Data Matapelajaran</a></p>
        <p><a href="../login/logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Logout ?')">Logout</a></p>
    </ul>

</div>
<form action="search.php" method="get">

<input type="text" name="cari" placeholder="Masukkan Pencarian">
<select name="kategori" id="kat">
<option value="kode_mapel">Kode Mapel</option>
<option value="mapel">Mapel</option>
<option value="alokasi_waktu">Alokasi Waktu</option>
<option value="nama_guru">Nama Guru</option>
</select>
<input type="submit" value="Cari" id="car">



</form>
    
    <table border=1>
    
        <tr>
        <th>NO</th>
        <th>Kode Mapel</th>
        <th>Matapelajaran</th>
        <th>Alokasi Waktu</th>
        <th>Semester</th>
        <th>Nama Guru</th>
        <th>Aksi</th>
        </tr>

        <?php
        if($num > 0){
            $no = 1;
            while($data = mysqli_fetch_assoc($result)){?>

            <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['kode_mapel'];?></td>
            <td><?php echo $data['mapel'];?></td>
            <td><?php echo $data['alokasi_waktu'];?></td>
            <td><?php echo $data['semester'];?></td>
            <td><?php echo $data['nama_guru'];?></td>
            <td><a href="form-update.php?kode_mapel=<?php echo $data['kode_mapel'];?>" style="color:ghostwhite;background-color:rgb(37, 162, 219);padding:2px">Update</a> | 
            <a href="delete.php?kode_mapel=<?php echo $data['kode_mapel'];?>"style="color:ghostwhite;background-color:rgba(230, 65, 43, 0.938);padding:2px" onclick="return confirm('Yakin Ingin Hapus Data ?')">Hapus</a></td>
            </tr>
                
                <?php
                $no++;
            }
        }
        else{
            echo " Gagal Menampilkan Data ";
        }
        ?>
        

    </table>

</body>
</html>