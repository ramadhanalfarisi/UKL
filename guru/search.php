<?php
session_start();
if(!(isset($_SESSION['user']))){
    header ("location: ../login/form-login.php");
}

include '../connect.php';
$cari = $_GET['cari'];
$kategori = $_GET['kategori'];
$query = "SELECT * FROM guru WHERE $kategori LIKE '%$cari%'
          ORDER BY kode_guru ";
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
<h1 style="margin-left:700px">Data Guru</h1>
<a id="lepas"href="form-create.php">Tambah</a>

<div id="menu">

    <h1 style="color:white; text-align:center">S C H O O L A R</h1>
    <p style=" text-align:center;
                  color:white;
                  font-size:20px"
                  > Welcome <?php echo $_SESSION['user'];?></p>

    <ul>
        <p><a href="read.php">Data Guru</a></p>
        <p><a href="../mapel/read.php">Data Matapelajaran</a></p>
        <p><a href="../login/logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Logout ?')">Logout</a></p>
    </ul>

</div>
    <table border=1>
    
    <tr>
    <th>NO</th>
    <th>Kode Guru</th>
    <th>Nama Guru</th>
    <th>Jumlah Jam</th>
    <th>Alamat</th>
    <th>No Telepon</th>
    <th>E-mail</th>
    <th>Aksi</th>
    </tr>


    <?php
    if($num > 0){
        $no = 1;
        while($data = mysqli_fetch_assoc($result)){?>

        <tr>

        <td><?php echo $no ;?></td>
        <td><?php echo $data['kode_guru'];?></td>
        <td><?php echo $data['nama_guru'];?></td>
        <td><?php echo $data['jumlah_jam'];?></td>
        <td><?php echo $data['alamat'];?></td>
        <td><?php echo $data['telp']?></td>
        <td><?php echo $data['email']?></td>
        <td><a href="form-update.php?kode_guru=<?php echo $data['kode_guru'];?>" style="color:ghostwhite;background-color:rgb(37, 162, 219);padding:2px">Update</a> | 
        <a href="delete.php?kode_guru=<?php echo $data['kode_guru'];?>" style="color:ghostwhite;background-color:rgba(230, 65, 43, 0.938);padding:2px" onclick="return confirm('Anda Yakin Ingin Menghapus Data ?')">Hapus</a></td>

        </tr>
            <?php
            $no++;

        }
    }
    else{
        echo "Gagal Menampilkan Data";
    }
    
    ?>

    </table>
</body>
</html>