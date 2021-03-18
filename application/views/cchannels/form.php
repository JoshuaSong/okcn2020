<div class="breadcrumb">
	<a href="">Home</a> 
	<a href="">Channel Form</a>
</div>
<div class="content">
	<div class="panel">
		
		<div class="row">
			<div class="col-md-12">
				<div style="background-color: #ddd; padding: 20px;">
					<form id="form-action">
						<input id="cid" style="display: none;" type="text" name="c_id" >
                                                <table width="100%">
                                                    <tr>
                                                        <td width="50%" style="padding-right: 15px;">
                                                        <div class="form-group">
							<label for=""> Channel-Title</label>
							<input class="form-control" name="channel_title" placeholder="Channel Name" type="text">
							<div class="validation-message" data-field="channel_title"></div>
                                                        </div>
                                                        </td>
                                                        <td width="50%"> 
                                                        <table width="100%">
                                                    <tr>
                                                        <td width="30%" style="padding-right: 15px;">
                                                        <div class="form-group">
							<label for="presenter">Category</label>
							
                                                        <select name="ctg_id" class="form-control" style="height:40px">
                                     
                                        <?php foreach ($cats as $item){?>
                                        <option value="<?php echo $item->category_id;?>"><?php echo $item->category_name;?></option>
                                        <?php }?>
                                                        </select></div>
														 </tb>
														 <td width="30%" style="padding-right: 15px;">
                                                          <div class="form-group">
                <label for="">진행자</label>
                <select name="actor_id" class="form-control" style="height:40px">
                                     
                  <?php foreach ($actors as $item){?>
                  <option value="<?php echo $item->a_id;?>"><?php echo $item->actor_name;?></option>
                  <?php }?>
                                  </select>
             
                                                          </div>
                                                          </td>
                                                         <td width="30%" style="padding-right: 15px;">
                                                         <div class="form-group">
							<label for="order"> Status</label>
                                                            <select name="status"  class="form-control" style="height:40px">
                                                                <option value="0" selected="">normal</option>
                                                                <option value="1">disable</option>
                                                                </select>
                                                        </div>
                                                         </tb>
														 <td width="10%"><div class="form-group">
							<label for="order">Order</label>
							<input class="form-control" name="order_id" placeholder="Order" type="text">    
                                                        </div></td>
</tr>
</table>
                                                        
                                                        
                                                       
                                                        </td>
                                                    </tr>
                                                   
                                                        <td width="50%" style="padding-right: 15px;">
                                                       
                                                        
                                                        <div class="form-group">
<center>
<img  id="slide-image" style=" width: 80%; "><br/><br/><br/>
					<input type="file" style="display:none" onChange="imageupload()" name="userfile" id="file-2" class="inputfile inputfile-2" />
                    <label id="uploadchooselabel" for="file-2" class="btn mgbottom-5 btn-md-width btn-success" style="width: 80%; margin: 0px; color:#fff"><i class="fa fa-search"></i>
                      <span id="labelspanimage">Upload Image</span></label>
                             <input id="ckfinder-input" style="display: none;"  name="titleimage" value="" type="text">
							 
							 <div class="progress" style="margin-top:15px;">
								<div id="progressBar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: #40C0CB"></div>
							  </div>
							</center>
                                </div>
                                                        </td>
                                                        <td width="50%"> 
														
                                                        <div class="form-group">
							<label for="description"> Description(Image 16:9 1280x720 )</label>
							
							<textarea cols="80" id="ckeditor" name="channel_info" rows="10"></textarea>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td width="50%" style="padding-right: 15px; vertical-align: top;">
                             
                                                        
							
                                                        </td>
                                                        <td width="50%"> 
													
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

  var time = Date.now();
  var rd = Math.floor(Math.random() * 1000);
  var folder = 'files';
  var filename = 'okcn_' + time + rd;
	var onLoad = (function() {
		
		if ($('#ckeditor').length) {
		CKEDITOR.replace('ckeditor',{
                filebrowserUploadUrl: '<?php echo base_url('/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files');?>',
		filebrowserImageBrowseUrl : '<?php echo base_url('/assets/ckfinder/ckfinder.html');?>'
    });
		
	}
		
		var index = "<?php echo $index; ?>";
      
		if (index != '') {
			datagrid.formLoad('#form-action', index);
			var row = datagrid.getRowData(index);
		
			$('#slide-image').show().attr('src',row.channel_poster);
                      
                    $('#ckfinder-input').val(row.channel_poster);
                       
                   //      $('#bg-image').show().attr('src','http://cms.igbc.net/'+row.bg_img);
                   //     $("#category").val(row.category).change();
                      
		}

		$('.loading-panel').hide();
		$('.form-panel').show();
	})();

	function validate(formData) {
		var returnData;
		$('#form-action').disable([".action"]);
		$("button[title='save']").html("Validating data, please wait...");
		$.ajax({
	        url: "<?php echo base_url() . 'cchannels/validate'; ?>", async: false, type: 'POST', data: formData,
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
		//alert(formData);
		$.post("<?php echo base_url() . 'cchannels/action'; ?>", formData).done(function(data) {
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
			CKEDITOR.instances.ckeditor.updateElement();
			var formData = $('#form-action').serialize();
		//	alert(formData);
		
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






    function imageupload() {
	var file = document.getElementById('file-2').files[0];
	var ext = file.name.split('.').pop().toUpperCase();

    if( ext == 'PNG' || ext == 'JPG' || ext == 'JPEG' || ext == 'GIF')
    {
	var anewfilename = filename + '.' + file.name.split('.').pop();
    var form_data = new FormData();
    form_data.append("userfile", file);
    $.ajax({
		xhr : function() {

    var xhr = new window.XMLHttpRequest();

    xhr.upload.addEventListener('progress', function(e) {

      if (e.lengthComputable) {
        var percent = Math.round((e.loaded / e.total) * 100);

        $('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');

      }

    });

    return xhr;

  },
      type: 'POST',
      url: '/channelprogram/uploadImage2Amazone/' + anewfilename,
      data: form_data,
      processData: false,
      contentType: false,
      success: function(data) {
		
		$("#labelspanimage").html("Uploading Finished！");
		$("#slide-image").attr('src',data);
		$("#ckfinder-input").val(data);


      },

    });


    }else{
       alert('Please Selecte an image file！');
     }

	}
        
	

</script>