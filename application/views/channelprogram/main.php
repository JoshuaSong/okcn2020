<!-- Table -->
<style>
    .form-control{
        height: 20px;
    }
    .table.dataTable {
    margin-top: 0px !important;
}
.table.dataTable.table-bordered thead th {
   padding: 10px 20px;
}
.table.dataTable thead .sorting:before, table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:before, table.dataTable thead .sorting_desc_disabled:after {
    bottom: 10px;
}

</style>
<section>
	<div class="breadcrumb">
		<a href="">Home</a> 
		<a href="">频道内节目管理</a>
	</div>
	<div class="content" style="min-height: 800px;">
		
			<div class="content-header no-mg-top">
				<i class="fa fa-newspaper-o"></i>
                               
                                <div class="content-header-title" style="width:100%">
                                     <?php if($this->session->userdata('active_user')->role ==1) {?>
                                    <table width="100%">
                                        <tr>
                                            <td width="50%" style=" padding-left: 50px;">频道分类: 
                                                <select id="categoryselect" onchange="selectcategory(this)" name="" class="categorySel">
                                        <option value="0" selected="">全部分类</option>
                                        <?php foreach ($cats as $item){?>
                                        <option value="<?php echo $item->Id;?>" <?php if($item->Id == $cid) echo 'selected';?>><?php echo $item->name;?></option>
                                        <?php }?>
                                    </select>
                                            </td><td width="50%">频道系列: <select name="" class="categorySel" onchange="selecttheme(this)">
                                        <option value="0" selected="">全部系列</option>
                                        <?php foreach ($themes as $item){?>
                                        <option value="<?php echo $item->Id;?>" <?php if($item->Id == $tid) echo 'selected';?>><?php echo $item->name;?></option>
                                        <?php }?>
                                    </select></td>
                                        </tr>
                                    </table>
                                     <?php }?>
                                </div>
                                <div style=" float: left; margin-left: 200px;"></div>
			</div>
			<div class="row">
	
				<div class="col-md-12">
					<div class="content">
						<table class="table table-striped table-bordered table-hover" id="channeltable" style="font-size: 18px;width: 100%;">
                      
        <thead>
            <tr>
                
                
                <th>频道</th>
             
               <th>主创</th>
               <!--
               <th>최근 입력된 프로그램</th>
               -->
                <th width="100px;"></th>
            </tr>
        </thead>
       
        <tbody >
        	 <?php foreach ($channels as $row) { ?>
            <tr >
            	  
                <td  >
                   <?php echo $row->name.'('.$row->cname.'/'.$row->tname.')'?>
                </td>
                 <td><?php echo $row->pname?></td>
                 <!--                   <td  >
                   <?php if(isset($row->program)) {?>
                       <span style="font-size: 14px;"><?php echo '('.$row->program->addtime.')'.$row->program->name?> </span><br>
                       <audio src="http://cms.igbc.net<?php echo $row->program->file?>" name="asdf" class="" controls="">Your browser does not support audio tag.</audio>
                 <?php }?>
                </td>
               -->
               
              
                <td><a href="/channelprogram/program/<?php echo $row->Id?>/10">节目管理</a></td>
            </tr>
           <?php } ?>
        </tbody>
    </table>
                                             <?php if($limit ==20 && sizeof($channels) > 19 ) {?>
            <center><a style="font-size: 20px; font-weight: 500;" href="/channelprogram/index/<?php echo $cid;?>/<?php echo $tid;?>/0">更多 ... </a></center>
            <?php } ?>
					</div>
				</div>
			</div>
		
	</div>
</section>

<!-- Form -->
<section class="form-panel"></section>

<script type="text/javascript">

	$(document).ready(function() {
	$('#channeltable').DataTable( {
        scrollY:        '52vh',
        scrollCollapse: true,
        paging:         false,
         order: [[ 2, "desc" ]]
    } );

		
		
	});
	

        function selectcategory(e)
        {
         //   alert( e.value );
            window.location = '/channelprogram/index/'+e.value+'/0';
        }
         function selecttheme(e)
        {
         //   alert( e.value );
            window.location = '/channelprogram/index/0/'+e.value;
        }

</script>