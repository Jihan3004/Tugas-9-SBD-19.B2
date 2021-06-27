<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<?php include "../koneksi.php"; ?>
<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Rental JH</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
                </li>
                <li>
                    <a href="#">Motor</a>
                </li>
                <li>
                    <a href="../cust/cust.php" data-toggle="collapse" aria-expanded="false">Customer</a>
                </li>
                <li>
                    <a href="../sewa/sewa.php">Data Sewa</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="../index2.php">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <h2>STOCK MOTOR</h2>
            <div class="create pb-3" id="create">
               <a href="tambah-motor.php"><button type="button" id="create" class="btn btn-info">Create</button></a>
            </div>
            <?php include '../koneksi.php' ?>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID Motor</th>
               <th>No Polisi</th>
               <th>Jenis</th>
               <th>Merek</th>
               <th>Tahun</th>
               <th>Warna</th>
                <th width="50px">&nbsp;</th>
                <th width="50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $sql=$koneksi -> query("select * from motor");
        while ($rs = $sql -> fetch_object()) {
?>      <tr>
            <td><?php echo $rs -> id_motor;?></td>
            <td><?php echo $rs -> no_polisi;?></td>
            <td><?php echo $rs -> jenis;?></td>
            <td><?php echo $rs -> merk;?></td>
            <td><?php echo $rs -> tahun;?></td>
            <td><?php echo $rs -> warna;?></td>
            <td><a class="btn btn-sm btn-warning" id="tomboledit" data-toggle="modal" data-target="#editmotor" 
            data-id="<?= $rs->id_motor; ?>"  data-no_polisi="<?= $rs->no_polisi; ?>" data-jenis="<?= $rs->jenis; ?>" data-merk="<?= $rs->merk; ?>" data-tahun="<?= $rs->tahun; ?>" data-warna="<?= $rs->warna; ?>"> <i class="fas fa-edit"></i></a></td>
            <td><a class="btn btn-sm btn-danger" id="tombolhapus" data-toggle="modal" 
            data-target="#hapusmotor" data-id_motor="<?= $rs->id_motor; ?>"><i class="fas fa-trash-alt"></i></a></td>
        </tr> 
        <?php
        }
        ?>
        </tbody>
    </table>
           
        </div>
    </div>
<!-- Modal Edit Data-->
<div class="modal fade" id="editmotor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header style">
        <h3 class="modal-title" id="editmotor">Edit Data Motor</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="function.php" method="POST">
            <input type="hidden" name="id_motor" id="id_motor">
  <div class="form-group">
            <label for="no_polisi">No_Polisi</label>
                <input type="text" class="form-control" id="no_polisi" name="no_polisi" placeholder="Masukkan No Polisi">
            </div><br>
            <label for="Jenis">Jenis</label>
                <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan Jenis">
            </div><br>
            <label for="merk">Merk</label>
                <input type="text" class="form-control" id="merk" name="merk" placeholder="Masukkan Merk">
            </div><br>
            <label for="tahun">Tahun</label>
                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun">
            </div><br>
            <label for="warna">Warna</label>
                <input type="text" class="form-control" id="warna" name="warna" placeholder="Masukkan Warna">
            </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
      </div>
    </div>
  </div>

<!-- Modal Delete -->
<div class="modal fade" id="hapusmotor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header style">
        <h3 class="modal-title" id="hapus">Delete Motor</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="function.php" method="POST">
      <label for="no_polisi">Are you sure to DELETE data?</label>
            <input type="hidden" name="hapus_id_motor" id="hapus_id_motor"><br>
    <button type="submit" name="hapus" class="btn btn-primary">Delete</button>
    </form>
      </div>
    </div>
  </div>
</div>

   <!--Footer-->
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

    <!--JS untuk memunculkan data sebelumnya di form modal-->
    <script>
    $(document).on("click","#tomboledit", function(){
        let no_polisi = $(this).data('no_polisi');
        let jenis = $(this).data('jenis');
        let merk = $(this).data('merk');
        let tahun = $(this).data('tahun');
        let warna = $(this).data('warna');

        $("#no_polisi").val(no_polisi);
        $("#jenis").val(jenis);
        $("#merk").val(merk);
        $("#tahun").val(tahun);
        $("#warna").val(warna);
    });
    </script>
    <script>
$(document).on("click","#tombolhapus", function(){
        let id_motor = $(this).data('id_motor');

        $("#hapus_id").val(id);
    });
    </script>
</body>


</html>