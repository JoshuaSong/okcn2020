<style>
  .chapter {
  background: #fff;
  text-align: center;
  color: #000;
  border: 1px solid #ddd;
  border-radius: 3px;
  padding: 5px;
  margin-bottom: 10px;
  font-size: 18px;
  width:18% ;
  margin-left: 1%;
  margin-right: 1%;
}
.nonechapter {
  height: 0px;
  width:20% ;
}
.list .item-inner:after{
  height: 0px;
}
</style>
<template>

<div class="page">
<div class="navbar" style="background-color:#efeff4;  height:60px;">
  <div class="navbar-inner" style="padding-left: 15px;">
           
    <div class="left" >
        <a href="#" class="link back">
          <i class="icon icon-back" style="color:#9f1f25; font-size: 22px"></i>
        </a>
    </div>
         
     <div class="title sliding " style="color:#9f1f25; padding-left: 5px; font-size: 24px; font-weight: 500;" >성경버전선택</div>
              
   </div>
</div>
  
	<div class="page-content" style="padding-top:0px">	
			 
  <div class="list accordion-list" style="margin-top:60px">
  <ul>
  <?php foreach( $versions as $row){?>
  <li class="accordion-item <?php if($row->order == 1) echo 'accordion-item-opened'?>"><a href="#" class="item-content item-link" style="border-bottom: 1px solid #386892;">
        <div class="item-inner" >
          <div class="item-title"><?php echo $row->title;?></div>
        </div></a>
      <div class="accordion-item-content" style="background-color: #eee;">
        <div class="block">
        <div class="list inset">
          <ul style="background-color: #eee;">
          <?php foreach( $row->versions as $item){?>
          <li  onclick="version2bible('<?php echo $item->name.'-'.$item->book_lang.'-'.$item->ot.'-'.$item->nt.'-'.$item->lang.'/'. $item->initial.'/-'.$item->id;?>')">
             <a href="#" class="list-button"><?php echo $item->name;?></a>
            </li>
          <?php }?>
   
         </ul>
        </div>
      </div>
    </div>
  </li>
  <?php }?>
  
  </ul>
</div>

</div>
</template>

<script>
	return {
		on: {
			pageInit: function (e, page)  
			  {
				
		     }
	}
  }


	  </script>