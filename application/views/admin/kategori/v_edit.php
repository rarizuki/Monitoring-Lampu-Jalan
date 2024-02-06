<div id="content" class="main-content">
            <div class="layout-px-spacing">
                
            <?php

//notifikasi error
echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');
//error upload
// if (isset($error_upload)){
//     echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
//         </button><i class="fa fa-bullhorn"></i>'.$error_upload.'</div>';
// }

        $atribut='class="form-horizontal"';
        echo form_open_multipart('kategori/edit/'.$kategori->id_kategori,$atribut);
        ?>
                <div class="row layout-top-spacing">
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class="">Edit Data Kategori</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                <form>
                                    
                                <div class="form-group mb-4">
                            <label>Nama Kategori</label>
                            <input name="nama_kategori" type="text" class="form-control" placeholder="Nama Lokasi" value="<?php echo $kategori->nama_kategori; ?>">
                        </div>
                        <div class="form-group mb-4">
                        <input type="hidden" name="icon_lama" value="<?php echo $kategori->icon; ?>">
                        </div>
                        <div class="form-group mb-4">
                            <label>Icon</label>
                            <input name="icon_baru" type="file" class="form-control">
                        </div>
                        <div class="gallery">
                                <div class="gallery-image-container">
                                    <label>Icon Preview Sebelumnya</label><br>
                                    <img src="<?php echo base_url('assets/icon/'.$kategori->icon) ?>">
                                    </a>
                                </div>
                            </div>
                        
                                    <div class="form-row align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-primary mt-3"><i class="far fa-edit"> Simpan</i></button>
                                        &nbsp;&nbsp;&nbsp;
                                        <button type="submit" onclick="javascript:history.back()" class="btn btn-warning mt-3"><i class="fa fa-sign-out"> Cancel</i></button>
                                    </div>
                    </form>
                    <?php echo form_close(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                   
                    </div>
                    
                    </div>
                   
<!-- <div class="col-sm-5">
  <div class="panel panel-info">
    <div class="panel-heading">Input Data Status</div>
    <div class="panel-body">




    	<div class="form-group">
        <div class="col-sm-12">
            <label class="control-label">Nama Status</label>
            <input name="nama_kategori" type="text" class="form-control" placeholder="Nama Kategori" value="<?php echo $kategori->nama_kategori; ?>" required>
        </div>
    	</div>	 	

  
  		<div class="form-group">
  		<div class="col-sm-12">
  			<label class="control-label">Icon</label>
        	<input type="file" name="icon" class="form-control" required>
        </div>
    	</div>

        <div class="form-group">
        <div class="col-sm-12">
            <label class="control-label">(* Gunakan PNG dengan Resolusi Max 48x48</label>
            
        </div>
        </div>  

  		

        <div class="form-group">
        	<div class="col-sm-6">
        		<button type="submit" class="form-control btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        	</div>
            <div class="col-sm-6">
            <button type="button"  onclick="javascript:history.back()"  class="form-control btn btn-warning">Cancel</button>
            </div>
        </div>


<?php echo form_close(); ?>

    </div>
    <div class="panel-footer"></div>
  </div>
</div>
 -->
