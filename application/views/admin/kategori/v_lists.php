<div id="content" class="main-content">
            <div class="layout-px-spacing">
		    
	    <?php 
              // notifikasi
              if ($this->session->flashdata('sukses')) {
              echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>';
              echo $this->session->flashdata('sukses');
              echo '</div>';
              }
              ?>
	      
                <div class="row layout-top-spacing">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
				<a href="<?php echo base_url('kategori/add'); ?>" class="btn btn-outline-success"><i class="fa fa-plus"></i> Add Data</a>
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
				    <?php $no=1 ; foreach($kategori as $value){ ?>
				<tr>
					<td class="text-center"><?php echo $no++; ?></td>
					<td class="text-center"><?php echo $value->nama_kategori; ?></td>
					<td class="text-center"><img width="32px" src="<?php echo base_url('assets/icon/'.$value->icon); ?>"></td>	
					<td class="text-center">
						<a href="<?php echo base_url('kategori/edit/'.$value->id_kategori); ?>" type="button" class="btn btn-outline-success"><i class="fa fa-pencil"></i> Edit</a>
						<a href="<?php echo base_url('kategori/delete/'.$value->id_kategori); ?>" type="button" class="btn btn-outline-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini.?')"><i class="fa fa-trash"></i> Delete</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
<!-- <div class="panel panel-info">
<div class="panel-heading">
	 <a href="<?php echo base_url('kategori/add'); ?>" class="tombol-neon btn-xs"><i class="fa fa-plus"></i> Add Data</a>

</div>
<div class="panel-body w3-dark-grey">

	 <?php 
              // notifikasi
              if ($this->session->flashdata('sukses')) {
              echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>';
              echo $this->session->flashdata('sukses');
              echo '</div>';
              }
              ?>


		<table width="100%" class="table tabel-gelap table-bordered">
			<thead>
				<tr>
					<th class="text-center" width="50px">No</th>
					<th class="text-center">Nama Kategori</th>
					<th class="text-center">Icon</th>
					<th class="text-center" width="100px">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1 ; foreach($kategori as $value){ ?>
				<tr class="w3-hover-black">
					<td class="text-center"><?php echo $no++; ?></td>
					<td><?php echo $value->nama_kategori; ?></td>
					<td  width="100px" class="text-center"><img width="32px" src="<?php echo base_url('assets/icon/'.$value->icon); ?>"></td>
					<td width="130px" class="text-center">
						<a href="<?php echo base_url('kategori/edit/'.$value->id_kategori); ?>" class="btn tombol-neon-hijau btn-xs"><i class="fa fa-pencil"></i> Edit</a>

						<a href="<?php echo base_url('kategori/delete/'.$value->id_kategori); ?>" type="button" class="btn  tombol-neon-merah btn-xs" onclick="return confirm('Yakin Ingin Menghapus Data ini.?')" type="button" class="btn  btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data ini.?')"><i class="fa fa-trash"></i> Delete</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>

</div>
</div> -->