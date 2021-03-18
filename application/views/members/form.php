
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-users"></i>
			<div class="content-header-title">Members Form</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="content-box">
					<form id="form-action">
						<input type="text" name="id" class="hidden" >
						<div class="form-group" style="width: 33%; float: left; ">
							<label for="">Username</label>
							<input class="form-control" name="user_name"  type="text" disabled>
							
						</div>
                                               
                          <div class="form-group" style="width: 33%; float: left; ">
							<label for="">Phone</label>
							<input class="form-control" name="phone"  type="text" disabled>   
							 </div>
							 <div class="form-group" style="width: 33%; float: right; ">
							<label for="">Status</label>
							<input class="form-control" name="status"  type="text" value="0">   
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



	function save(formData) {
		$("button[title='save']").html("Saving data, please wait...");

		$.post("<?php echo base_url() . 'members/update'; ?>", formData).done(function(data) {
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
		
		} else {
			cancel();
		}
	}

</script>