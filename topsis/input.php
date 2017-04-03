<?php
        include 'koneksiDatabase.php';
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "db_topsis";

// Create connection
        $conn = new mysqli($host, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql1 = "SELECT nama_alternatif FROM alternatif";
        $sql2 = "SELECT nama_kriteria FROM Kriteria";
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
        ?>
<b>
<form method="post">
    <table align="center" border="1">
        <tr style="background-color: greenyellow">
            <th rowspan="2" style="text-align: center; font-size: 18px;">Alternatif</th>
            <th colspan="4" style="text-align: center; font-size: 18px;">Kriteria</th>
        </tr>
        <tr style="background-color: greenyellow">
            <?php
            $no = 1;
            if ($result2->num_rows < 4) {
                echo '<th style="text-align: center">Kriteria 1 [C1]</th>';
                echo '<th style="text-align: center">Kriteria 2 [C2]</th>';
                echo '<th style="text-align: center">Kriteria 3 [C3]</th>';
                echo '<th style="text-align: center">Kriteria 4 [C4]</th>';
            } else {
            while($row = $result2->fetch_assoc()) { 
                echo '<th style="text-align: center">'. $row["nama_kriteria"]. ' [C'.$no.']</th>';
                $no++;}} 
                ?>
        </tr>
            <?php
            $no = 1;
            if ($result1->num_rows < 3) {
                echo '<tr style="background-color: yellow">
            <td align="center">Alternatif 1 [A1]</td>
            <td><input type="text" class="inputan" name="a1c1"/></td>
            <td><input type="text" class="inputan" name="a1c2"/></td>
            <td><input type="text" class="inputan" name="a1c3"/></td>
            <td><input type="text" class="inputan" name="a1c4"/></td>
                </tr>';
                echo '<tr style="background-color: yellow">
            <td align="center">Alternatif 2 [A2]</td>
            <td><input type="text" class="inputan" name="a2c1"/></td>
            <td><input type="text" class="inputan" name="a2c2"/></td>
            <td><input type="text" class="inputan" name="a2c3"/></td>
            <td><input type="text" class="inputan" name="a2c4"/></td>
                </tr>';
                echo '<tr style="background-color: yellow">
            <td align="center">Alternatif 3 [A3]</td>
            <td><input type="text" class="inputan" name="a3c1"/></td>
            <td><input type="text" class="inputan" name="a3c2"/></td>
            <td><input type="text" class="inputan" name="a3c3"/></td>
            <td><input type="text" class="inputan" name="a3c4"/></td>
                </tr>';
            } else { 
            while($row = $result1->fetch_assoc()) { 
                echo '<tr style="background-color: yellow"><td align="center">' .$row["nama_alternatif"].' [A'.$no.']</td>
            <td><input type="text" class="inputan" name="a'.$no.'c1"/></td>
            <td><input type="text" class="inputan" name="a'.$no.'c2"/></td>
            <td><input type="text" class="inputan" name="a'.$no.'c3"/></td>
            <td><input type="text" class="inputan" name="a'.$no.'c4"/></td>';
            $no++;
            echo '</tr>';}} 
                ?>
        <tr style="background-color:yellowgreen">
            <td align="center">Type</td>
            <td>
                <input type="radio" name="type1" value="benefit"/>Benefit<br/>
                <input type="radio" name="type1" value="cost"/>Cost
            </td>
            <td>
                <input type="radio" name="type2" value="benefit"/>Benefit<br/>
                <input type="radio" name="type2" value="cost"/>Cost
            </td>
            <td>
                <input type="radio" name="type3" value="benefit"/>Benefit<br/>
                <input type="radio" name="type3" value="cost"/>Cost
            </td>
            <td>
                <input type="radio" name="type4" value="benefit"/>Benefit<br/>
                <input type="radio" name="type4" value="cost"/>Cost
            </td>
        </tr>
    </table><br/>
    <div style="padding:5px;background-color:orange;">
    <ul class="samping">
        <li><div style="font-size: 14px">BOBOT : </div></li>
        <li><div class="wwww">W1= <input type="text" name="w1"/></div></li>
        <li><div class="wwww">W2= <input type="text" name="w2"/></div></li>
        <li><div class="wwww">W3= <input type="text" name="w3"/></div></li>
        <li><div class="wwww">W4= <input type="text" name="w4"/></div></li>
        <div style="clear: both"></div>
    </ul>
    </div>
<br/>
      <center><input class="btn btn-primary" name="proses" style="padding: 5px;width: 200px;height: 70px;font-size: 20pt" type="submit" value="PROSES"/></center>
</form></b>

<?php
if (isset($_POST['proses'])) {
    if (empty($_POST['a1c1'] && $_POST['a1c2'] && $_POST['a1c3'] && $_POST['a1c4'] && $_POST['a2c1'] && $_POST['a2c2'] && $_POST['a2c3'] && $_POST['a2c4'] && $_POST['a3c1'] && $_POST['a3c2'] && $_POST['a3c3'] && $_POST['a3c4'] && $_POST['w1'] && $_POST['w2'] && $_POST['w3'] && $_POST['w4'] && $_POST['type1'] &&$_POST['type2'] && $_POST['type3'] && $_POST['type4'])) {
        echo '<script>alert("Data Harus Terisi Seluruhnya !!!")</script>';
    }
    else if (($result2->num_rows < 4) && ($result1->num_rows < 3)){
        echo '<script>alert("Lengkapi Alternatif dan Kriteria !!!")</script>';
    }
    else if ($result2->num_rows < 4){
        echo '<script>alert("Lengkapi Kriteria !!!")</script>';
    }
    else if ($result1->num_rows < 3){
        echo '<script>alert("Lengkapi Alternatif !!!")</script>';
    }
    else {    
        mysqli_query($conn, "insert into data
                        (

                        a1c1,
                        a1c2,
                        a1c3,
                        a1c4,

                        a2c1,
                        a2c2,
                        a2c3,
                        a2c4,

                        a3c1,
                        a3c2,
                        a3c3,
                        a3c4,

                        w1,
                        w2,
                        w3,
                        w4,

                        typec1,
                        typec2,
                        typec3,
                        typec4

                        )
                        values

                        (
                        '$_POST[a1c1]',
                        '$_POST[a1c2]',
                        '$_POST[a1c3]',
                        '$_POST[a1c4]',

                        '$_POST[a2c1]',
                        '$_POST[a2c2]',
                        '$_POST[a2c3]',
                        '$_POST[a2c4]',

                        '$_POST[a3c1]',
                        '$_POST[a3c2]',
                        '$_POST[a3c3]',
                        '$_POST[a3c4]',

                        '$_POST[w1]',
                        '$_POST[w2]',
                        '$_POST[w3]',
                        '$_POST[w4]',

                        '$_POST[type1]',
                        '$_POST[type2]',
                        '$_POST[type3]',
                        '$_POST[type4]'
                        )
                        ");
    
        echo '<script>alert("Data Berhasil di Simpan !!!")</script>';
        echo '<meta HTTP-EQUIV="REFRESH" content="0; url=hasil.php">'; 
    }
}
?>
