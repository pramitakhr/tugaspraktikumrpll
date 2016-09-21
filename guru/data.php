<!-- - - - - - - - - - - Table - - - - - - - - - - - -->	

		<h6 class="section-title">Data File Modul Kuliah</h6>
        
		<a href="?halaman=upload" class="button blue">Upload File</a>
		<table class="custom-table">
			<thead>
				<tr>
					<th style='text-align: center' width='5%'>No</th>
					<th style='text-align: center' width='40%'>Judul  File</th>
					<th style='text-align: center' width='40%'>Mata Pelajaran</th>
					<th style='text-align: center' width='15%'>Hapus</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$no = 1;
				$qidmapel = mysqli_query($GLOBALS["___mysqli_ston"], "select id_mapel from mapel where id_dosen = $_SESSION[id]");
				while ($didmapel = mysqli_fetch_array($qidmapel)){
					$query = mysqli_query($GLOBALS["___mysqli_ston"], "select d.*, m.* from modul d join mapel m where d.id_mapel = m.id_mapel and d.id_mapel = '$didmapel[id_mapel]'");
					$num = mysqli_num_rows($query); 
					if($num < 1){
						//echo "<tr><td colspan='4' align='center'>Data Tidak Tersedia</td></tr>";
					} else {
						  while($modul = mysqli_fetch_array($query)){
			    	        	echo "<tr>
										<td style='text-align: center'>$no</td>
										<td>$modul[nm_data]</td>	
										<td>$modul[kd_mapel] - $modul[nm_mapel]</td>
										<td style='text-align: center'><a href='./deleter.php?id=$modul[id_data]&data=$modul[nm_file]'>Hapus</a></td>
								</tr>";
								 $no++;
			    	        }
			    	       
					}
				}	       	      
    		?>
				
				
			</tbody>
		</table><!--/ .custom-table-->
				
		<!-- - - - - - - - - - end Table - - - - - - - - - - -->	
        
        <h6 class="section-title">Data File Tugas Kuliah</h6>
        
		<a href="?halaman=upload_tugas" class="button blue">Upload File</a>
		<table class="custom-table">
			<thead>
				<tr>
					<th style='text-align: center' width='5%'>No</th>
					<th style='text-align: center' width='40%'>Judul  File</th>
					<th style='text-align: center' width='40%'>Mata Pelajaran</th>
					<th style='text-align: center' width='15%'>Hapus</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$no = 1;
				$qidmapel = mysqli_query($GLOBALS["___mysqli_ston"], "select id_mapel from mapel where id_dosen = $_SESSION[id]");
				while ($didmapel = mysqli_fetch_array($qidmapel)){
					$query = mysqli_query($GLOBALS["___mysqli_ston"], "select d.*, m.* from tugas d join mapel m where d.id_mapel = m.id_mapel and d.id_mapel = '$didmapel[id_mapel]'");
					$num = mysqli_num_rows($query); 
					if($num < 1){
						//echo "<tr><td colspan='4' align='center'>Data Tidak Tersedia</td></tr>";
					} else {
						  while($tugas = mysqli_fetch_array($query)){
			    	        	echo "<tr>
										<td style='text-align: center'>$no</td>
										<td>$tugas[nm_data]</td>	
										<td>$tugas[kd_mapel] - $tugas[nm_mapel]</td>
										<td style='text-align: center'><a href='./deleter_tugas.php?id=$tugas[id_data]&data=$tugas[nm_file]'>Hapus</a></td>
								</tr>";
								 $no++;
			    	        }
			    	       
					}
				}	       	      
    		?>
				
				
			</tbody>
		</table><!--/ .custom-table-->