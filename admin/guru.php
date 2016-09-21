<?php
   if (isset($_POST['tambah'])){
      mysqli_query($GLOBALS["___mysqli_ston"], "insert into dosen values('','$_POST[uname]', '$_POST[passwd]', '$_POST[nama]', '$_POST[nip]','$_POST[jk]')");
      header("location: ./modul.php?halaman=guru");
   }
   if (isset($_POST['edit'])){
      mysqli_query($GLOBALS["___mysqli_ston"], "update dosen set uname = '$_POST[uname]', passwd = '$_POST[passwd]',nama='$_POST[nama]',nip= '$_POST[nip]',jk = '$_POST[jk]' where id_dosen = '$_POST[id]'");
       header("location: ./modul.php?halaman=guru");
   }
?>
<div class="span12" style="margin-bottom: -40px">
   <?php
      $halaman = 'guru';
      switch($_GET['mode']){
         default:
   ?>
            <h3 style="color: rgb(36, 160, 218);">Data Dosen</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <table class="table table-condensed table-bordered dataTable" style="margin-bottom: 10px">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama Dosen</th>
                     <th>Nomor Induk Pegawai</th>
                     <th>Jenis Kelamin</th>
                     <th>Username</th>
                     <th>Password</th>
                     <th>Pengaturan</th>
                  </tr>
               </thead>
               <tbody>
               <?php
                  $no = 1;
                  $query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from dosen order by id_dosen asc");
                  while($data = mysqli_fetch_array($query)){
                     echo "<tr>
                              <td>$no</td>
                              <td>$data[nama]</td>
                              <td>$data[nip]</td>
                              <td>$data[jk]</td>                              
                              <td>$data[uname]</td>
                              <td>$data[passwd]</td>
                              <td class='align-center'><a style='color: rgb(36, 160, 218);' href='?halaman=guru&mode=edit&id=$data[id_dosen]'><i class='icon-arrow-right-2'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style='color: rgb(36, 160, 218);' href='?halaman=guru&mode=hapus&id=$data[id_dosen]'><i class='icon-cancel-2'></i></a></td>
                           </tr>";
                     $no++;
                  }
               ?>
               </tbody>
            </table>
   <?php
         break;
         case "edit":
            $data = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from dosen where id_dosen = '$_GET[id]'"));
   ?>
            <h3 style="color: rgb(36, 160, 218);">Edit Data Dosen</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <form class="form-horizontal" action="?halaman=guru" method="post" enctype="multipart/form-data" />
               <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <fieldset>
                  <div class="control-group">
                     <label class="control-label">Nama Dosen</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="nama" value="<?php echo $data['nama'];?>"  required>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Nomor Induk Pegawai</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="nip" value="<?php echo $data['nip'];?>"  required>
                     </div>
                  </div>             
                  <div class="control-group">
                     <label class="control-label">Jenis Kelamin</label>
                     <div class="controls">
                        <select name="jk"  required>
                           <option value="Laki-laki"></option>
                           <option value="Laki-laki" <?php if ($data['jk'] == 'Laki-laki'){echo "selected"; } ?>>Laki-laki</option>
                           <option value="Perempuan" <?php if ($data['jk'] == 'Perempuan'){echo "selected"; } ?>>Perempuan</option>
                        </select>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Username</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="uname" value="<?php echo $data['uname'];?>"  required>                         
                     </div>
                  </div>
                   <div class="control-group">
                     <label class="control-label">Password</label>
                     <div class="controls">
                        <input class="input-large" type="password" name="passwd" value="<?php echo $data['passwd'];?>"  required>
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
            <h3 style="color: rgb(36, 160, 218);">Tambah Data Dosen</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <form class="form-horizontal" action="?halaman=guru" method="post" enctype="multipart/form-data" />
               <fieldset>
                  <div class="control-group">
                     <label class="control-label">Nama Dosen</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="nama" required>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Nomor Induk Pegawai</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="nip" required>
                     </div>
                  </div>             
                  <div class="control-group">
                     <label class="control-label">Jenis Kelamin</label>
                     <div class="controls">
                        <select name="jk" required>
                           <option value=""></option>
                           <option value="1">Laki-laki</option>
                           <option value="2">Perempuan</option>
                        </select>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Username</label>
                     <div class="controls">
                          <input class="input-large" type="text" name="uname" required>
                     </div>
                  </div>
                   <div class="control-group">
                     <label class="control-label">Password</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="passwd" required>
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
            mysqli_query($GLOBALS["___mysqli_ston"], "delete from dosen where id_dosen = '$_GET[id]'");            
            header("location: ./modul.php?halaman=guru");
         break;
      }
   ?>
</div>
