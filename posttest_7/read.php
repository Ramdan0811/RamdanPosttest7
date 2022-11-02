<?php 
   include('database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>READ</title>
</head>

<body class="read">
   <a href="create.php" class="btn tambah">TAMBAH DATA</a>
   <table class="form">
      <thead>
         <tr>
            <th>No</th>
            <th>Jenis Betta</th>
            <th>Harga Betta Fish</th>
            <th>Jenis Kelamin</th>
            <th>Stock Fish</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php 
            $read = mysqli_query($conn, "SELECT * FROM Cupang");
            if(mysqli_num_rows($read) > 0){
               while($row = mysqli_fetch_array($read)){
                  ?>
                     <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['jenis_betta'] ?></td>
                        <td><?php echo $row['harga'] ?></td>
                        <td><?php echo $row['jenis_kelamin'] ?></td>
                        <td><?php echo $row['stock'] ?></td>
                        <td>
                           <a href="create.php" class="btn create">create</a>
                           <a href="update.php?id_betta=<?php echo $row['id']; ?>" class="btn update">Update</a>
                           <a href="delete.php?id_betta=<?php echo $row['id'];?>" class="btn delete">Delete</a>
                        </td>
                     </tr>
                  <?php
               }
            }
         ?>
      </tbody>
   </table>
   <div class="waktu" style="background-color:  rgb(193, 236, 0); margin-left: 50px; text-align:center;width:150px;">
   <?php
$d=strtotime("+3 months");
echo date("Y-m-d:i:sa", $d) . "<br>";
?>

   </div>
</body>
</html>