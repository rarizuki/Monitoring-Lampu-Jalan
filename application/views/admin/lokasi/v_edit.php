<div id="content" class="main-content">
            <div class="layout-px-spacing">
                
            <?php

//notifikasi error
echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');
//error upload
if (isset($error_upload)){
    echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
        </button><i class="fa fa-bullhorn"></i>'.$error_upload.'</div>';
}
 

$atribut='class="form-horizontal"';
echo form_open_multipart('lokasi/edit/'.$lokasi->id_lokasi,$atribut);
 ?>
                <div class="row layout-top-spacing">
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class="">Edit Data Lampu</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                <form>
                                    
                                <div class="form-group mb-4">
                            <label>Nama Lampu</label>
                            <input name="nama_lokasi" type="text" class="form-control" placeholder="Nama Lokasi" value="<?php echo $lokasi->nama_lokasi; ?>" required>
                        </div>
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label>Latitude</label>
                                <input name="latitude" type="text" class="form-control" placeholder="Latitude" value="<?php echo $lokasi->latitude; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Longitude</label>
                                <input name="longitude" type="text" class="form-control" placeholder="Longitude" value="<?php echo $lokasi->longitude; ?>" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                        <input type="hidden" name="foto_lama" value="<?php echo $lokasi->gambar_lokasi; ?>">
                        </div>
                        <div class="form-group mb-4">
                            <label>Gambar</label>
                            <input name="foto_baru" type="file" class="form-control">
                        </div>
                        <div class="gallery">
                                <div class="gallery-image-container">
                                    <img src="<?php echo base_url('assets/gambar_lokasi/'.$lokasi->gambar_lokasi) ?>">
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

                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-three">

                            <div class="widget-heading">
                                <h5 class="">MAPS</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                <?php echo $map['html']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                   
              
               
<!-- <div class="col-sm-5">
  <div class="panel panel-info">
    <div class="panel-heading">Input Data Lampu</div>
    <div class="panel-body">




    	<div class="form-group">
        <div class="col-sm-12">
            <label class="control-label">Nama</label>
            <input name="nama_lokasi" type="text" class="form-control" placeholder="Nama Lokasi" value="<?php echo $lokasi->nama_lokasi; ?>" required>
        </div>
    	</div>

    
        <div class="form-group">
        <div class="col-sm-12">
        	<label class="control-label">Lokasi Koordinat</label>
        </div>
        <div class="col-sm-6">
            <input name="latitude" type="text" class="form-control" placeholder="Latitude" value="<?php echo $lokasi->latitude; ?>" required>
        </div>
        <div class="col-sm-6">
            <input name="longitude" type="text" class="form-control" placeholder="Longitude" value="<?php echo $lokasi->longitude; ?>" required>
        </div>
    	</div>     
  		<div class="form-group">
  		<div class="col-sm-12">
  			<label class="control-label">Gambar</label>
        	<input type="file" name="gambar_lokasi" class="form-control">
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

<div class="col-sm-7">
  <div class="panel panel-success">
    <div class="panel-heading">Pilih Lokasi</div>
    <div class="panel-body">
      
    <?php echo $map['html']; ?>

    </div>
    <div class="panel-footer"></div>
  </div>
</div> -->
 