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
 
// notifikasi
              if ($this->session->flashdata('sukses')) {
              echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>';
              echo $this->session->flashdata('sukses');
              echo '</div>';
              }
$atribut='class="form-horizontal"';
echo form_open_multipart('setting/edit',$atribut);
 ?>
                <div class="row layout-top-spacing">
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class=""><?php echo $title2; ?></h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                <form>
                                    
                                <div class="form-group mb-4">
                            <input type="hidden" name="id_setting" value="<?php echo $setting->id_setting; ?>">
                            </div>
                            <div class="form-group md-4">
                                <label>Nama Wilayah</label>
                                <input name="nama_wilayah" type="text" class="form-control" placeholder="Nama Wilayah" value="<?php echo $setting->nama_wilayah;?>" required>
                            </div>
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label>Latitude</label>
                                <input name="latitude" type="text" class="form-control" placeholder="Latitude" value="<?php echo $setting->latitude; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Longitude</label>
                                <input name="longitude" type="text" class="form-control" placeholder="Longitude" value="<?php echo $setting->longitude; ?>" required>
                            </div>
                        </div>
                        <div class="form-group md-4">
                        <label>Zoom</label>
                        <select class="selectpicker form-control" name="zoom">
                        <option value="<?php echo $setting->zoom; ?>" selected><?php echo $setting->zoom; ?></option>               
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>             
                        </select>
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
                   

