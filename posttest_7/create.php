<?php 
   include('database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CREATE</title>
</head>

<body>
   <a href="read.php">KEMBALI KE READ</a>

   <H1>CREATE</H1>
   <form action="" method="POST" enctype="multipart/form-data">
      <table>
         <tr>
            <th>Jenis Betta</th>
            <td><input type="text" name="jenis_betta"></td>
         </tr>
         <tr>
            <th>Harga Betta Fish</th>
            <th><input type="text" name="harga"></th>
         </tr>
         <tr>
            <th>Jenis Kelamin</th>
            <th><input type="text" name="jenis_kelamin"></th>
         </tr>
         <tr>
            <th>Stock Fish</th>
            <th><input type="text" name="stock"></th>
         </tr>
         <tr>
            <th>
            <label for="">upload gambar : </label>
            <input type="file" name="gambar" include style="margin-top:5px"> <br>
            </th>
         </tr>
      </table>
      <input type="submit" name="submit">
   </form>
   <?php 
      if(isset($_POST['submit'])){
         $betta = $_POST['jenis_betta'];
         $harga = $_POST['harga'];
         $kelamin = $_POST['jenis_kelamin'];
         $stock = $_POST['stock'];
         $gambar = $_FILES['gambar']['name'];
         $x = explode ('.',$gambar);
         $ekstensi = strtolower(end($x));

         $gambar_baru = "$nama.$ekstensi";
         $tmp = $_FILES['gambar']['tmp_name'];

         if(move_uploaded_file($tmp, 'img/'.$gambar_baru)){
            $result = mysqli_query($conn,"INSERT INTO gambar (gambar) VALUES ('$gambar_baru')");
            if($result){
                  echo "file berhasil diupload....";
            }else{
                  echo "Gagal Upload Gambar !!!";
            }
         }
         $create = mysqli_query($conn,"INSERT INTO gambar VALUES(
            null,
            '".$gambar."'
         )");
         $create = mysqli_query($conn,"INSERT INTO Cupang VALUES(
            null,
            '".$betta."',
            '".$harga."',
            '".$kelamin."',
            '".$stock."'
         )");

         if($create){
            ?>
            <script>
            alert("data berhasil ditambahkan");
            window.location=('read.php');
         </script>
            <?php
         } else {
            echo "gagal" . mysqli_error($conn);
         }
      }
   ?>

</body>

</html>