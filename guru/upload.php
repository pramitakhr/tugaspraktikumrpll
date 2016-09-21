<?php
   if (isset($_POST['upload'])){
      $uFile = $_FILES['upload_file']['tmp_name'];
      if (!empty($uFile)){
         $randString = md5(time());
         $fileName = $_FILES["upload_file"]["name"];
         $splitName = explode(".", $fileName);
         $fileExt = end($splitName);
         $newFileName  = strtolower(substr($randString, 0, 15).'.'.$fileExt);
         move_uploaded_file($uFile, "../admin/data/$newFileName");
         mysqli_query($GLOBALS["___mysqli_ston"], "insert into modul values('','$_POST[judul]', '$newFileName', '$_POST[deskripsi]', '$_POST[mapel]')");
         header("location: ./modul.php?halaman=data");
      } else {
         header("location: ./modul.php?halaman=data");
      }
   }
?>
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

  input {
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
  input[type=text]:focus, input[type=password]:focus{
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
  .custom-file-input::-webkit-file-upload-button {
    visibility: hidden;
  }
  .custom-file-input::before {
    margin-left: -10px;
    margin-right: -10px;
    content: 'Select some files';
    display: inline-block;
    background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
    border: 1px solid #999;
    border-radius: 3px;
    padding: 5px 8px;
    outline: none;
    white-space: nowrap;
    -webkit-user-select: none;
    cursor: pointer;
    text-shadow: 1px 1px #fff;
    font-weight: 700;
    font-size: 10pt;
    width: 100%;
  }
  .custom-file-input:hover::before {
    border-color: black;
  }
  .custom-file-input:active::before {
    background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
  }
  select {
    color: #000;
  }
</style>

<section class="register">
  <h3>Upload File Modul Kuliah</h4>
  <hr>
  <br>
  <br>
  <form method="post" action="?halaman=upload" method="post" enctype="multipart/form-data" />
    <div class="reg_section password">
      <h3>Mata Kuliah</h3>
      <select name="mapel" id="mapel" onchange="getMapel(this.value)">
        <option value=""></option>
        <?php
          $qmapel = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct id_mapel, nm_mapel from vmapel where id_dosen= '$_SESSION[id]' order by id_mapel");
          while ($dmapel = mysqli_fetch_array($qmapel)){
            echo "<option value='$dmapel[id_mapel]'>$dmapel[nm_mapel]</option>";
          } 
        ?>
      </select>
      <h3>Kelas</h3>
      <select name="kelas" id="kelas">
        <option value=""></option>
      </select>
      <div class="reg_section personal_info">
        <h3>Judul File</h3>
        <input type="text" name="judul">
      </div>
      <div class="reg_section password">
        <h3>Deskripsi</h3>
        <textarea name="deskripsi" id=""></textarea>
      </div>
      <div class="reg_section password">
        <h3>File</h3>
        <input type="file" name="upload_file" class="custom-file-input">
      </div>
    </div> 
    <p class="submit"><input type="submit" name="upload" value="Upload"></p>
  </form>
</section>