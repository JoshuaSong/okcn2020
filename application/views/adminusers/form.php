


<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title"><?php echo $title?></div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="content-box">
					<form id="form-action">
						<input type="text" name="id" class="hidden"  value="<?php echo (isset($user))? $user->Id:'' ?>">
                                                <div class="form-group">
							<label for=""> Email</label>
                                                     
                                                        <input id="inputemail" class="form-control" name="email" placeholder="Email" type="email">
							<div class="validation-message" data-field="email"  ></div>
						</div>
						<div class="form-group">
							<label for=""> Name</label>
							<input class="form-control" name="name" placeholder="Name" type="text"  value="<?php echo (isset($user))? $user->name:'' ?>" >
							<div class="validation-message" data-field="name"></div>
						</div>
						
                                                <div class="form-group" style="<?php echo (isset($user))? 'display:none':'' ?>">
							<label for=""> Password</label>
							<input class="form-control" name="password"  type="password" value="<?php echo (isset($user))? $user->password:'' ?>" >
							<div class="validation-message" data-field="password"></div>
						</div>

						<div class="form-group">
							<label for="">Role</label>
							<select id="roleselect" name="role" class="form-control" >
								<?php foreach ($groups as $key => $group) { ?>
									<option value="<?php echo $group->Id; ?>"><?php echo $group->name; ?></option>
								<?php } ?>
							</select>
							<div class="validation-message" data-field="group"></div>
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

	 $(document).ready(function() {
             $('#roleselect').val('<?php echo (isset($user))? str_replace(',','',$user->role):'' ?>');
               $('#inputemail').val('<?php echo (isset($user))? $user->email:'' ?>');
         })
	function validate(formData) {
		var returnData;
		$('#form-action').disable([".action"]);
		$("button[title='save']").html("Validating data, please wait...");
		$.ajax({
			url: "<?php echo base_url() . 'adminusers/validate'; ?>", async: false, type: 'POST', data: formData,
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
		$.post("<?php echo base_url() . 'adminusers/action'; ?>", formData).done(function(data) {
			  window.location = '/adminusers';
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
                                  //  alert(formData);
					save(formData);
				});
			}
		} else {
			cancel();
		}
	}

</script>