<!-- Table -->
<section class="datagrid-panel">
	<div class="breadcrumb">
		<a href="">Home</a> 
		<a href="<?php echo base_url();?>menus">menus</a>
		<?php if (isset($subMenuTitle))  { ?>		
			<a href=""><?php echo $subMenuTitle; ?></a>
			<?php }?>
		
	</div>
	<div class="content">
		<div class="panel">
			<div class="content-header no-mg-top">
				<i class="fa fa-newspaper-o"></i>
				<div class="content-header-title">menus <?php if (isset($subMenuTitle))  echo 'of '.$subMenuTitle; ?></div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<div class="content-box-header">
							<div class="row">
								<div class="col-md-6">
									<button class="btn btn-primary" onclick="main_routes('create', '')"><i class="fa fa-pencil"></i> Add New Menu <?php if (isset($subMenuTitle))  echo 'to '.$subMenuTitle; ?></button>
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
		url						: "<?php echo base_url() . 'menus/data'; ?>",
		primaryField			: 'id', 
		rowNumber				: true,
		itemsPerPage			: 10,
		itemsPerPageOption 		: [5, 10, 20],
		searchInputElement 		: '#search', 
		searchFieldElement 		: '#search-option', 
		pagingElement 			: '#paging', 
		optionPagingElement 	: '#option', 
		pageInfoElement 		: '#info',
		columns					: [
		//	{field: 'parent_id', title: 'Parent', sortable: false, width: 200, align: 'center', search: false},
		// {field: 'id', title: 'ID', editable: true, sortable: false, width:200, align: 'left', search: false},
	        {field: 'title_formatted', title: 'Title', editable: true, sortable: false, width:200, align: 'left', search: false,
	         	rowStyler: function(rowData, rowIndex) {
	         		if(rowData.is_have_child > 0){
	       			return '<a href=menus/sub/'+rowData.id+'>'+rowData.title+'</a>';
	       			}else
	       			{
	       				return rowData.title;
	       			}
	       		}},
	       
	       	{field: 'icon_formatted', title: 'Icon', sortable: false, width: 200, align: 'center', search: false,
	       	rowStyler: function(rowData, rowIndex) {
	       			return '<i class="'+rowData.icon+'"></i>';
	       		}},
	       	{field: 'order', title: 'Order', sortable: false, width: 100, align: 'center', search: false},
	       	{field: 'menu', title: 'Action', sortable: false, width: 200, align: 'center', search: false, 
	       		rowStyler: function(rowData, rowIndex) {
	       			return menu(rowData, rowIndex);
	       		}
	       	}
	    ]
	});

	datagrid.run();

	function menu(rowData, rowIndex) {
		var menu = '<a href="javascript:;" onclick="main_routes(\'update\', ' + rowIndex + ')"><i class="fa fa-pencil"></i> Edit</a>       ' +
		'<a href="javascript:;" onclick="delete_action(' + rowIndex + ')"><i class="fa fa-trash-o"></i> Delete</a>'
		return menu;
	}

	function create_update_form(rowIndex) {
		$.post("<?php echo base_url() . 'menus/form'; ?>", {index : rowIndex}).done(function(data) {
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
                     
			$.post("<?php echo base_url() . 'menus/delete'; ?>", {id : row.id}).done(function(data) {
				datagrid.reload();
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