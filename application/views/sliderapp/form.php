<div class="breadcrumb">
	<a href="">Home</a> 
	<a href="">Slider Form</a>
</div>
<div class="content">
	<div class="panel">
		
		<div class="row">
			<div class="col-md-12">
				<div style="background-color: #ddd; padding: 20px;">
					<form id="form-action">
						<input style="display: none;" type="text" name="id" >
                                                <table width="100%">
                                                    <tr>
                                                        <td width="40%" style="padding-right: 15px;">
                                                        <div class="form-group">
							<label for=""> Title</label>
						
							<input class="form-control" name="banners_name" placeholder="Title" type="text">
							<div class="validation-message" data-field="name"></div>
                                                        </div>
                                                        </td>
                                                        <td width="60%">
														<div class="form-group" style="width:60%; float: left;">
							<label for="link">Link</label>
							<input class="form-control" name="banners_link" placeholder="link" type="text">
						
														</div>
														<div class="form-group" style="width:38%; float:right">
							<label for="link"> Order</label>
							<input class="form-control" name="order" placeholder="order" type="text">
						
                                                        </div>
														
                                                        </td>
                                                    </tr>
                                                  
                                                   
                                                     <tr>
                                                        <td style="padding-right: 15px;">
                                                        <div class="form-group">

                                                          <input id="ckfinder-input" style="display: none;"  name="banners_image" value="" type="text">
														<center>  <img src="" id="slide-image" style=" height:150px "></center>
														<br/>
														  

														  <input type="file" style="display:none" onChange="fileupload()" name="userfile" id="file-1" class="inputfile inputfile-1" />
                   <label id="uploadchooselabel" for="file-1" class="btn mgbottom-5 btn-md-width btn-success" style="width: 100%; margin: 0px; color: #fff" ><i class="fa fa-search"></i> 
                   <span id="labelspan">이미지 업로드 &hellip;</span></label>
                      

                   <div class="progress" style="margin-top:15px;">
                      <div id="overseasProgressBar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: #407ecb"></div>
                    </div>
                                                              </div>
                                                        
							
                                                        </td>
                                                        <td > 
														<div class="form-group">
							<label for="order"> Status</label>
							<textarea cols="80" id="ckeditor" name="banner_title" rows="10"></textarea></div>
                                                        </td>
                                                    </tr>
                                                </table>
						
                                              
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
		
			$('#slide-image').show().attr('src','/assets/uploads/'+row.banners_image);
                      
                    $('#ckfinder-input').val(row.banners_image);
                      
		}

		$('.loading-panel').hide();
		$('.form-panel').show();
	})();

	function validate(formData) {
		var returnData;
	
		$('#form-action').disable([".action"]);
		$("button[title='save']").html("Validating data, please wait...");
		$.ajax({
	        url: "<?php echo base_url() . 'sliderapp/validate'; ?>", async: false, type: 'POST', data: formData,
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
	//	alert(formData);
		$.post("<?php echo base_url() . 'sliderapp/action'; ?>", formData).done(function(data) {
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
			CKEDITOR.instances.ckeditor.updateElement();
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
       

       
	function fileupload()
{
  var file = document.getElementById('file-1').files[0];
  var ext = file.name.split('.').pop().toUpperCase();

  if ( ext != 'JPG' && ext != 'PNG' && ext != 'GIF'  && ext != 'JPEG')
  {
      alert("이미지 파일을 선택하여 주십시오！");
  } else{
  upload2amazon(file);
  
  }
  
        

}

function upload2amazon(file)
{

  var form_data = new FormData();
  form_data.append("userfile",file);
  

$.ajax({
    xhr : function() {
    var xhr = new window.XMLHttpRequest();

    xhr.upload.addEventListener('progress', function(e) {

      if (e.lengthComputable) {

    

        var percent = Math.round((e.loaded / e.total) * 100);

        $('#overseasProgressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');

      }

    });

    return xhr;
  },
  type : 'POST',
  url : '/sliderapp/uploadimage',
  data : form_data,
  processData : false,
  contentType : false,
  success : function(data) {
	$("#labelspan").html("업로드 완성하였습니다. 저장 하실수 있습니다.");
	
   $("#ckfinder-input").val(data);
   $("#slide-image").attr('src','/assets/uploads/'+data);
   
   $('#overseasProgressBar').attr('aria-valuenow', 0).css('width', 0 + '%').text(0 + '%');

  }
});

}

</script>