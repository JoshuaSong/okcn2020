<style>
    .radio-inline{
        font-size: 18px; padding: 10px;
    }
     .form-control{
        height: 15px;
    }
    .table.dataTable {
    margin-top: 0px !important;
   
}
.table.dataTable.table-bordered thead th {
    border-top: 1px #333 solid;
    background-color: #ccc;
   padding: 10px 20px;
}
.table.dataTable thead .sorting:before, table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:before, table.dataTable thead .sorting_desc_disabled:after {
    bottom: 10px;
}
.table.dataTable.table-bordered tbody td{
    padding: 10px;
}
.table tr:nth-child(even) {background:#D0EBF9 }
.table tr:nth-child(odd) {background: #eee!important}
</style>
<section class="datagrid-panel">
	
	<div class="content">
		<div class="panel">
                    
                        <div class="content-header no-mg-top" >
                            <a href="/adminusers/adduser" class="btn btn-primary" style="font-size: 18px; background-color:  #058ED3; float: right;"><i class="fa fa-pencil" style="font-size:18px"></i>Add New User</a>

				<i class="fa fa-newspaper-o"></i>
				<div class="content-header-title">User Menagement</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="content-box">
	<table class="table table-striped table-bordered table-hover" id="table" style="font-size: 18px;width: 100%; padding: 0px;">
                      
        <thead>
            <tr>
             
             
                <th>Email</th>
                <th>Name</th>
                <th>Role</th>
                <th style="width:150px;"></th>
            </tr>
        </thead>
       
        <tbody >
        	 <?php foreach ($adminusers as $row) { ?>
            <tr >
            	  
                
                <td>
                  <?php echo $row->email;?>
                </td>
                  <td>
                 <?php echo $row->name;?>
                </td>
                <td>
                  <?php echo $row->rolename;?>
                </td>
              
                   <td style="font-size: 16px; font-weight: 700; text-align: center; color:  #058ED3">
                       <a href="/adminusers/edituser/<?php echo $row->Id;?>">Edit</a>
                       <?php if($row->rolename != '[Admin] ') {?>
                          <a href="/adminusers/authuser/<?php echo $row->Id;?>" style=" margin-left: 15px; color: #14571B; display:none" >Privileges</a>
                    <a href="#" style=" margin-left: 15px; color: #F26F25;" onclick="delete_action('<?php echo $row->Id;?>')">Delete</a>
                       <?php }?>
                   </td>
            </tr>
           <?php } ?>
        </tbody>
    </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Form -->
<section class="form-panel"></section>

<script type="text/javascript">
	
$(document).ready(function() {

$('#table').DataTable( {
        scrollY:        '60vh',
        scrollCollapse: true,
        paging:         false,
         order: [[ 2, "asc" ]]
    } );
		
		
});


	function delete_action(e) {
		swal({   
			title: "Are You Sure？",   
			text: "",
		//	type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			cancelButtonText: "Cancel",
			confirmButtonText: "Sure",
			closeOnConfirm: true 
		}, function() {
			
			$.post("<?php echo base_url() . 'adminusers/delete'; ?>", {id : e}).done(function(data) {
				 window.location = '/adminusers';
			})
		})
	}

	
</script>