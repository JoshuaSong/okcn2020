
<template>
<div class="page" data-name="share">
<?php $data['title']='';  $this->load->view('/app/page_navbar',$data);?>
<div class="page-content">

 
  


</div>
</div>

</template>
<script>
return {
  on:{
   pageInit:function (e,page){
  
       
   // app.dialog.alert("Init","OKCN Radio");

   },
  pageReinit: function (e,page)
  {
   // app.dialog.alert("Reinit","OKCN Radio");


  }
 }
}
</script>