		</div>

	</div>

	<script src="<?php echo base_url(); ?>public/admin/js/jquery-2.2.4.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/select2.full.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jscolor.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.date.extensions.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.extensions.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/icheck.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/fastclick.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.fancybox.pack.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/app.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/demo.js"></script>

	<script>



	(function($) {
		
		CKEDITOR.replace('editor1', {
	  		height: 400,
	  		baseFloatZIndex: 10005
		});

		CKEDITOR.replace('editor2', {
	  		height: 400,
	  		baseFloatZIndex: 10005
		});

		CKEDITOR.replace('editor3', {
	  		height: 400,
	  		baseFloatZIndex: 10005
		});

		CKEDITOR.replace('editor4', {
	  		height: 400,
	  		baseFloatZIndex: 10005
		});

		CKEDITOR.replace('editor5', {
	  		height: 400,
	  		baseFloatZIndex: 10005
		});

		CKEDITOR.replace('editor6', {
	  		height: 400,
	  		baseFloatZIndex: 10005
		});

	    //Initialize Select2 Elements
	    $(".select2").select2();

	    //Datemask dd/mm/yyyy
	    $("#datemask").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
	    //Datemask2 mm/dd/yyyy
	    $("#datemask2").inputmask("mm-dd-yyyy", {"placeholder": "mm-dd-yyyy"});
	    //Money Euro
	    $("[data-mask]").inputmask();

	    //Date picker
	    $('#datepicker').datepicker({
	      autoclose: true,
	      format: 'yyyy-mm-dd',
	      todayBtn: 'linked',
	    });

	    $('#datepicker1').datepicker({
	      autoclose: true,
	      format: 'yyyy-mm-dd',
	      todayBtn: 'linked',
	    });

	    $('#datepicker2').datepicker({
	      autoclose: true,
	      format: 'yyyy-mm-dd',
	      todayBtn: 'linked',
	    });

	    //iCheck for checkbox and radio inputs
	    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
	      checkboxClass: 'icheckbox_minimal-blue',
	      radioClass: 'iradio_minimal-blue'
	    });
	    //Red color scheme for iCheck
	    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
	      checkboxClass: 'icheckbox_minimal-red',
	      radioClass: 'iradio_minimal-red'
	    });
	    //Flat red color scheme for iCheck
	    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
	      checkboxClass: 'icheckbox_flat-green',
	      radioClass: 'iradio_flat-green'
	    });


	    $("#example1").DataTable();
	    $('#example2').DataTable({
	      "paging": true,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": true,
	      "autoWidth": false
	    });

	    $('#confirm-delete').on('show.bs.modal', function(e) {
	      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	    });
 
	})(jQuery);

	</script>

	<script type="text/javascript">

        $(document).ready(function () {

            $("#btnAddNew").on('click',function () {

		        var trNew = "";

		        var photo = '<input type="file" name="photos[]">';
		        
		        var deleteRow = '<a href="javascript:void()" class="Delete btn btn-danger btn-xs">X</a>';

		        trNew = trNew + "<tr> ";

		        trNew += "<td>" + photo + "</td>";
		        trNew += "<td>" + deleteRow + "</td>";

		        trNew = trNew + " </tr>";

		        $("#photoSelection tbody").append(trNew);

		        $('.select2').select2();

		    });

		    $('#photoSelection').delegate('a.Delete', 'click', function () {
		        $(this).parent().parent().fadeOut('slow').remove();
		        return false;
		    });




		    $("#btnAddNew1").on('click',function () {

		        var trNew = "";

		        var video = '<textarea name="videos[]" class="form-control" cols="30" rows="10" style="height:80px;"></textarea>';
		        
		        var deleteRow = '<a href="javascript:void()" class="Delete1 btn btn-danger btn-xs">X</a>';

		        trNew = trNew + "<tr> ";

		        trNew += "<td>" + video + "</td>";
		        trNew += "<td>" + deleteRow + "</td>";

		        trNew = trNew + " </tr>";

		        $("#videoSelection tbody").append(trNew);

		        $('.select2').select2();

		    });

		    $('#videoSelection').delegate('a.Delete1', 'click', function () {
		        $(this).parent().parent().fadeOut('slow').remove();
		        return false;
		    });

        });

		selectEmailMethod = $('#selectEmailMethod').val();
        $('#selectEmailMethod').on('change',function() {
            selectEmailMethod = $('#selectEmailMethod').val();
            if ( selectEmailMethod == 'Normal' ) {
               	$('#smtpContainer').hide();
            } else if ( selectEmailMethod == 'SMTP' ) {
               	$('#smtpContainer').show();
            }
        });
        
    </script>
</body>
</html>