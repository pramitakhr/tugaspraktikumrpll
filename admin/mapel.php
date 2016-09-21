<?php
   if (isset($_POST['tambah'])){
      mysqli_query($GLOBALS["___mysqli_ston"], "insert into mapel values('','$_POST[kode]', '$_POST[nama]', '$_POST[kelas]', '$_POST[guru]')");
      header("location: ./modul.php?halaman=mapel");
   }
   if (isset($_POST['edit'])){
      mysqli_query($GLOBALS["___mysqli_ston"], "update mapel set kd_mapel = '$_POST[kd_mapel]', nm_mapel = '$_POST[nm_mapel]',id_kelas='$_POST[kelas]',id_dosen= '$_POST[guru]' where id_mapel = '$_POST[id]'");
       header("location: ./modul.php?halaman=mapel");
   }
?>
<div class="span12" style="margin-bottom: -40px">
   <?php
      $halaman = 'mapel';
      switch($_GET['mode']){
         default:
   ?>
            <h3 style="color: rgb(36, 160, 218);">Data Mata Kuliah</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <table class="table table-condensed table-bordered dataTable" style="margin-bottom: 10px">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Kode Mata Kuliah</th>
                     <th>Nama Mata Kuliah</th>
                     <th>Kelas</th>
                     <th>Nama Dosen</th>
                     <th>Pengaturan</th>
                  </tr>
               </thead>
               <tbody>
               <?php
                  $no = 1;
                  $query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from vmapel order by id_mapel asc");
                  while($data = mysqli_fetch_array($query)){
                     echo "<tr>
                              <td>$no</td>
                              <td>$data[kd_mapel]</td>
                              <td>$data[nm_mapel]</td>
                              <td>$data[nm_kelas]</td>
                              <td>$data[nama]</td>
                              <td class='align-center'><a style='color: rgb(36, 160, 218);' href='?halaman=mapel&mode=edit&id=$data[id_mapel]'><i class='icon-arrow-right-2'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style='color: rgb(36, 160, 218);' href='?halaman=mapel&mode=hapus&id=$data[id_mapel]'><i class='icon-cancel-2'></i></a></td>
                           </tr>";
                     $no++;
                  }
               ?>
               </tbody>
            </table>
   <?php
         break;
         case "edit":
            $data = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from mapel where id_mapel = '$_GET[id]'"));
   ?>
            <h3 style="color: rgb(36, 160, 218);">Edit Data Mata Kuliah</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <form class="form-horizontal" action="?halaman=mapel" method="post" enctype="multipart/form-data" />
               <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <fieldset>
                  <div class="control-group">
                     <label class="control-label">Kode Mata Kuliah</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="kd_mapel" value="<?php echo $data['kd_mapel'];?>" required>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Nama Mata Kuliah</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="nm_mapel" value="<?php echo $data['nm_mapel'];?>" required>
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
                     <label class="control-label">Nama Dosen</label>
                     <div class="controls">
                        <select name="guru" required>
                           <option value=""></option>
                           <?php
                              $qdosen = mysqli_query($GLOBALS["___mysqli_ston"], "select * from dosen order by id_dosen");
                              while($ddosen = mysqli_fetch_array($qdosen)) {
                                 if($ddosen['id_dosen'] == $data['id_dosen']){
                                    echo "<option value='$ddosen[id_dosen]' selected>$ddosen[nama]</option>";
                                 } else {
                                    echo "<option value='$ddosen[id_dosen]'>$ddosen[nama]</option>";
                                 }
                              }
                           ?>
                        </select>
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
            <h3 style="color: rgb(36, 160, 218);">Tambah Data Mata Kuliah</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <form class="form-horizontal" action="?halaman=mapel" method="post" enctype="multipart/form-data" />
               <fieldset>
                  <div class="control-group">
                     <label class="control-label">Kode Mata Kuliah</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="kode" required>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Nama Mata Kuliah</label>
                     <div class="controls">
                        <input class="input-large" type="text" name="nama" required>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Nama Kelas</label>
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
                     <label class="control-label">Nama Dosen</label>
                     <div class="controls">
                        <select name="guru" required>
                           <option value=""></option>
                           <?php
                              $qdosen = mysqli_query($GLOBALS["___mysqli_ston"], "select * from dosen order by id_dosen");
                              while($ddosen = mysqli_fetch_array($qdosen)) {
                                 echo "<option value='$ddosen[id_dosen]'>$ddosen[nama]</option>";
                              }
                           ?>
                        </select>
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
            mysqli_query($GLOBALS["___mysqli_ston"], "delete from mapel where id_mapel = '$_GET[id]'");            
            header("location: ./modul.php?halaman=mapel");
         break;
      }
   ?>
</div>
