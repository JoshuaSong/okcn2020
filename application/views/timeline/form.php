<style>
    .radio-inline{
        font-size: 18px; padding: 10px;
    }
   
  
</style>

<div class="breadcrumb">
	
</div>
<div class="content">
    
<center>
                <p style="font-size: 24px; color: #005cbf; font-weight: 500"> 편성표 <?php echo (isset($timeline))? "（편집）":"（추가）" ?></p>
         
    
            </center>
	<div class="panel">
		
		<div class="row">
			<div class="col-md-12">
				<div style="background-color: #ddd; padding: 20px;">
					<form id="form-action">
                                            <center>
                                          
                                            <label class="radio-inline">
        <input type="radio" name="optradio" value="0">&nbsp;주일
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="1">&nbsp;월요일
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&nbsp;화요일
    </label>
   <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&nbsp;수요일
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4">&nbsp;목요일
    </label>
  <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&nbsp;금요일
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&nbsp;토요일
    </label>
  	  </center><br/><br/>
                                            <table width="100%" style="margin-left: auto; margin-right: auto">
                                                    <tr>
                                                      
                                                       
                                                        <td width="10%" style="padding-right: 15px;">
                                                      <div class="form-group" >
							<label for="order">start_time</label>
              <input style="display:none" class="form-control" name="Id"  type="text" value="<?php echo (isset($timeline))? $timeline->Id:"" ?>">
              <input class="form-control" name="start_time" placeholder="Start Time" type="text" value="<?php echo (isset($timeline))? $timeline->start_time:"" ?>">
                                                        </div>
                                                        </td>
                                                        <td width="10%" style="padding-right: 15px;">
                                                      <div class="form-group" >
							<label for="order">end_time</label>
              <input class="form-control" name="end_time" placeholder="end_time" type="text" value="<?php echo (isset($timeline))? $timeline->end_time:"" ?>">
                                                        </div>
                                                        </td>
                                                        <td width="30%" style="padding-right: 15px;">
                                                      <div class="form-group">
							<label for="order">Channel</label>
                                                        <input type="text" name="cid" class="hidden" value="<?php echo (isset($timeline))? $timeline->cid:"" ?>" >
                                                     
							<select id='channel' name="channel" class="form-control" style="height: 40px;">
                                     
                                        <?php foreach ($channel_list as $item){?>
                                        <option  value="<?php echo $item->c_id;?>" <?php if( isset($timeline) && $item->c_id == $timeline->cid) echo 'selected';?>><?php echo $item->channel_title;?></option>
                                        <?php }?>
                                    </select>
                                                        </div>
                                                        </td>
                                                       
                                                    
                                                    </tr>
                                                
                                        
                                                </table>
						
                                               
                                                <div class="form-group">
							
						</div>
						<div class="form-group">
							
						</div>
                                                   <br>
                                                <hr>
					</form>
					<div class="content-box-footer">
                                            <br>
                                            <center>
						<button type="button" class="btn btn-default action" title="Cancel" onclick="form_routes('cancel')">Cancel</button>
						<button type="button" class="btn btn-success btn-lg-width action" title="save" onclick="form_routes('save')">Save</button>
                                                                                            </center>
                                            <br/>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
$('input[name="optradio"]:eq(<?php echo $week;?>)').attr('checked', 'checked');	

	});



	
	


	function form_routes(action) {
		if (action == 'save') {

			var formData = $('#form-action').serialize();
		
		//	if ($("#channel").val()==null) {
		//		swal({   
		//			title: "请选择频道!",   
				
		//			confirmButtonColor: "#DD6B55",
		//			cancelButtonText: "Cancel",
		//			confirmButtonText: "OK",
		//			closeOnConfirm: true 
		//		});
		//	}else {

                        $.post("<?php echo base_url() . 'timeline/action'; ?>", formData).done(function(data) {
                 
                       window.location = '/timeline/index/'+data;
                 
        	
        });
	//	}
		} 
	}
      
	

</script>