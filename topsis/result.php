<?php
include 'koneksiDatabase.php';
if (empty($_GET['hasil']) && empty($_GET['hapus'])) {
    ?>
    <table border="1" class="Tabeldata">
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
            
        <td align="center"><a href="index.php?page=data&hasil=' . $isiData['id_data'] . '"><button class="btn btn-primary" type="button"><b>Lihat Hasil</b></button></a> <a onclick="return confirm(\'Hapus ?\')" style="color:red" href="index.php?page=data&hapus=' . $isiData['id_data'] . '"><button class="btn" type="button"><b>Hapus</b></button></a></td>
            
    </tr>
            ';
            $no++;
        }
        ?>
    </table>
    <?php
} else {
  echo '<div class="x_title">
                    <h3>HASIL</h3>
                    <div class="clearfix"></div>
                  </div>
        <div class="x_content" style="font-weight:bold;">';

    if (!empty($_GET['hasil'])) {
        $queryDataSingle = mysqli_query($conn, "select * from data where id_data=$_GET[hasil]");
        $isiDataSingle = mysqli_fetch_array($queryDataSingle);
        include 'function.php';
        echo '
            <h4>Nilai setiap alternatif di setiap kriteria</h4>
     <table border="1">
        <tr style="background-color: greenyellow">
            <th rowspan="2">Alternatif</th>
            <th colspan="4">Kriteria</th>
        </tr>
        <tr style="background-color: greenyellow">
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
        </tr>
        <tr style="background-color: yellow">
            <td align="center">A1</td>
            <td align="center">' . $isiDataSingle['a1c1'] . '</td>
            <td align="center">' . $isiDataSingle['a1c2'] . '</td>
            <td align="center">' . $isiDataSingle['a1c3'] . '</td>
            <td align="center">' . $isiDataSingle['a1c4'] . '</td>
        </tr>
        <tr style="background-color: yellow">
            <td align="center">A2</td>
            <td align="center">' . $isiDataSingle['a2c1'] . '</td>
            <td align="center">' . $isiDataSingle['a2c2'] . '</td>
            <td align="center">' . $isiDataSingle['a2c3'] . '</td>
            <td align="center">' . $isiDataSingle['a2c4'] . '</td>
        </tr>
        <tr style="background-color: yellow">
            <td align="center">A3</td>
            <td align="center">' . $isiDataSingle['a3c1'] . '</td>
            <td align="center">' . $isiDataSingle['a3c2'] . '</td>
            <td align="center">' . $isiDataSingle['a3c3'] . '</td>
            <td align="center">' . $isiDataSingle['a3c4'] . '</td>
        </tr>
    </table><br/>

    W1=' . $isiDataSingle['w1'] . ' 
    W2=' . $isiDataSingle['w2'] . ' 
    W3=' . $isiDataSingle['w3'] . ' 
    W4=' . $isiDataSingle['w4'] . ' 

    <br/><br/>

    Tipe Kriteria C1 = ' . $isiDataSingle['typec1'] . ' <br/>
    Tipe Kriteria C2 = ' . $isiDataSingle['typec2'] . ' <br/>
    Tipe Kriteria C3 = ' . $isiDataSingle['typec3'] . ' <br/>
    Tipe Kriteria C4 = ' . $isiDataSingle['typec4'] . ' <br/>
   <br>     
   <h4>Matriks ternormalisasi, R</h4>
   <table class="tableMatrix">
    <tr>
      <td rowspan="3">R = </td>
      <td rowspan="3"><img style="height:100px" src="images/kurungbuka.png"/></td>
      <td style="padding-right:30px">' . $isiDataSingle['a1c1'] / $jumlahPangkatC1 . '</td>
      <td style="padding-right:30px">' . $isiDataSingle['a1c2'] / $jumlahPangkatC2 . '</td>
      <td style="padding-right:30px">' . $isiDataSingle['a1c3'] / $jumlahPangkatC3 . '</td>
      <td>' . $isiDataSingle['a1c4'] / $jumlahPangkatC4 . '</td>
      <td rowspan="3"><img style="height:100px" src="images/kurungtutup.png"/></td>
    </tr>
    <tr>
      <td style="padding-right:30px">' . $isiDataSingle['a2c1'] / $jumlahPangkatC1 . '</td>
      <td style="padding-right:30px">' . $isiDataSingle['a2c2'] / $jumlahPangkatC2 . '</td>
      <td style="padding-right:30px">' . $isiDataSingle['a2c3'] / $jumlahPangkatC3 . '</td>
      <td>' . $isiDataSingle['a2c4'] / $jumlahPangkatC4 . '</td>
    </tr>
    <tr>
      <td style="padding-right:30px">' . $isiDataSingle['a3c1'] / $jumlahPangkatC1 . '</td>
      <td style="padding-right:30px">' . $isiDataSingle['a3c2'] / $jumlahPangkatC2 . '</td>
      <td style="padding-right:30px">' . $isiDataSingle['a3c3'] / $jumlahPangkatC3 . '</td>
      <td>' . $isiDataSingle['a3c4'] / $jumlahPangkatC4 . '</td>
    </tr>
   </table>
   <br>
   <h4>Matriks ternormalisasi terbobot, Y</h4>
   <table class="tableMatrix">
    <tr>
      <td rowspan="3">Y = </td>
      <td rowspan="3"><img style="height:100px" src="images/kurungbuka.png"/></td>
      <td style="padding-right:30px">' . $isiDataSingle['a1c1'] / $jumlahPangkatC1 * $isiDataSingle['w1'] . '</td>
      <td style="padding-right:30px">' . $isiDataSingle['a1c2'] / $jumlahPangkatC2 * $isiDataSingle['w2'] . '</td>
      <td style="padding-right:30px">' . $isiDataSingle['a1c3'] / $jumlahPangkatC3 * $isiDataSingle['w3'] . '</td>
      <td>' . $isiDataSingle['a1c4'] / $jumlahPangkatC4 * $isiDataSingle['w4'] . '</td>
      <td rowspan="3"><img style="height:100px" src="images/kurungtutup.png"/></td>
    </tr>
    <tr>
      <td style="padding-right:30px">' . $isiDataSingle['a2c1'] / $jumlahPangkatC1 * $isiDataSingle['w1'] . '</td>
      <td style="padding-right:30px">' . $isiDataSingle['a2c2'] / $jumlahPangkatC2 * $isiDataSingle['w2'] . '</td>
      <td style="padding-right:30px">' . $isiDataSingle['a2c3'] / $jumlahPangkatC3 * $isiDataSingle['w3'] . '</td>
      <td>' . $isiDataSingle['a2c4'] / $jumlahPangkatC4 * $isiDataSingle['w4'] . '</td>
    </tr>
    <tr>
      <td style="padding-right:30px">' . $isiDataSingle['a3c1'] / $jumlahPangkatC1 * $isiDataSingle['w1'] . '</td>
      <td style="padding-right:30px">' . $isiDataSingle['a3c2'] / $jumlahPangkatC2 * $isiDataSingle['w2'] . '</td>
      <td style="padding-right:30px">' . $isiDataSingle['a3c3'] / $jumlahPangkatC3 * $isiDataSingle['w3'] . '</td>
      <td>' . $isiDataSingle['a3c4'] / $jumlahPangkatC4 * $isiDataSingle['w4'] . '</td>
    </tr>
   </table>
   <br>
   <h4>Solusi Ideal Positif (A<sup>+</sup>):</h4>
   y<sub>1</sub><sup>+</sup> = '.$statusy1.'{' . $y1a . '; ' . $y1b . '; ' . $y1c . '}=' . $y1 . '<br/>
   y<sub>2</sub><sup>+</sup> = '.$statusy2.'{' . $y2a . '; ' . $y2b . '; ' . $y2c . '}=' . $y2 . '<br/>
   y<sub>3</sub><sup>+</sup> = '.$statusy3.'{' . $y3a . '; ' . $y3b . '; ' . $y3c . '}=' . $y3 . '<br/>
   y<sub>4</sub><sup>+</sup> = '.$statusy4.'{' . $y4a . '; ' . $y4b . '; ' . $y4c . '}=' . $y4 . '<br/><br/>
   A<sup>+</sup> = {' . $y1 . '; ' . $y2 . '; ' . $y3 . '; ' . $y4 . '; }<br/>
   <br>    
   <h4>Solusi Ideal Negatif (A<sup>-</sup>):</h4>
   y<sub>1</sub><sup>-</sup> = '.$status2y1.'{' . $y1a . '; ' . $y1b . '; ' . $y1c . '}=' . $y1m . '<br/>
   y<sub>2</sub><sup>-</sup> = '.$status2y2.'{' . $y2a . '; ' . $y2b . '; ' . $y2c . '}=' . $y2m . '<br/>
   y<sub>3</sub><sup>-</sup> = '.$status2y3.'{' . $y3a . '; ' . $y3b . '; ' . $y3c . '}=' . $y3m . '<br/>
   y<sub>4</sub><sup>-</sup> = '.$status2y4.'{' . $y4a . '; ' . $y4b . '; ' . $y4c . '}=' . $y4m . '<br/><br/>
   A<sup>-</sup> = {' . $y1m . '; ' . $y2m . '; ' . $y3m . '; ' . $y4m . '; }<br/>
   <br>       
   <h4>Jarak antara nilai terbobot setiap alternatif terhadap solusi ideal positif, S<sub>i<sup>+</sup></sub></h4>
   D<sub>1<sup>+</sup></sub> = ' . $d1 . '<br/>
   D<sub>2<sup>+</sup></sub> = ' . $d2 . '<br/>
   D<sub>3<sup>+</sup></sub> = ' . $d3 . '<br/>
   <br>
   <h4>Jarak antara nilai terbobot setiap alternatif terhadap solusi ideal negatif, S<sub>i<sup>-</sup></sub></h4>
   D<sub>1<sup>-</sup></sub> = ' . $d1m . '<br/>
   D<sub>2<sup>-</sup></sub> = ' . $d2m . '<br/>
   D<sub>3<sup>-</sup></sub> = ' . $d3m . '<br/>
   <br>
   <h4>Kedekatan setiap alternatif terhadap solusi ideal dihitung sebagai berikut</h4>
   <table>
    <tr>
      <td rowspan="3">V<sub>1</sub></td>
      <td rowspan="3">=</td>
      <td align="center">' . $d1m . '</td>
      <td rowspan="3">=</td>
      <td align="center" rowspan="3">' . $v1 . '</td>
    </tr>
    <tr>
      <td style="padding:0"><hr/></td>
    </tr>
    <tr>
      <td align="center">' . $d1 . ' + ' . $d1m . '</td>
    </tr>
   </table>
   <br/>
   <table>
    <tr>
      <td rowspan="3">V<sub>2</sub></td>
      <td rowspan="3">=</td>
      <td align="center">' . $d2m . '</td>
      <td rowspan="3">=</td>
      <td align="center" rowspan="3">' . $v2 . '</td>
    </tr>
    <tr>
      <td style="padding:0"><hr/></td>
    </tr>
    <tr>
      <td align="center">' . $d2 . ' + ' . $d2m . '</td>
    </tr>
   </table>
   <br/>
   <table>
    <tr>
      <td rowspan="3">V<sub>3</sub></td>
      <td rowspan="3">=</td>
      <td align="center">' . $d3m . '</td>
      <td rowspan="3">=</td>
      <td align="center" rowspan="3">' . $v3 . '</td>
    </tr>
    <tr>
      <td style="padding:0"><hr/></td>
    </tr>
    <tr>
      <td align="center">' . $d3 . ' + ' . $d3m . '</td>
    </tr>
   </table>
   <br>
   <br>'; ?>
   <?php
                include('koneksiDatabase.php');
                $sql   = "SELECT nama_alternatif FROM alternatif";
                $query = mysqli_query($conn, $sql); 
                $arraydata = array();
                $key = 0;
                while( $ret = mysqli_fetch_array( $query )) {
                   $arraydata[$key] = $ret['nama_alternatif'];
                   $key++;
                 };
                 ?>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../vendors/Chart.js/dist/Chart.bundle.js"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
    <div id="container" style="width: 75%;">
        <canvas id="BarAlternatif"></canvas>
    </div>
    <script>
        var ctx = document.getElementById("BarAlternatif");
        
        var BarAlternatif = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [
            <?php 
                    foreach ($arraydata as $value) {
                       echo '"'. $value .'",';
                     }; ?>
          ],
          datasets: [{
          label: '# Hasil',
          backgroundColor: ["greenyellow", "yellow", "yellowgreen"],
          data: [<?php echo "$v1, $v2, $v3" ?>]
          }]
        },

        options: {
          scales: {
          yAxes: [{
            ticks: {
            beginAtZero: true
            }
          }]
          }
        }
        });
    </script>
        <?php
        echo '
    <br>
    <p>
    <h2>Kesimpulan :</h2>
    <h3 style="color:white">Alternatif yang dipilih : Alternatif yang ' . $alternatif . ' = ' . $hasil . '</h3></p>
            ';
    } else if (!empty($_GET['hapus'])) {
        mysqli_query($conn, "delete from data where id_data=$_GET[hapus]");
        echo '<script>alert("Berhasil di Hapus !!!")</script>';
        echo '<meta HTTP-EQUIV="REFRESH" content="0; url=hasil.php">';
    }
}
?>