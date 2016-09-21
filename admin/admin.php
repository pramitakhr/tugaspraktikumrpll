<?php
   if (isset($_POST['tambah'])){
      $passwd = md5($_POST['passwd']);
      mysqli_query($GLOBALS["___mysqli_ston"], "insert into admin values('', '$_POST[uname]', '$passwd', '$_POST[nama]')");
      header("location: ./modul.php?halaman=admin");
   }
   if (isset($_POST['edit'])){
      $passwd = $_POST['passwd'];
      if ($passwd == md5('1337')){
         mysqli_query($GLOBALS["___mysqli_ston"], "update admin set uname = '$_POST[uname]', nm_admin = '$_POST[nama]' where id_admin = '$_POST[id]'");
      } else {
         $key = md5($_POST['passwd']);
         mysqli_query($GLOBALS["___mysqli_ston"], "update admin set uname = '$_POST[uname]', passwd = '$key', nm_admin = '$_POST[nama]' where id_admin = '$_POST[id]'");
      }
      header("location: ./modul.php?halaman=admin&mode=edit&id=$_POST[id]");
   }
?>
<div class="span12" style="margin-bottom: -40px">
   <?php
      switch($_GET['mode']){
         default:
   ?>
            <h3 style="color: rgb(36, 160, 218);">Data Admin</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <table class="table table-condensed table-bordered dataTable" style="margin-bottom: 10px">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama Admin</th>
                     <th>Username</th>
                     <th>Pengaturan</th>
                  </tr>
               </thead>
               <tbody>
               <?php
                  $no = 1;
                  $query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin order by id_admin asc");
                  while($data = mysqli_fetch_array($query)){
                     echo "<tr>
                              <td>$no</td>
                              <td>$data[nama]</td>
                              <td>$data[uname]</td>
                              <td class='align-center'><a style='color: rgb(36, 160, 218);' href='./modul.php?halaman=admin&mode=edit&id=$data[id_admin]'><i class='icon-arrow-right-2'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style='color: rgb(36, 160, 218);' href='./modul.php?halaman=admin&mode=hapus&id=$data[id_admin]'><i class='icon-cancel-2'></i></a></td>
                           </tr>";
                     $no++;
                  }
               ?>
               </tbody>
            </table>
   <?php
         break;
         case "edit":
         $data = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where id_admin = '$_GET[id]'"));
   ?>
            <h3 style="color: rgb(36, 160, 218);">Edit Data</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <form class="form-horizontal" action="?halaman=admin" method="post" enctype="multipart/form-data" />
               <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
               <fieldset>
                  <div class="control-group">
                     <label class="control-label">Nama Admin</label>
                     <div class="controls">
                        <input class="input-xlarge" type="text" name="nama" value="<?php echo $data['nama']; ?>"  required>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Username</label>
                     <div class="controls">
                        <input class="input-xlarge" type="text" name="uname" value="<?php echo $data['uname']; ?>"  required>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Password</label>
                     <div class="controls">
                        <input class="input-xlarge" type="password" name="passwd" value="<?php echo md5('1337'); ?>"  required>
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
            <form class="form-horizontal" action="?halaman=admin" method="post" enctype="multipart/form-data" />
               <fieldset>
                  <div class="control-group">
                     <label class="control-label">Nama Admin</label>
                     <div class="controls">
                        <input class="input-xlarge" type="text" name="nama" required>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Username</label>
                     <div class="controls">
                        <input class="input-xlarge" type="text" name="uname" required>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Password</label>
                     <div class="controls">
                        <input class="input-xlarge" type="password" name="passwd" required>
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
         mysqli_query($GLOBALS["___mysqli_ston"], "delete from admin where id_admin = '$_GET[id]'");
         header("location: ./modul.php?halaman=admin");
         break;
      }
   ?>
</div>
