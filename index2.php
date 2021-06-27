<!DOCTYPE html>
<html>

<?php include "koneksi.php"; 
include "navbar.php";?>
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
                    <a href="motor/motor.php">Motor</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Customer</a>
                </li>
                <li>
                    <a href="#">Data Sewa</a>
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
                                <a class="nav-link" href="#">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <h2>DATA RENTAL JH</h2>

            <div class="line"></div>
            <div class="row text-white">
                <?php $ds = mysqli_query($koneksi,"SELECT * FROM motor"); 
                      $ts = mysqli_num_rows($ds); ?>
                    <div class="card bg-info ml-5 mt-5" style="width: 18rem;">
                        <div class="card-body">
                        <div style="position: absolute; z-index: 0; top: 25px; right: 4px; opacity: 0.4; 
                        font-size: 90px;"><i class="fas fa-user-graduate mr-2"></i></div>
                        <h5 class="card-title">STOCK MOTOR</h5>
                        <div style="font-weight: bold; font-size:65px"><?php echo $ts ?></div>
                        <a href="motor/motor.php">
                        <p class="card-text text-white">Look For Detail<i class="fas fa-angle-double-right ml-2"></i></p></a>
                        </div>
                    </div>
                    <div class="row text-white">
                <?php $ds = mysqli_query($koneksi,"SELECT * FROM customer"); 
                      $ts = mysqli_num_rows($ds); ?>
                    <div class="card bg-warning ml-5 mt-5" style="width: 18rem;">
                        <div class="card-body">
                        <div style="position: absolute; z-index: 0; top: 25px; right: 4px; opacity: 0.4; 
                        font-size: 90px;"><i class="fas fa-user-graduate mr-2"></i></div>
                        <h5 class="card-title">DATA CUSTOMER</h5>
                        <div style="font-weight: bold; font-size:65px"><?php echo $ts ?></div>
                        <a href="motor/motor.php">
                        <p class="card-text text-white">Look For Detail<i class="fas fa-angle-double-right ml-2"></i></p></a>
                        </div>
                    </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

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
</body>

</html>