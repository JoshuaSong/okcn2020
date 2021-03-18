<style>
body{ background-color: #f9e1e0;}
</style>


<div class="auth-wrapper">
    <form id="form-signin">
	<br/><br/><br/>
	<center><img src="/images/okcn_logo.png" style="width: 160px;" />
	   <h1 style="font-size: 40px; color: #a82a21; ">OKCN CMS</h1> 
	   <p  style="font-size: 20px; color:dimgray; ">Content Management System</p>
	</center> 
        <div class="auth-body" style="font-size: 20px;">
            <div class="auth-content">
                <div class="form-group">
                    <label style="color: #a82a21;" for="">Email</label>
                    <input class="form-control" placeholder="Enter email" name="email" type="text">
                </div>
                <div class="form-group">
                    <label  <label style="color: #a82a21;" for="">Password</label>
                    <input class="form-control" placeholder="Enter password" name="password" type="password" value="">
                    <div class="validation-message" data-field="password"></div>
                </div>
            </div>
            <div class="auth-footer">
                <button class="btn btn-primary btn-block" id="sign-in" style="font-size: 20px; background-color: #a82a21;" type="button">Log me in</button>
               
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
	$('#sign-in').on("click", function() {
		login();
	});
	$("#form-signin").keypress(function(event) {
		if (event.which == 13) {
			login();
		}
	});

	function login() {
		$('#sign-in').html("Authenticating...").attr('disabled', true);
		var data = $('#form-signin').serialize();
		$.post("<?php echo base_url() . 'auth/login_attempt'; ?>", data).done(function(data) {
			if (data.status == "success") {
				window.location.replace("<?php echo base_url().'dashboard'; ?>");
			} else {
				$('#sign-in').html("Login").attr('disabled', false);
				$('.validation-message').html('');
				$('.validation-message').each(function() {
					for (var key in data) {
						if ($(this).attr('data-field') == key) {
							$(this).html(data[key]);
						}
					}
				});
			}
		});
	}
</script>