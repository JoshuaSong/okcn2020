<div class="breadcrumb">
	<a href="">Home</a> 
	<a href="">Today Prayer</a>
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Today Prayer</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="content-box">
					<form id="form-action">
						<input type="text" name="id" class="hidden" >
						<div class="form-group" style="width: 50%; float: left; ">
							<label for=""> Title</label>
							<input class="form-control" name="prayer_title"  type="text">
							
						</div>
                                               
                          <div class="form-group" style="width: 48%; float: right; ">
							<label for="">시간</label>
							<input class="form-control" name="prayer_date" placeholder="yyyy-mm-dd"  type="text">   
                             </div>
                        <div class="form-group">
						<label for="">상황 설명</label>
							<textarea cols="80" name="prayer_info" rows="10" style="width:100%;"></textarea>                       
						
						</div>
						<div class="form-group">
						<label for="">기도 내용</label>
							<textarea cols="80" name="prayer_cont" rows="10" style="width:100%;"></textarea>                       
						
						</div>
						<div class="form-group">

<input id="ckfinder-input" style="display: none;"  name="prayer_image" value="" type="text">
<center>  <img src="" id="slide-image" style=" height:150px "></center>
<br/>


<input type="file" style="display:none" onChange="fileupload()" name="userfile" id="file-1" class="inputfile inputfile-1" />
<label id="uploadchooselabel" for="file-1" class="btn mgbottom-5 btn-md-width btn-success" style="width: 100%; margin: 0px; color: #fff" ><i class="fa fa-search"></i> 
<span id="labelspan">이미지 업로드 &hellip;</span></label>


<div class="progress" style="margin-top:15px;">
<div id="overseasProgressBar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: #407ecb"></div>
</div>
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
		var row = datagrid.getRowData(index);
		
		$('#slide-image').show().attr('src',row.prayer_image);
				  
				$('#ckfinder-input').val(row.prayer_image);
		}

		$('.loading-panel').hide();
		$('.form-panel').show();
	})();

	function validate(formData) {
		var returnData;
		
		$('#form-action').disable([".action"]);
		$("button[title='save']").html("Validating data, please wait...");
		$.ajax({
	        url: "<?php echo base_url() . 'todayprayer/validate'; ?>", async: false, type: 'POST', data: formData,
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
		$.post("<?php echo base_url() . 'todayprayer/action'; ?>", formData).done(function(data) {
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
  url : '/todayprayer/uploadimage',
  data : form_data,
  processData : false,
  contentType : false,
  success : function(data) {
	$("#labelspan").html("업로드 완성하였습니다. 저장 하실수 있습니다.");
	
   $("#ckfinder-input").val(data);
   $("#slide-image").attr('src',data);
   
   $('#overseasProgressBar').attr('aria-valuenow', 0).css('width', 0 + '%').text(0 + '%');

  }
});

}

</script>