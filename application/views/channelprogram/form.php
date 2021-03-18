
<div class="breadcrumb">
	<a href="">Home</a> 
        <a href="/channelprogram/program/<?php echo $channel->c_id;?>/10"><?php echo $channel->channel_title;?></a>
	
</div>
<div class="content">
	<div class="panel">
		
		<div class="row">
			<div class="col-md-12">
				<div style="background-color: #ddd; padding: 20px;">
					<form id="form-action">
                                            <input type="text" name="Id" class="hidden" value="<?php if(isset($program)) echo $program->p_id;?>" >
                                             <input type="text" name="channel" class="hidden" value="<?php echo $channel->c_id;?>" >
                                               <input type="text" name="presenter" class="hidden" value="<?php echo $channel->channel_title;?>" >
                                               
                                                <table width="100%">
                                                    <tr>
                                                        <td width="50%" style="padding-right: 15px;">
                                                             <div class="form-group">
							<label for="">Title</label>
							<input class="form-control" name="name" placeholder="Program Title" type="text" 
                                                               value="<?php if(isset($program)) echo $program->program_title;?>" required>
                                                        
                                                      
							<div class="validation-message" data-field="name"></div>
                                                        </div>
                                                            
                                                        </td>
                                                        <td width="20%" style="padding-right: 15px;">
                                                          <div class="form-group">
                <label for="">진행자</label>
                <select name="program_actor_id" class="form-control" style="height:40px">
                                     
                  <?php foreach ($actors as $item){?>
                  <option  <?php if (isset($actor) && $item->a_id == $actor) echo 'selected';  if(isset($program)  && $item->a_id == $program->program_actor_id) echo 'selected'?> value="<?php echo $item->a_id;?>"><?php echo $item->actor_name;?></option>
                  <?php }?>
                                  </select>
             
                                                          </div>
                                                          </td>
                                                        <td width="20%" style="padding-right: 15px;">
                                                        <div class="form-group">
							<label for="">방송시간</label>
                            <input class="form-control" name="program_date" placeholder="Program Date" type="text" 
                                                               value="<?php if(isset($date)) echo $date;  if(isset($program)) echo $program->program_date?>" required>
							<div class="validation-message" data-field="name"></div>
                                                        </div>
                                                        </td>
                                                       
                                                      

                                                    </tr>
                                     
                                                    
                                                </table>


                                                <div class="form-group">
               
                 <br/>
              
                 <input id="inputfile" name="file"  type="text" class="form-control" style="display: none;"
                                                               value="<?php if(isset($program)) echo $program->program_url;?>" required>
                
               </div>
					
    <div class="control-group">
      <table width="100%">
       <tr>
       <td width="60%">
        <div class="form-group">
							<label for="description"> Description</label>
							
							<textarea cols="80" id="ckeditor" name="program_info" rows="10" > <?php if(isset($program)) {echo $program->program_info;} else {echo $channel->channel_info;}?></textarea>
                                                        </div>
             </td>
       <td width="40%" style="padding-left: 15px;">
       <input type="text" name="cid" class="hidden" value="<?php echo $channel->c_id;?>" >
         <input type="file" style="display:none" onChange="fileupload()" name="userfile" id="file-1" class="inputfile inputfile-1" />
         <center>   <audio id="audiofile" src="<?php if(isset($program)){ echo $program->program_url ;}?>" name="" class="" controls="">Your browser does not support audio tag.</audio></center>

         <label id="uploadchooselabel" for="file-1" class="btn mgbottom-5 btn-md-width btn-success" style="width: 100%; margin: 0px;" ><i class="fa fa-search"></i> 
                   <span id="labelspan">파일 업로드 &hellip;</span></label>
                      

                   <div class="progress" style="margin-top:15px;">
                      <div id="overseasProgressBar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: #407ecb"></div>
                    </div>
        
        
        </td>
       
       </tr></table>
    <br/>
   
</div>



					</form>
                    <br/> <br/>                  

  
                                    <hr>       
                                 
   

					<div class="content-box-footer">
                                            <br>
                                            <center>
						
						<button type="button" class="btn btn-success btn-lg-width action" title="save" onclick="form_routes()">저 장</button>
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

	
})();
       

       

function fileupload()
{
  var file = document.getElementById('file-1').files[0];
  var ext = file.name.split('.').pop().toUpperCase();

  if ( ext != 'MP3')
  {
      alert("mp3문서를 선택하여 주십시오！");
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
  url : '/channelprogram/uploadAudio/<?php echo $channel->c_id;?>' ,
  data : form_data,
  processData : false,
  contentType : false,
  success : function(data) {
    $("#labelspan").html("업로드 완성하였습니다. 저장 하실수 있습니다.");
   $("#inputfile").val(data);
   $("#audiofile").attr('src',data);
   
   $('#overseasProgressBar').attr('aria-valuenow', 0).css('width', 0 + '%').text(0 + '%');

  }
});

}


    function form_routes()
    {
   
            if($('input[name="name"]').val()=='' ||   $("#inputfile").val() == ''  ) 
        {
             alert('타이틀 입력해 주시고 음성파일을 선택하여 주십시오!');
        } 
        else 
        {
          CKEDITOR.instances.ckeditor.updateElement();
              var formData = $('#form-action').serialize();
           //   alert(formData);
              $.post("<?php echo base_url() . 'channelprogram/action'; ?>", formData).done(function(data) {
        	if(data =='success') window.location.replace("/channelprogram/program/<?php echo $channel->c_id; ?>/0");
        });
        }
   
    }
   
    
    
</script>