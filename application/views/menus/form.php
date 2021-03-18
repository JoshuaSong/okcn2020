<div class="breadcrumb">
	<a href="">Home</a> 
	<a href="">Menu Form</a>
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Menu Form</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div style="background-color: #ddd; padding: 20px;">
					<form id="form-action">
						<input type="text" name="id" class="hidden">
						<div class="form-group">
							<label for="">Title</label>
							<input class="form-control" name="title" placeholder="Title" type="text">
							<div class="validation-message" data-field="title"></div>
						</div>
						<div class="form-group">
							<label for="">Icon</label>
							<input class="form-control" name="icon" placeholder="Icon" type="text">
							<div class="validation-message" data-field="icon"></div>
						</div>
						
						<div class="form-group">
							<label for="">Link</label>
							<input class="form-control" name="link" placeholder="Link" type="text">
							<div class="validation-message" data-field="link"></div>
						</div>
						<div class="form-group">
							<label for="is_have_child">Is Have Child</label>
							<input class="form-control" name="is_have_child" placeholder="0" type="text">
							
						</div>
						<div class="form-group">
							<label for="order">Order</label>
							<input class="form-control" name="order" placeholder="0" type="text">
							
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
	        url: "<?php echo base_url() . 'menus/validate'; ?>", async: false, type: 'POST', data: formData,
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
		
		$.post("<?php echo base_url() . 'menus/action'; ?>", formData).done(function(data) {
        	$('.datagrid-panel').fadeIn();
			$('.form-panel').fadeOut();
			datagrid.reload();
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
					//type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					cancelButtonText: "Cancel",
					confirmButtonText: "Save",
					closeOnConfirm: true 
				}, function() {
					save(formData);
				});
			}
		} else {
			cancel();
		}
	}

</script>