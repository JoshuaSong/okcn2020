<!-- Table -->
<section class="datagrid-panel">
	<div class="breadcrumb">
		<a href="">Home</a> 
		<a href=""><?php echo $title;?></a>
	</div>
	<div class="content">
		<div class="panel">
			<div class="content-header no-mg-top">
				<i class="fa fa-newspaper-o"></i>
                                <div class="content-header-title" style="width:100%">
                                  
                                    
                                </div>
                                <div style=" float: left; margin-left: 200px;"></div>
			</div>
			<div class="row">
	
				<div class="col-md-12">
					<div class="content-box">
						<div class="content-box-header">
							<div class="row">
								<div class="col-md-6">
                                                                    
									<button class="btn btn-primary" onclick="main_routes('create', '')"><i class="fa fa-pencil"></i> Add New</button>
									<span id="category_span" style="margin-left: 20px; font-size: 18px; color:#0275d8;"></span>
								</div>
                                                         
								<div class="col-md-6 form-inline justify-content-end">
									<select class="form-control mb-1 mr-sm-1 mb-sm-0" id="search-option"></select>
									<input class="form-control" id="search" placeholder="Search" type="text">
								</div>
                                                            
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-striped table-bordered" id="datagrid"></table>
						</div>
						<div class="content-box-footer">
							<div class="row">
								<div class="col-md-3 form-inline">
									<select class="form-control" id="option"></select>
								</div>
								<div class="col-md-3 form-inline" id="info"></div>
								<div class="col-md-6">
									<ul class="pagination pull-right" id="paging"></ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Form -->
<section class="form-panel"></section>

<script type="text/javascript">

var datagrid = $("#datagrid").datagrid({
		url						: "<?php echo base_url() . 'sliderapp/data'; ?>",
		primaryField			: 'id', 
		rowNumber			: true,
               itemsPerPage			: 20,
		itemsPerPageOption 		: [5, 10, 20],
		searchInputElement 		: '#search', 
		searchFieldElement 		: '#search-option', 
		pagingElement 			: '#paging', 
		optionPagingElement 	: '#option', 
		pageInfoElement 		: '#info',
		columns					: [
            	{field: 'banners_image_formatted', title: 'Image', sortable: false, width: 50, align: 'center', search: false,
	       	rowStyler: function(rowData, rowIndex) {
				return '<img src="/assets/uploads/' + rowData.banners_image + '"  height="42">';
                  
	       		
	       		
	       		}},
	        {field: 'banners_name', title: 'Title', editable: true, sortable: true, width:100, align: 'left', search: true},
          
		
			  {field: 'order', title: 'order', editable: true, sortable: true, width:70, align: 'left', search: false},
			
	        {field: 'menu', title: 'Menu', sortable: false, width: 100, align: 'center', search: false, 
		      rowStyler: function(rowData, rowIndex) { return menu(rowData, rowIndex); }}
	    ]
	});

	datagrid.run();
	$(document).ready(function() {
	

		
		
	});
	

	function menu(rowData, rowIndex) {
		var menu = '<a href="javascript:;" onclick="main_routes(\'update\', ' + rowIndex + ')"><i class="fa fa-pencil"></i> Edit</a> ' +
		'&nbsp; &nbsp; &nbsp;<a href="javascript:;" onclick="delete_action(' + rowIndex + ')"><i class="fa fa-trash-o"></i> Delete</a>'
		return menu;
	}

	function create_update_form(rowIndex) {
		$.post("<?php echo base_url() . 'sliderapp/form/'; ?>", {index : rowIndex}).done(function(data) {
			$('.form-panel').html(data);
		});
	}

	function delete_action(rowIndex) {
		swal({   
			title: "Are You Sure？",   
			text: "",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			cancelButtonText: "Cancel",
			confirmButtonText: "Sure",
			closeOnConfirm: true 
		}, function() {
			var row = datagrid.getRowData(rowIndex);
			$.post("<?php echo base_url() . 'sliderapp/delete'; ?>", {id : row.id}).done(function(data) {
			
				location.reload();
			});
		});
	}

	function main_routes(action, rowIndex) {
		$('.datagrid-panel').fadeOut();
		$('.loading-panel').fadeIn();

		if (action == 'create') {
			create_update_form(rowIndex);
		} else if (action == 'update') {
			create_update_form(rowIndex);
		}
	}
        
       

</script>