	<div id="content" class="main-content">
            <div class="layout-px-spacing">
	    <?php 
              
              if ($this->session->flashdata('sukses')) {
              echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>';
              echo $this->session->flashdata('sukses');
              echo '</div>';
              }
              ?>
	      
                <div class="row layout-top-spacing">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
					 <a href="<?php echo base_url('lokasi/add'); ?>" class="btn btn-outline-success"><i class="fa fa-plus"></i> Add Data</a>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
					    <th class="text-center">No</th>
                                            <th class="text-center">STATUS LAMPU</th>
                                            <th class="text-center">UBAH STATUS</th>
                                            <th class="text-center">ACTION</th>
                                          
                                        </tr>
                                    </thead>
				    <tbody>
				<?php $no=1 ; foreach($lokasi as $value){ ?>
				<tr>
					<td class="text-center"><?php echo $no++; ?></td>
					<td class="text-center"><?php echo $value->nama_kategori; ?></td>
					<td class="text-center">
						<?php
						if($value->id_lokasi == 1){
							echo "<a href='lokasi/edit_on/$value->id_lokasi'  onclick=\"return confirm('Apakah Anda Yakin Ingin Mengubah Status?');\" data-toggle='tooltip' title='Ubah Status' class='btn btn-outline-success' type='button'><i class='fa fa-lightbulb-o'></i>ON</a>";
							echo " ";
							echo "<a href='lokasi/edit_off/$value->id_lokasi'  onclick=\"return confirm('Apakah Anda Yakin Ingin Mengubah Status?');\" data-toggle='tooltip' title='Ubah Status' class='btn btn-outline-danger' type='button'><i class='fa fa-lightbulb-o'></i>OFF</a>";
						}
						?>
						<?php
						if($value->id_lokasi == 2){
							echo "<a href='lokasi/edit_nyala/$value->id_lokasi'  onclick=\"return confirm('Apakah Anda Yakin Ingin Mengubah Status?');\" data-toggle='tooltip' title='Ubah Status' class='btn btn-outline-success' type='button'><i class='fa fa-lightbulb-o'></i>ON</a>";
							echo " ";
							echo "<a href='lokasi/edit_mati/$value->id_lokasi'  onclick=\"return confirm('Apakah Anda Yakin Ingin Mengubah Status?');\" data-toggle='tooltip' title='Ubah Status' class='btn btn-outline-danger' type='button'><i class='fa fa-lightbulb-o'></i>OFF</a>";
						}
						?>
						<?php
						if($value->id_lokasi == 3){
							echo "<a href='lokasi/edit_hidup/$value->id_lokasi'  onclick=\"return confirm('Apakah Anda Yakin Ingin Mengubah Status?');\" data-toggle='tooltip' title='Ubah Status' class='btn btn-outline-success ' type='button'><i class='fa fa-lightbulb-o'></i>ON</a>";
							echo " ";
							echo "<a href='lokasi/edit_padam/$value->id_lokasi'  onclick=\"return confirm('Apakah Anda Yakin Ingin Mengubah Status?');\" data-toggle='tooltip' title='Ubah Status' class='btn btn-outline-danger ' type='button'><i class='fa fa-lightbulb-o'></i>OFF</a>";
						}
						?>
					</td>
					<td class="text-center">
						
						<a href="<?php echo base_url('lokasi/edit/'.$value->id_lokasi); ?>" type="button" class="btn btn-outline-success"><i class="fa fa-pencil"></i> Edit</a>
						<a href="<?php echo base_url('lokasi/delete/'.$value->id_lokasi); ?>" type="button" class="btn btn-outline-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini.?')"><i class="fa fa-trash"></i> Delete</a>
					</td>
					
				
				</tr>
				
				
			<?php } ?>
			</tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                
