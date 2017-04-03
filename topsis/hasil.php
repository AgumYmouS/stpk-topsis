<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>STPK TOPSIS</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" style="position: fixed !important;">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>STPK TOPSIS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>
                <h2>Welcome !!!</h2>
              </span>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> MENU <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">HOME</a></li>
                      <li><a href="alternatif.php">ALTERNATIF</a></li>
                      <li><a href="kriteria.php">KRITERIA</a></li>
                      <li><a href="hasil.php">HASIL</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> FORM <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_alternatif.php">Form Alternatif</a></li>
                      <li><a href="form_kriteria.php">Form Kriteria</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            </div>
            </div>
            <!-- /sidebar menu -->

        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle" style="position: fixed !important;">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">
        <style type="text/css">
            input:focus {
                background-color: pink;
            }

            #bungkusan {
                background-image: url("images/kuro1.jpg");
                background-position: center;
                background-attachment: fixed;
                width: 960px;
                margin: 0 auto;
                padding: 20px;
                color: black;
                border-radius: 10px 10px 10px 10px;
                -moz-border-radius: 10px 10px 10px 10px;
                -khtml-border-radius: 10px 10px 10px 10px;
                -webkit-border-radius: 10px 10px 10px 10px;
            }
            table {
                border-collapse: collapse;
            }
            table th{
                padding: 10px;
            }
            table td {
                padding: 10px;
            }
            .inputan {
                width: 115px;height: 50px;padding: 5px;font-size: 15pt
            }
            .wwww {
                margin-top: 15px;
                font-size: 15pt;
            }
            .wwww input {
                width: 80px;
                padding: 5px;
                font-size: 15pt
            }
            .samping ul {

            }
            .samping li {
                padding: 5px;
                list-style: none;
                float: left;
            }
            .Tabeldata {
                width: 100%;
                border-collapse: collapse;
                font-size: 8pt;
                font-weight: bold;
            }

            .Tabeldata tr:hover {
                background-color: pink;
            }
            .Tabeldata th {
                background-color: #2A3F54;
                color: white;
                text-align: center;
                padding: 10px;
            }
            .Tabeldata td {
                text-align: center;
                padding: 2px;
            }
            .tableMatrix td{

            }
            .Tabeldata tr:nth-child(even){background-color: #f2f2f2}
        </style>
        <div class="row">
        <div id="bungkusan">
        <div class="x_title">
                    <h3>DATA HASIL</h3>
                    <div class="clearfix"></div>
                  </div>
        <div class="x_content">
            <?php
include 'koneksiDatabase.php';
    ?>
    <table border="1" class="Tabeldata" style="border: solid 2px black;">
        <tr style="background-color: greenyellow">
            <th>No</th>
            <th>A1C1</th>
            <th>A1C2</th>
            <th>A1C3</th>
            <th>A1C4</th>

            <th>A2C1</th>
            <th>A2C2</th>
            <th>A2C3</th>
            <th>A2C4</th>

            <th>A3C1</th>
            <th>A3C2</th>
            <th>A3C3</th>
            <th>A3C4</th>

            <th>W1</th>
            <th>W2</th>
            <th>W3</th>
            <th>W4</th>

            <th>Action</th>
        </tr>

        <?php
        $no = 1;
        $queryData = mysqli_query($conn, "select * from data");
        while ($isiData = mysqli_fetch_array($queryData)) {
            echo '
    <tr>
        <td align="center">' . $no . '</td>
            
        <td align="center">' . $isiData['a1c1'] . '</td>
        <td align="center">' . $isiData['a1c2'] . '</td>
        <td align="center">' . $isiData['a1c3'] . '</td>
        <td align="center">' . $isiData['a1c4'] . '</td>
            
        <td align="center">' . $isiData['a2c1'] . '</td>
        <td align="center">' . $isiData['a2c2'] . '</td>
        <td align="center">' . $isiData['a2c3'] . '</td>
        <td align="center">' . $isiData['a2c4'] . '</td>
            
        <td align="center">' . $isiData['a3c1'] . '</td>
        <td align="center">' . $isiData['a3c2'] . '</td>
        <td align="center">' . $isiData['a3c3'] . '</td>
        <td align="center">' . $isiData['a3c4'] . '</td>
            
        <td align="center">' . $isiData['w1'] . '</td>
        <td align="center">' . $isiData['w2'] . '</td>
        <td align="center">' . $isiData['w3'] . '</td>
        <td align="center">' . $isiData['w4'] . '</td>
            
        <td align="center"><a href="index.php?page=data&hasil=' . $isiData['id_data'] . '"><button class="btn btn-primary" type="button"><b>Lihat Hasil</b></button></a> <a onclick="return confirm(\'Hapus ?\')" style="color:red" href="index.php?page=data&hapus=' . $isiData['id_data'] . '"><button class="btn btn-danger" type="button"><b>Hapus</b></button></a></td>
            
    </tr>
            ';
            $no++;
        }
        ?>
    </table>
    
            <br>
            <br></div>
            <b><center>Copyright &copy; YmouS CorP</center></b>
</div></div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>