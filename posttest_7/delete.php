<?php 
   include('database.php');

   if(isset($_GET['id_betta'])){
      $delete = mysqli_query($conn, "DELETE FROM Cupang WHERE id= '".$_GET['id_betta']."'");

      if($delete){
         ?>
            <script>
            alert("data berhasil dihapus");
            window.location=('read.php');
            </script>
         <?php
      }
   }
?>
