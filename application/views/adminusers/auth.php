
<style>
    
    label{
         font-size: 18px;
    }
</style>

<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
                        <div class="content-header-title" style="font-size: 24px; color:#143499"><?php echo $title.' 》》 '.$user->name;?></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="content-box">
					<?php foreach($allchannels as $category){?>
                                     <hr>
                                     <center>
                                    <p style=" margin: 20px; font-size: 30px; color:#143499   "><?php echo $category->name?></p>
                                    </center>
                                    <hr>
                                    <div  class="row">
                                    <?php foreach($category->channels as $channel){?>
                                    <div class="col-md-3" >
                                        <input type="checkbox" channelid="<?php echo $channel->Id;?>" <?php if(isset($userchannels) && in_array($channel->Id, $userchannels)) echo 'checked'?>>
                                        <label><?php echo $channel->chname;?></label>&nbsp;&nbsp;</div>
                                      <?php }?>
                                    </div>
                                    <?php }?>
					
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
var arrId = [];
	 $(document).ready(function() {
           $("input[type='checkbox']").each(function() {
			$(this).on("click", function() {
				arrId = [];
				$("input[type='checkbox']").each(function() {
					if ($(this).is(':checked')) {
                                          
						arrId.push($(this).attr('channelid'));
					}
				});
                                
				$.post("<?php echo base_url() . 'adminusers/userchannelaction'; ?>", {user_id: <?php echo $user->Id;?>, arr_id: arrId});
			});
		});
         })


</script>