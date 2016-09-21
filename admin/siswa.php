<?php
   if (isset($_POST['tambah'])){
      mysqli_query($GLOBALS["___mysqli_ston"], "insert into mahasiswa values('','$_POST[uname]', '$_POST[passwd]', '$_POST[nama]', '$_POST[nis]','$_POST[jk]','$_POST[alamat]','$_POST[telp]','$_POST[email]','$_POST[kelas]')");
      header("location: ./modul.php?halaman=siswa");
   }
   if (isset($_POST['edit'])){
      mysqli_query($GLOBALS["___mysqli_ston"], "update mahasiswa set uname = '$_POST[uname]', passwd = '$_POST[passwd]',nama='$_POST[nama]',nis= '$_POST[nis]',jk = '$_POST[jk]',alamat = '$_POST[alamat]',telp = '$_POST[telp]',email = '$_POST[email]',id_kelas= '$_POST[kelas]' where id_mahasiswa = '$_POST[id]'");
       header("location: ./modul.php?halaman=siswa");
   }
?>
<div class="span12" style="margin-bottom: -40px">
   <?php
      $halaman = 'siswa';
      switch($_GET['mode']){
         default:
   ?>
            <h3 style="color: rgb(36, 160, 218);">Data Mahasiswa</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <table class="table table-condensed table-bordered dataTable" style="margin-bottom: 10px">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>Nomor Induk Mahasiswa</th>
                     <th>Jenis Kelamin</th>
                     <th>Username</th>
                     <th>Password</th>
                     <th>Pengaturan</th>
                  </tr>
               </thead>
               <tbody>
               <?php
                  $no = 1;
                  $query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from mahasiswa order by id_mahasiswa asc");
                  while($data = mysqli_fetch_array($query)){
                     echo "<tr>
                              <td>$no</td>
                              <td>$data[nama]</td>
                              <td>$data[nis]</td>
                              <td>$data[jk]</td>                              
                              <td>$data[uname]</td>
                              <td>$data[passwd]</td>
                              <td class='align-center'><a style='color: rgb(36, 160, 218);' href='?halaman=siswa&mode=edit&id=$data[id_mahasiswa]'><i class='icon-arrow-right-2'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style='color: rgb(36, 160, 218);' href='?halaman=siswa&mode=hapus&id=$data[id_mahasiswa]'><i class='icon-cancel-2'></i></a></td>
                           </tr>";
                     $no++;
                  }
               ?>
               </tbody>
            </table>
   <?php
         break;
         case "edit":
            $data = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from mahasiswa where id_mahasiswa = '$_GET[id]'"));
   ?>
            <h3 style="color: rgb(36, 160, 218);">Edit Data Mahasiswa</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <form class="form-horizontal" action="?halaman=siswa" method="post" enctype="multipart/form-data" />
               <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <fieldset>
                  <div class="control-group">
                     <label class="control-label">Nama Mahasiswa</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="nama" value="<?php echo $data['nama'];?>"  required>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Nomor Induk Mahasiswa</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="nis" value="<?php echo $data['nis'];?>"  required>
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
                     <label class="control-label">Kelas</label>
                     <div class="controls">
                        <select name="kelas"  required>
                           <option value=""></option>
                           <?php
                              $qkelas = mysqli_query($GLOBALS["___mysqli_ston"], "select * from kelas order by id_kelas");
                              while($dkelas = mysqli_fetch_array($qkelas)) {
                                 if($dkelas['id_kelas'] == $data['id_kelas']){
                                    echo "<option value='$dkelas[id_kelas]' selected>$dkelas[nm_kelas]</option>";
                                 } else {
                                    echo "<option value='$dkelas[id_kelas]'>$dkelas[nm_kelas]</option>";
                                 }
                              }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Alamat</label>
                     <div class="controls">
                        <textarea name="alamat" style="resize:none;" cols="5" required><?php echo $data['alamat'] ;?></textarea>
                     </div>
                  </div> 
                  <div class="control-group">
                     <label class="control-label">Telepon/HP</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="telp" value="<?php echo $data['telp'];?>"  required>
                     </div>
                  </div> 
                  <div class="control-group">
                     <label class="control-label">Email</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="email" value="<?php echo $data['email'];?>"  required>
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
            <h3 style="color: rgb(36, 160, 218);">Tambah Data Mahasiswa</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <form class="form-horizontal" action="?halaman=siswa" method="post" enctype="multipart/form-data" />
               <fieldset>
                  <div class="control-group">
                     <label class="control-label">Nama Mahasiswa</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="nama" required>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Nomor Induk Mahasiswa</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="nis" required>
                     </div>
                  </div>             
                  <div class="control-group">
                     <label class="control-label">Jenis Kelamin</label>
                     <div class="controls">
                        <select name="jk" required>
                           <option value=""></option>
                           <option value="Laki-laki">Laki-laki</option>
                           <option value="Perempuan">Perempuan</option>
                        </select>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Kelas</label>
                     <div class="controls">
                        <select name="kelas" required>
                           <option value=""></option>
                           <?php
                              $qkelas = mysqli_query($GLOBALS["___mysqli_ston"], "select * from kelas order by id_kelas");
                              while($dkelas = mysqli_fetch_array($qkelas)) {
                                 echo "<option value='$dkelas[id_kelas]'>$dkelas[nm_kelas]</option>";
                              }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Alamat</label>
                     <div class="controls">
                        <textarea name="alamat" style="resize:none;" cols="5" required></textarea>
                     </div>
                  </div> 
                  <div class="control-group">
                     <label class="control-label">Telpon</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="telp" required>
                     </div>
                  </div> 
                  <div class="control-group">
                     <label class="control-label">Email</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="email" required>
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
                        <input class="input-large" type="password" name="passwd" required>
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
            mysqli_query($GLOBALS["___mysqli_ston"], "delete from mahasiswa where id_mahasiswa = '$_GET[id]'");            
            header("location: ./modul.php?halaman=siswa");
         break;
      }
   ?>
</div>
