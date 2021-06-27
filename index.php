<html>
   <head>
      <title>Rental Motor</title>
      <style>
         body {font-family:tahoma, arial}
         table {border-collapse: collapse}
         th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
         th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
      </style>
   </head>
   <body>
      <center><h1>Rental Motor Paling Jaya </h1></center>
      <h3>Daftar Customer</h3>
      <table>
         <thead>
            <tr>
               <th>ID Customer</th>
               <th>Nama</th>
               <th>Alamat</th>
               <th>No HP</th>
            </tr>
         </thead>
         <?php
            include 'koneksi.php';		
            $sql = 'SELECT  * FROM customer';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['id_cust'] ?></td>
               <td><?php echo $row['nama_cust'] ?></td>
               <td><?php echo $row['alamat'] ?></td>
               <td><?php echo $row['no_hp'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      <h3>Tabel Motor</h3>
      <table>
         <thead>
            <tr>
               <th>ID Motor</th>
               <th>No Polisi</th>
               <th>Jenis</th>
               <th>Merek</th>
               <th>Tahun</th>
               <th>Warna</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT * FROM motor';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
               <td><?php echo $row[2] ?></td>
               <td><?php echo $row[3] ?></td>
               <td><?php echo $row[4] ?></td>
               <td><?php echo $row[5] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>

      <h3>Tabel Sewa</h3>
      <table>
         <thead>
            <tr>
               <th>ID Sewa</th>
               <th>Petugas</th>
               <th>Customer</th>
               <th>Motor</th>
               <th>Tanggal Pinjam</th>
               <th>Tanggal Kembali</th>
               <th>Total Bayar</th>
            </tr>
         </thead>
         <?php
            $sql = "SELECT * FROM sewa
            INNER JOIN petugas ON sewa.id_petugas = petugas.id_petugas
            INNER JOIN customer ON sewa.id_cust = customer.id_cust
            INNER JOIN motor ON sewa.id_motor = motor.id_motor";
            $query = mysqli_query($koneksi, $sql);
            while ($rs = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
            <td><?php echo $rs['id_sewa'] ?></td>
            <td><?php echo $rs['nama_petugas'] ?></td>
            <td><?php echo $rs['nama_cust'] ?></td>
            <td><?php echo $rs['merk'] ?></td>
            <td><?php echo $rs['tgl_sewa'] ?></td>
            <td><?php echo $rs['tgl_kembali'] ?></td>
            <td><?php echo $rs['total_bayar'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
    
   </body>
</html>