<!-- - - - - - - - - - - Table - - - - - - - - - - - -->	

		<h6 class="section-title">Data File Modul Kuliah</h6>
		
		<table class="custom-table">
			<thead>
				<tr>
					<th style='text-align: center' width='5%'>No</th>
					<th style='text-align: center' width='30%'>Judul File</th>
					<th style='text-align: center' width='50%'>Deskripsi</th>
					<th style='text-align: center' width='15%'>Download</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$no = 1;
				$query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from modul where id_mapel = $_GET[mapel]");
				$num = mysqli_num_rows($query); 
				if($num < 1){
					echo "<tr><td colspan='4' align='center'>Tidak Ada Modul</td></tr>";
				} else {
					  while($modul = mysqli_fetch_array($query)){
		    	        	echo "<tr>
									<td style='text-align: center'>$no</td>
									<td>$modul[nm_data]</td>	
									<td>$modul[deskripsi]</td>
									<td style='text-align: center'><a href='./downloader.php?data=$modul[nm_file]'>Download</a></td>
								</tr>";
							$no++;
						}
		    	        
				}	       
    	      
    		?>
				
				
			</tbody>
		</table><!--/ .custom-table-->
        
        <h6 class="section-title">Data File Tugas Kuliah</h6>
		
		<table class="custom-table">
			<thead>
				<tr>
					<th style='text-align: center' width='5%'>No</th>
					<th style='text-align: center' width='30%'>Judul  File</th>
					<th style='text-align: center' width='50%'>Deskripsi</th>
					<th style='text-align: center' width='15%'>Download</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$no = 1;
				$query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from tugas where id_mapel = $_GET[mapel]");
				$num = mysqli_num_rows($query); 
				if($num < 1){
					echo "<tr><td colspan='4' align='center'>Tidak Ada Tugas</td></tr>";
				} else {
					  while($tugas = mysqli_fetch_array($query)){
		    	        	echo "<tr>
									<td style='text-align: center'>$no</td>
									<td>$tugas[nm_data]</td>	
									<td>$tugas[deskripsi]</td>
									<td style='text-align: center'><a href='./downloader.php?data=$tugas[nm_file]'>Download</a></td>
							</tr>";
		    	        }
		    	        $no++;
				}	       
    	      
    		?>
				
				
			</tbody>
		</table>
				
		<!-- - - - - - - - - - end Table - - - - - - - - - - -->	