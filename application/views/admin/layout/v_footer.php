<div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <?php echo date("Y")?> <a target="_blank" href="#">The Monitor</a>, All rights reserved.</p>
                </div>
               
            </div>
        </div>
</div>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/plugins/apex/apexcharts.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dashboard/dash_1.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- /#wrapper -->
    
     <!-- Page-Level Demo Scripts - Tables - Use for reference -->
     <script src="<?php echo base_url(); ?>assets/plugins/table/datatable/datatables.js"></script>
     <script src="<?php echo base_url(); ?>assets/plugins/file-upload/file-upload-with-preview.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
     
     <!-- <script src="<?php echo base_url(); ?>assets/plugins/counter/jquery.countTo.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/components/custom-counter.js"></script> -->
    <script type="text/javascript">
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [3, 10, 20, 50],
            "pageLength": 3 
        });

    </script>
    <script type="text/javascript">
      
      function setMapToForm(latitude, longitude) 
        {
          $('input[name="latitude"]').val(latitude);
          $('input[name="longitude"]').val(longitude);
        }

    </script>
    <script type="text/javascript">
      	
$(document).ready(function() {
    selesai();
});
 
function selesai() {
	setTimeout(function() {
		update();
        update2();
        update3();
		selesai();
	}, 1000);
}
 
function update() {
    $.ajax({
                type  : 'POST',
                url   : '<?php echo base_url('dashboard')?>/ajax1',
                async : false,
                success : function(data){
                    
                    $('#arus1').html(data);
                }
 
            });	
}
function update2() {
    $.ajax({
                type  : 'POST',
                url   : '<?php echo base_url('dashboard')?>/ajax2',
                async : false,
                success : function(data){
                    
                    $('#arus2').html(data);
                }
 
            });	
}
function update3() {
    $.ajax({
                type  : 'POST',
                url   : '<?php echo base_url('dashboard')?>/ajax3',
                async : false,
                success : function(data){
                    
                    $('#arus3').html(data);
                }
 
            });	
}


    </script>
      <script>
          var firstUpload = new FileUploadWithPreview('uploadgambar')
          </script>

   
</body>

</html>
