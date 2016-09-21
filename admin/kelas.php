<?php   
   if (isset($_POST['tambah'])){
      mysqli_query($GLOBALS["___mysqli_ston"], "insert into kelas values('','$_POST[kd_kelas]', '$_POST[nm_kelas]')");
      header("location: ./modul.php?halaman=kelas");
   }
   if (isset($_POST['edit'])){
      mysqli_query($GLOBALS["___mysqli_ston"], "update kelas set kd_kelas = '$_POST[kd_kelas]', nm_kelas = '$_POST[nm_kelas]' where id_kelas = '$_POST[id]'  ");
       header("location: ./modul.php?halaman=kelas");
   }
?>
<div class="span12" style="margin-bottom: -40px">
   <?php
      $halaman = 'kelas';
      switch($_GET['mode']){
         default:
   ?>
            <h3 style="color: rgb(36, 160, 218);">Data Kelas</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <table class="table table-condensed table-bordered dataTable" style="margin-bottom: 10px">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Kode Kelas</th>
                     <th>Nama Kelas</th>
                     <th>Pengaturan</th>
                  </tr>
               </thead>
               <tbody>
               <?php
                  $no = 1;
                  $query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from kelas order by id_kelas asc");
                  while($data = mysqli_fetch_array($query)){
                     echo "<tr>
                              <td>$no</td>
                              <td>$data[kd_kelas]</td>
                              <td>$data[nm_kelas]</td>                              
                              <td class='align-center'><a style='color: rgb(36, 160, 218);' href='?halaman=kelas&mode=edit&id=$data[id_kelas]'><i class='icon-arrow-right-2'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style='color: rgb(36, 160, 218);' href='?halaman=kelas&mode=hapus&id=$data[id_kelas]'><i class='icon-cancel-2'></i></a></td>
                           </tr>";
                     $no++;
                  }
               ?>
               </tbody>
            </table>
   <?php
         break;
         case "edit":
            $data = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from kelas where id_kelas = '$_GET[id]'"));
   ?>
            <h3 style="color: rgb(36, 160, 218);">Edit Data</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <form class="form-horizontal" action="?halaman=kelas" method="post" enctype="multipart/form-data" />
               <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <fieldset>
                  <div class="control-group">
                     <label class="control-label">Kode Kelas</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="kd_kelas" value="<?php echo $data['kd_kelas'];?>" >
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Nama Kelas</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="nm_kelas" value="<?php echo $data['nm_kelas'];?>" >
                     </div>
                  </div>
                  <div class="form-actions">
                     <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                     <button type="reset" class="btn" onClick="history.back()">Kembali</button>
                  </div>
               </fieldset>
            </form>
   <?php
         break;
         case "tambah":
   ?>
            <h3 style="color: rgb(36, 160, 218);">Tambah Data</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <form class="form-horizontal" action="?halaman=kelas" method="post" enctype="multipart/form-data" />
               <fieldset>
                  <div class="control-group">
                     <label class="control-label">Kode Kelas</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="kd_kelas" required>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Nama Kelas</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="nm_kelas" required>
                     </div>
                  </div>
                  <div class="form-actions">
                     <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                     <button type="reset" class="btn" onClick="history.back()">Kembali</button>
                  </div>
               </fieldset>
            </form>
   <?php
         break;
         case "hapus":
            mysqli_query($GLOBALS["___mysqli_ston"], "delete from kelas where id_kelas = '$_GET[id]'");            
            header("location: ./modul.php?halaman=kelas");
         break;
      }
   ?>
</div>
