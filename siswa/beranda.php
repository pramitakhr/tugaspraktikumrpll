<?php
  $query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from beranda order by id_beranda asc");
    	        while($data = mysqli_fetch_array($query)){


?>
<div class="page-header">

	<h1 class="page-title"><img src="../images/elearn.jpg" width="142" height="127" />
	<?php echo $data['judul']; ?></h1>

</div>
<div id="tengah">
	
	<?php echo $data['isi']; ?>

</div>
<?php

	}

?>