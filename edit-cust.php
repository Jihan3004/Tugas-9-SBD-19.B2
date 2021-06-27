<?php
// include database connection file
include "koneksi.php";
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$koneksi-> query("UPDATE customer SET nama_cust='".$_POST['nama_cust']."', alamat='".$_POST['alamat']."',no_hp='".$_POST['no_hp']."' WHERE id_cust='".$_POST['id_cust']."'");
header('location: index.php');}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET ['id_cust'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM customer WHERE id_cust= $id");
 
while($user_data = mysqli_fetch_array($result))
{
	$nama = $user_data['nama_cust'];
	$alamat = $user_data['alamat'];
	$hp = $user_data['no_hp'];
}
?>
<html>
<head>	
	<title>Edit User Data</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit-cust.php">
		<table border="0">
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama_cust" value=<?php echo $nama;?>></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
			</tr>
			<tr> 
				<td>No HP</td>
				<td><input type="text" name="no_hp" value=<?php echo $hp;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_cust" value=<?php echo $_GET['id_cust'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>