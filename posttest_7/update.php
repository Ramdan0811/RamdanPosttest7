<?php
include('database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>UPDATE</title>
</head>

<body>
   <a href="read.php">KEMBALI KE READ</a>

   <H1>UPDATE</H1>
   <form action="" method="POST">
      <?php
      $tampil = mysqli_query($conn, "SELECT * FROM Cupang WHERE id = '" . $_GET['id_betta'] . "'");
      if (mysqli_num_rows($tampil) > 0) {
         while ($row = mysqli_fetch_array($tampil)) {
      ?>
            <table>
               <input type="text" name="id" value="<?php echo $row['id']; ?>">
               <tr>
                  <th>Jenis Betta</th>
                  <td><input type="text" name="jenis_betta" value="<?php echo $row['jenis_betta']; ?>" required></td>
               </tr>
               <tr>
                  <th>Harga Betta Fish</th>
                  <th><input type="text" name="harga" value="<?php echo $row['harga']; ?>"></th>
               </tr>
               <tr>
                  <th>Jenis Kelamin</th>
                  <th><input type="text" name="jenis_kelamin" value="<?php echo $row['jenis_kelamin']; ?>"></th>
               </tr>
               <tr>
                  <th>Stock Fish</th>
                  <th><input type="text" name="stock" value="<?php echo $row['stock']; ?>"></th>
               </tr>
            </table>
      <?php
         }
      }
      ?>
      <input type="submit" name="submitUpdate" value="Update">
   </form>
   <?php
   if (isset($_POST['submitUpdate'])) {
      $id = $_POST['id'];
      $betta = $_POST['jenis_betta'];
      $harga = $_POST['harga'];
      $kelamin = $_POST['jenis_kelamin'];
      $stock = $_POST['stock'];

      $update = mysqli_query($conn, "UPDATE Cupang SET 
         jenis_betta = '$betta',
         harga = '$harga',
         jenis_kelamin = '$kelamin',
         stock = '$stock'
         WHERE id = '$id'"
      );

      if ($update) {
   ?>
         <script>
            alert("data berhasil di update");
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