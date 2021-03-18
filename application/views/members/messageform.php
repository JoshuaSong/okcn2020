
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-users"></i>
			<div class="content-header-title">Message to Member Form</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="content-box">
					<form id="form-action">
					<input type="text" name="id" class="hidden" >
						<div class="form-group" style="width: 33%; float: left; ">
							<label for="">To Member</label>
							<input class="form-control" name="user_name"  type="text" disabled>
							
						</div>
                                               
                          <div class="form-group" style="width: 33%; float: left; ">
							<label for="">Member's Phone</label>
							<input class="form-control" name="phone"  type="text" disabled>   
							 </div>
							 <div class="form-group" style="width: 33%; float: right; ">
							<label for="">Member's Status</label>
							<input class="form-control" name="status"  type="text" disabled>   
                             </div>
                        <div class="form-group">
							<label for="">Message</label>
							<textarea id="textcontents" cols="80" name="contents" rows="10" style="width:100%;"></textarea>                       
						
						</div>
                    
						
					</form>
					<div class="content-box-footer">
						<button type="button" class="btn btn-primary action" title="Cancel" onclick="form_routes('cancel')">Cancel</button>
						<button type="button" class="btn btn-primary action" title="save" onclick="form_routes('save')">Send Message</button>
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
		$.post("<?php echo base_url() . 'members/sendmessagetomember'; ?>", formData).done(function(data) {
                 
        	$('.datagrid-panel').fadeIn();
			$('.form-panel').fadeOut();
			location.href = "http://okcnradio.org/message";
		
        });
	}

	function cancel() {
		$('.datagrid-panel').fadeIn();
		$('.form-panel').fadeOut();
	}

	function form_routes(action) {
		if (action == 'save') {
			var formData = $('#form-action').serialize();
			if ($("#textcontents").val() != '') {
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