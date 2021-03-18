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
		<a href="/channelprogram">Program List</a>
	</div>
	<div class="content">
		
			<div class="content-header no-mg-top">
                            <table width="100%">
                                <tr>
                               
                                    <td width="140px"> <a href="/channelprogram/addprogram/<?php echo $channel->c_id?>" class="btn btn-primary" style="font-size: 16px; background-color:  #058ED3; "><i class="fa fa-pencil"></i>Add New</a></td>

                                    <td style=" text-align: center" > <p style="font-size:24px; color: #058ED3">Channel : <?php echo $channel->channel_title.'('.$channel->category_name.')'?> </p> </td>
                                </tr>
                            </table>
                                            
                                   
                                </div>
                               
			
	<div class="row">
        <div class="col-md-12">
	<div class="content-box">
	<table class="table table-striped table-bordered table-hover" id="programtable" style="font-size: 18px;width: 100%;">
                      
        <thead>
            <tr>
                
                
               <th>Title</th>             
               <th>Date</th>
               <th>File</th>
             
               <th  style="width: 150px;"></th>

            </tr>
        </thead>
       
        <tbody >
        	 <?php if(isset($programs)) foreach ($programs as $row) { ?>
            <tr >
            	  
                <td  >
                   <?php echo $row->program_title;?>
                </td>
                 <td  >
                   <?php echo $row->program_date;?>
                </td>
                   <td  >
                   <?php if(isset($row->program_url)) {?>
                   
            <audio src="<?php  echo $row->program_url;?>" name="asdf" class="" controls="">Your browser does not support audio tag.</audio>
                 <?php }?>
                </td>
               
               
         
              
                <td style="font-size: 16px; font-weight: 700; text-align: center; color:  #058ED3"><a href="/channelprogram/edit/<?php echo $channel->c_id.'/'.$row->p_id?>">편집</a>
                    <a style=" margin-left: 10px; color: #F26F25; " onclick="delete_action(<?php echo $row->p_id?>)">삭제</a></td>
                
            </tr>
           <?php } ?>
        </tbody>
    </table>
            <?php if($limit !=0 ) {?>
            <center><a style="font-size: 20px; font-weight: 500;" href="/channelprogram/program/<?php echo $channel->c_id;?>/0">More ... </a></center>
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
	$('#programtable').DataTable( {
        scrollY:        '52vh',
        scrollCollapse: true,
        paging:         false,
        order: [[ 1, "desc" ]]
    } );

		
		
	});
        
         function delete_action(e) {
		swal({   
			title: "Are you sure want to delete this program?",   
			text: "",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			cancelButtonText: "Cancel",
			confirmButtonText: "Sure",
			closeOnConfirm: true 
		}, function() {
			
			$.post("<?php echo base_url() . 'channelprogram/delete'; ?>", {id : e}).done(function(data) {
				if(data =='success') window.location.replace("/channelprogram/program/<?php echo $channel->c_id; ?>/10");
			});
		});
	}
    
	

      

</script>