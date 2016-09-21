<?php
	    mysqli_query($GLOBALS["___mysqli_ston"], "update mahasiswa set uname = '$_POST[uname]', passwd = '$_POST[passwd]',nama='$_POST[nama]',nis= 				'$_POST[nis]',jk = '$_POST[jk]',alamat = '$_POST[alamat]',telp = '$_POST[telp]',email = '$_POST[email]',id_kelas= '$_POST[kelas]' where id_mahasiswa = '$_POST[id]'");

 		$que = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM mahasiswa WHERE id_mahasiswa='$_SESSION[id]'");
		$profil = mysqli_fetch_array($que);
 		$qkelas = mysqli_query($GLOBALS["___mysqli_ston"], "select * from kelas order by id_kelas");
		while($dkelas = mysqli_fetch_array($qkelas)) {
            if($dkelas['id_kelas'] == $profil['id_kelas']){
				$kls = $dkelas['nm_kelas'];
            	} 
            }
 {
?>
<div class="page-header">

	<h1 class="page-title">Profil Mahasiswa</h1>

</div>
<div id="tengah">
	<center>
	<?php 
           echo "<table>
	      <tr><td>Nama</td>        <td> : $profil[nama]</td></tr>
          <tr><td>NIM</td>               <td> : $profil[nis]</td></tr>
		  <tr><td>Kelas</td>               <td> : $kls</td></tr>
          <tr><td>Jenis Kelamin</td>             <td> : $profil[jk]</td></tr>
          <tr><td>Alamat</td> <td> : $profil[alamat]</td></tr>
		  <tr><td>Telepon / HP</td> <td> : $profil[telp]</td></tr>
          <tr><td>Email</td>              <td> : <a href=mailto:$profil[email]>$profil[email]</a></td></tr>
          <tr><td>Username</td>           <td> : $profil[uname]</td></tr>
          <tr><td>Password</td>        <td> : *********</td></tr> </table>";
		  
	?>
    <br /><br /><a href="?halaman=edit_profil" class="button green">Perbarui Data</a>
    </center>
</div>
<?php

	}

?>