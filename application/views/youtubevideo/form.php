
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-video-camera"></i>
			<div class="content-header-title">Youtube Video Form</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="content-box">
					<form id="form-action">
						<input type="text" name="id" class="hidden" >
						<div class="form-group" style="width: 50%;">
							<label for=""> Video Title</label>
							<input class="form-control" name="video_title"  type="text">
							
						</div>
                                               
                          <div class="form-group" style="width: 50%; ">
							<label for="">Video ID</label>
							<input class="form-control" name="video_id"  type="text">   
							 </div>
							 <div class="form-group" style="width: 50%; ">
							<label for="">Video Date</label>
							<input class="form-control" name="video_date"  type="text">   
							 </div>
							 <div class="form-group" style="width: 50%; ">
							<label for="">Video Status</label>
							<input class="form-control" name="status"  type="text">   
                             </div>
                   
						
						
					</form>
					<div class="content-box-footer">
						<button type="button" class="btn btn-primary action" title="Cancel" onclick="form_routes('cancel')">Cancel</button>
						<button type="button" class="btn btn-primary action" title="save" onclick="form_routes('save')">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	var onLoad = (function() {
		var index = "<?php echo $index; ?>";
		
		if (index != '') {
		datagrid.formLoad('#form-action', index);
		}

		$('.loading-panel').hide();
		$('.form-panel').show();
	})();

	function validate(formData) {
		var returnData;
		
		$('#form-action').disable([".action"]);
		$("button[title='save']").html("Validating data, please wait...");
		$.ajax({
	        url: "<?php echo base_url() . 'youtubevideo/validate'; ?>", async: false, type: 'POST', data: formData,
	        success: function(data, textStatus, jqXHR) {
				returnData = data;
	        }
	    });

		$('#form-action').enable([".action"]);
		$("button[title='save']").html("Save changes");
        if (returnData != 'success') {
        	$('#form-action').enable([".action"]);
		$("button[title='save']").html("Save changes");
            $('.validation-message').html('');
            $('.validation-message').each(function() {
                for (var key in returnData) {
                    if ($(this).attr('data-field') == key) {
                        $(this).html(returnData[key]);
                    }
                }
            });
        } else {
		    return 'success';	
        }
	}

	function save(formData) {
		$("button[title='save']").html("Saving data, please wait...");
		$.post("<?php echo base_url() . 'youtubevideo/action'; ?>", formData).done(function(data) {
                   // alert(data);
        	$('.datagrid-panel').fadeIn();
			$('.form-panel').fadeOut();
			location.reload();
        });
	}

	function cancel() {
		$('.datagrid-panel').fadeIn();
		$('.form-panel').fadeOut();
	}

	function form_routes(action) {
		if (action == 'save') {
			var formData = $('#form-action').serialize();
			if (validate(formData) == 'success') {
				swal({   
					title: "Are You Sure？",   
					text: "Saved data can not be restored",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					cancelButtonText: "Cancel",
					confirmButtonText: "Save",
					closeOnConfirm: true 
				}, function() {
					save(formData);
                                        
                                       // alert(formData);
				});
			}
		} else {
			cancel();
		}
	}

</script>