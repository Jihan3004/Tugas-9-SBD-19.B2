<?php include '../koneksi.php'; 
//Tambah kelas
if(isset($_POST['tambah'])) {
    $koneksi->query("INSERT INTO motor (no_polisi, jenis, merk, tahun, warna) VALUES 
    ('".$_POST['no_polisi']."','".$_POST['jenis']."',
    '".$_POST['merk']."','".$_POST['tahun']."','".$_POST['warna']."')");
    header('location: motor.php');
}
//Edit kelas
if(isset($_POST['update'])) {

    $connect->query("UPDATE motor SET no_polisi='".$_POST['no_polisi']."', 
    jenis='".$_POST['jenis']."', merk='".$_POST['merk']."', 
    tahun='".$_POST['tahun']."', warna='".$_POST['warna']."' 
    WHERE id_motor='".$_POST['id_motor']."'");
    header('location: motor.php');
}
//Hapus kelas
if (isset($_POST['hapus'])) {
    $idm = $_GET['hapus_id_motor'];

    $hapus = mysqli_query ($koneksi, "DELETE FROM motor WHERE id_motor='$idm");
    header('location: motor.php');
}
?>