<style type="text/css" scoped>

  button,
  input,
  select,
  textarea {
      font-size: 100%;
      margin: 0;
      vertical-align: baseline;
      *vertical-align: middle;
  }
  button,
  input {
      line-height: normal; /* 1 */
  }

  button,
  input[type="button"],
  input[type="reset"],
  input[type="submit"] {
      cursor: pointer; /* 1 */
      -webkit-appearance: button; /* 2 */
      *overflow: visible;  /* 3 */
  }

  input[type="checkbox"],
  input[type="radio"] {
      box-sizing: border-box; /* 1 */
      padding: 0; /* 2 */
      *height: 13px; /* 3 */
      *width: 13px; /* 3 */
  }

  button::-moz-focus-inner,
  input::-moz-focus-inner {
      border: 0;
      padding: 0;
  }
     .reg_section {
    padding:0;
    margin: 10px 0;
    
  }
  .reg_section h3 {
    font-size: 13px;
    margin: 5px 0;
    color: #C4A2A2;
  }
  /* Form */
  .register {
    position: relative;
    margin-top:20px;
    padding: 20px 20px 40px;
    background: #fff;
  }
  .register:before {
    content: '';
    position: absolute;
    top: -8px;
    right: -8px;
    bottom: -8px;
    left: -8px;
    z-index: -1;
    background:rgba(255, 173, 200, 0.08);
    border-radius:7px;
    -webkit-border-radius: 7px;
  }

  .register input[type=text], .register input[type=password] ,.register select,.register textarea {
    width: 278px;
  }
  .register p.terms {
    float: left;
    line-height: 31px;
  }
  .register p.terms label {
    font-size: 12px;
    color: #777;
    cursor: pointer;
  }
  .register p.terms input {
    position: relative;
    bottom: 1px;
    margin-right: 4px;
    vertical-align: middle;
  }
  .register p.submit {
    text-align: right;
  }

  .register-help {
    margin: 20px 0;
    font-size: 11px;
    text-align: center;
   
    color:#FFFFFF;
  }
  .register-help a {
    color:#FF3679;
    text-shadow:0 1px #1E0E13;
  }

  :-moz-placeholder {
    color: #c9c9c9 !important;
    font-size: 13px;
  }

  ::-webkit-input-placeholder {
    color: #ccc;
    font-size: 13px;
  }

  input, textarea, select {
    font-family:"Trebuchet MS",tahoma;
    font-size: 14px;
  }

  input[type=text], input[type=password] ,.register select,.register textarea {
    margin: 5px;
    padding: 0 10px;
    height: 34px;
    color: #000;
    background: #fff;
    border-width: 1px;
    border-style: solid;
    border-color: #c4c4c4 #d1d1d1 #d4d4d4;
    border-radius:3px;
    --webkit-border-radius: 5px;
    outline:3px solid rgba(200, 105, 137, 0.09);
    -moz-outline-radius:7px;
    -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
    -moz-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
    margin:10px 0;
  }
  input[type=text]:focus, input[type=password]:focus, textarea, select{
    border-color:#FFF7F9;
    outline-color:rgba(254, 225, 235, 0.7);
    outline-offset: 0;
  }

  input[type=submit] {
    float: left;
    padding:0 10px;
    height: 29px;
    font-size: 12px;
    font-weight: bold;
    color:#FFFFFF;
    text-shadow:0 1px #4D1124;
    border-width: 1px;
    border-style: solid;
    border-color:#693647;
    border-radius: 7px 7px 7px 7px;
    outline: none;
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    background-color: #7D0F33;
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #AA1E4D), color-stop(100%, #7D0F33));
    background-image: -webkit-linear-gradient(top, #AA1E4D, #7D0F33);
    background-image:-moz-linear-gradient(center top , #AA1E4D, #7D0F33)
    background-image: -ms-linear-gradient(top, #AA1E4D, #7D0F33);
    background-image: -o-linear-gradient(top, #AA1E4D, #7D0F33);
    background-image: linear-gradient(top, #AA1E4D, #7D0F33);
    -webkit-box-shadow:0 1px #CD4170 inset, 0 1px 2px #93284C;
    -moz-box-shadow:0 1px #CD4170 inset, 0 1px 2px #93284C;
    box-shadow:0 1px #CD4170 inset, 0 1px 2px #93284C;
    margin-bottom: 25px;
  }
  input[type=submit]:active {
    background: #7D0F33;
    -webkit-box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
  }

  .lt-ie9 input[type=text], .lt-ie9 input[type=password] {
    line-height: 34px;
  }
  .register select {
    padding:6px 10px;
    width: 300px;
    color: #777777;
  }
  .register textarea {
    height: 50px;
    padding: 10px;
    color: #000;
  }
  select {
    color: #000;
  }
</style>

<?php

   	
	$data = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from mahasiswa where id_mahasiswa = '$_SESSION[id]'"));
	{
?>
<div class="page-header">

</div>
<div id="tengah">
	<center>
	<h2 style="color: rgb(36, 160, 218);">Edit Profil</h2>
            <hr style="border: 1px solid rgb(229, 229, 229)">
            <form action="?halaman=profil" method="post" enctype="multipart/form-data" />
            <input type="hidden" name="id" value="<?php echo $_SESSION[id]; ?>">
                <fieldset>
                <table>
                  <div class="control-group">
                  <tr><td><label class="control-label">Nama Mahasiswa</label></td>
                     <td><input class="input-large" type="text" name="nama" value="<?php echo $data['nama'];?>"  required></td></tr>
                  </div>
                  <div class="control-group">
                  <tr><td><label class="control-label">Nomor Induk Mahasiswa</label></td>
                 	 <td><input class="input-large" type="text" name="nis" value="<?php echo $data['nis'];?>"  required></td></tr>
                  </div>             
                  <div class="control-group">
                  <tr><td><label class="control-label">Jenis Kelamin</label></td>
                     <td><select name="jk"  required>
                           <option value="Laki-laki"></option>
                           <option value="Laki-laki" <?php if ($data['jk'] == 'Laki-laki'){echo "selected"; } ?>>Laki-laki</option>
                           <option value="Perempuan" <?php if ($data['jk'] == 'Perempuan'){echo "selected"; } ?>>Perempuan</option>
                        </select></td></tr>
                  </div>
                  <div class="control-group">
                  <tr><td><label class="control-label">Kelas</label></td>
                     <td><select name="kelas"  required>
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
                        </select></td></tr>
                  </div>
                  <div class="control-group">
                  <tr><td><label class="control-label">Alamat</label></td>
                       <td><textarea name="alamat" style="resize:none;" cols="40" required><?php echo $data['alamat'] ;?></textarea></td></tr>
                  </div> 
                  <div class="control-group">
                  <tr><td><label class="control-label">Telepon/HP</label></td>
                        <td><input class="input-large" type="text" name="telp" value="<?php echo $data['telp'];?>"  required></td></tr>
                  </div> 
                  <div class="control-group">
                  <tr><td><label class="control-label">Email</label></td>
                        <td><input class="input-large" type="text" name="email" value="<?php echo $data['email'];?>"  required></td></tr>
                  </div> 
                  <div class="control-group">
                  <tr><td><label class="control-label">Username</label></td>
                        <td><input class="input-large" type="text" name="uname" value="<?php echo $data['uname'];?>"  required>  </td></tr>
                  </div>
                  <div class="control-group">
                  <tr><td><label class="control-label">Password</label></td>
                        <td><input class="input-large" type="password" name="passwd" value="<?php echo $data['passwd'];?>"  required></td></tr>
                  </div>
                  <div class="form-actions">
                  <tr><td></td>
                     <td><button type="submit" name="edit" class="button green">Simpan</button>
                     <button type="reset" class="button red" onClick="history.back()">Batal</button></td>
                  </div>
                  </table>
               </fieldset>
            </form>
    
    </center>
</div>
<?php

	}

?>