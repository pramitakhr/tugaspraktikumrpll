<?php
   if (isset($_POST['tambah'])){
      $uFile = $_FILES['upload_file']['tmp_name'];
      if (!empty($uFile)){
         $randString = md5(time());
         $fileName = $_FILES["upload_file"]["name"];
         $splitName = explode(".", $fileName);
         $fileExt = end($splitName);
         $newFileName  = strtolower(substr($randString, 0, 15).'.'.$fileExt);
         move_uploaded_file($uFile, "./data/$newFileName");
         mysqli_query($GLOBALS["___mysqli_ston"], "insert into modul values('','$_POST[judul]', '$newFileName', '$_POST[deskripsi]', '$_POST[mapel]')");
         header("location: ./modul.php?halaman=file");
      } else {
         mysqli_query($GLOBALS["___mysqli_ston"], "insert into modul values('','$_POST[judul]', '', '$_POST[deskripsi]', '$_POST[mapel]')");
         header("location: ./modul.php?halaman=file");
      }
   }
   if (isset($_POST['edit'])){
      $uFile = $_FILES['upload_file']['tmp_name'];
      if (!empty($uFile)){
         $randString = md5(time());
         $fileName = $_FILES["upload_file"]["name"];
         $splitName = explode(".", $fileName);
         $fileExt = end($splitName);
         $newFileName  = strtolower(substr($randString, 0, 15).'.'.$fileExt);
         move_uploaded_file($uFile, "./data/$newFileName");
         $qdata = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from modul where id_data = '$_POST[id]'"));
         unlink("./data/$qdata[nm_file]");
         mysqli_query($GLOBALS["___mysqli_ston"], "update modul set nm_data = '$_POST[judul]', nm_file = '$newFileName', deskripsi='$_POST[deskripsi]', id_mapel= '$_POST[mapel]' where id_data = '$_POST[id]'");
         header("location: ./modul.php?halaman=file");
      } else {
         mysqli_query($GLOBALS["___mysqli_ston"], "update modul set nm_data = '$_POST[judul]', deskripsi='$_POST[deskripsi]', id_mapel= '$_POST[mapel]' where id_data = '$_POST[id]'");
         header("location: ./modul.php?halaman=file");
      }
   }
?>
<div class="span12" style="margin-bottom: -40px">
   <?php
      $halaman = 'file';
      switch($_GET['mode']){
         default:
   ?>
            <h3 style="color: rgb(36, 160, 218);">Data File Modul</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <table class="table table-condensed table-bordered dataTable" style="margin-bottom: 10px">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Judul File</th>
                     <th>File</th>
                     <th>Mata Kuliah</th>
                     <th>Pengaturan</th>
                  </tr>
               </thead>
               <tbody>
               <?php
                  $no = 1;
                  $query = mysqli_query($GLOBALS["___mysqli_ston"], "select d.id_data, d.nm_data, d.nm_file, m.nm_mapel from modul d join mapel m where d.id_mapel = m.id_mapel order by d.id_data");
                  while($data = mysqli_fetch_array($query)){
                     echo "<tr>
                              <td>$no</td>
                              <td>$data[nm_data]</td>
                              <td>$data[nm_file]</td>
                              <td>$data[nm_mapel]</td>
                              <td class='align-center'><a style='color: rgb(36, 160, 218);' href='?halaman=file&mode=edit&id=$data[id_data]'><i class='icon-arrow-right-2'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style='color: rgb(36, 160, 218);' href='?halaman=file&mode=hapus&id=$data[id_data]'><i class='icon-cancel-2'></i></a></td>
                           </tr>";
                     $no++;
                  }
               ?>
               </tbody>
            </table>
   <?php
         break;
         case "edit":
            $data = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select d.*, m.nm_mapel from modul d join mapel m where d.id_mapel = m.id_mapel and id_data = '$_GET[id]'"));
   ?>
            <h3 style="color: rgb(36, 160, 218);">Edit Data Modul</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <form class="form-horizontal" action="?halaman=file" method="post" enctype="multipart/form-data" />
               <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <fieldset>
                  <div class="control-group">
                     <label class="control-label">Judul File</label>
                     <div class="controls">
                        <input class="input-xlarge" type="text" name="judul" value="<?php echo $data['nm_data'];?>"  required>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Deskripsi</label>
                     <div class="controls">
                        <textarea name="deskripsi" style="resize:none;" cols="5"  required><?php echo $data['deskripsi'];?></textarea>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Mata Kuliah</label>
                     <div class="controls">
                        <select name="mapel"  required>
                           <option value=""></option>
                           <?php
                              $qmapel = mysqli_query($GLOBALS["___mysqli_ston"], "select * from mapel order by id_mapel");
                              while($dmapel = mysqli_fetch_array($qmapel)) {
                                 if($dmapel['id_mapel'] == $data['id_mapel']){
                                    echo "<option value='$dmapel[id_mapel]' selected>$dmapel[nm_mapel]</option>";
                                 } else {
                                    echo "<option value='$dmapel[id_mapel]'>$dmapel[nm_mapel]</option>";
                                 }
                              }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">File</label>
                     <div class="controls">
                        <input type="file" name="upload_file">
                        <p style="color: red"><a style="text-decoration: none" href="./data/<?php echo $data['nm_file']; ?>" target="_blank">Buka File</a></p>
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
            <h3 style="color: rgb(36, 160, 218);">Tambah Data Modul</h3>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <form class="form-horizontal" action="?halaman=file" method="post" enctype="multipart/form-data" />
               <fieldset>
                  <div class="control-group">
                     <label class="control-label">Judul File</label>
                     <div class="controls">
                        <input class="input-xlarge" type="text" name="judul" required>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Deskripsi</label>
                     <div class="controls">
                        <textarea name="deskripsi" style="resize:none;" cols="5" required></textarea>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Mata Kuliah</label>
                     <div class="controls">
                        <select name="mapel" required>
                           <option value=""></option>
                           <?php
                              $qmapel = mysqli_query($GLOBALS["___mysqli_ston"], "select * from mapel order by id_mapel");
                              while($dmapel = mysqli_fetch_array($qmapel)) {
                                 echo "<option value='$dmapel[id_mapel]'>$dmapel[kd_mapel] - $dmapel[nm_mapel]</option>";
                              }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">File</label>
                     <div class="controls">
                        <input type="file" name="upload_file" required>
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
            $qdata = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from modul where id_data = '$_GET[id]'"));
            unlink("./data/$qdata[nm_file]");
            mysqli_query($GLOBALS["___mysqli_ston"], "delete from modul where id_data = '$_GET[id]'");            
            header("location: ./modul.php?halaman=file");
         break;
      }
   ?>
</div>
