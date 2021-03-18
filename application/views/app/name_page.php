<style>

</style>
<template>

<div class="page">
<div class="navbar" style="background-color:#a82a21;  height:60px;">
  <div class="navbar-inner" style="padding-left: 15px;">
           
    <div class="left" >
        <a href="#" class="link back">
          <i class="icon icon-back" style="color:#fff; font-size: 22px"></i>
        </a>
    </div>
         
     <div class="title sliding " style="color:#fff; padding-left: 5px; font-size: 24px; font-weight: 500;" >이름 등록</div>
              
   </div>
</div>
  
	<div class="page-content" style="margin-top:17px;">	

  <form class="list" id="my-form">
  <ul>
    <li class="accordion-item">
      <div class="item-content item-input">
        <div class="item-inner">
          <div class="item-title item-label">Name 이름</div>
          <div class="item-input-wrap">
            <input id="nameinput" type="text" name="user_name" placeholder="이름을 입력합니다" <?php if($this->session->userdata('user_name')) echo 'value="'.$this->session->userdata('user_name').'"';?>>
          </div>
        </div>
      </div>
    </li>
    
    <li>
      <div class="item-content item-input">
        <div class="item-inner">
          <div class="item-title item-label">Gender 성별</div>
          <div class="block block-strong" style="width:100%">
          <div class="row">
    <!-- Each "cell" has col-[width in percents] class -->
    <div class="col-50">&nbsp;&nbsp;Male 남&nbsp;&nbsp;<label class="radio"><input type="radio" name="demo-radio-inline" value="1" <?php if($this->session->userdata('gender') == 1) echo 'checked';?>><i class="icon-radio"></i></label></div>
    <div class="col-50">Female 여&nbsp;&nbsp;  <label class="radio"><input type="radio" name="demo-radio-inline" value="0" <?php if($this->session->userdata('gender') == 0) echo 'checked';?>><i class="icon-radio"></i></label></div>
    </div>
</div>
         
        </div>
      </div>
    </li>
   
  </ul>
</form>
<div class="block block-strong row">
  <div class="col"><a class="button convert-form-to-data" href="#">submit</a></div>
 
</div>
</div>
</template>

<script>
	return {
		on: {
			pageInit: function (e, page)  
			  {
          $("#nameinput").change(function() { 
            alert( "Handler for .change() called." );
           
          });



          $('.convert-form-to-data').on('click', function(){
             var formData = app.form.convertToData('#my-form');
             if($("#nameinput").val()==""){
                app.dialog.alert("이름을 입력해 주시기 바랍니다.",'알려드립니다');
               setTimeout(function () { app.dialog.close();}, 10000);
               } else if($("input[name='demo-radio-inline']:checked").val()==null){
                app.dialog.alert("성별을 선택해 주시기 바랍니다.",'알려드립니다');
               setTimeout(function () { app.dialog.close();}, 10000);

               } else {
                app.request.post('/app/postusername', { user_name:$("#nameinput").val(),gender:$("input[name='demo-radio-inline']:checked").val() }, function (data) {
                  settingsView.router.navigate('/namepage/', {});
            //      settingsView.router.navigate('/settings/', {});

                  });
               
                
               }
                // alert(JSON.stringify(formData));
              });
		     }
	}
  }


	  </script>