<!-- Table -->
<section class="datagrid-panel">

	<div class="content">
		<div class="panel">
			<div class="content-header no-mg-top">
				<i class="fa fa-video-camera"></i>
				<div class="content-header-title">Youtube Video</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="content-box">
						<div class="content-box-header">
							<div class="row">
								<div class="col-md-6">
									<button class="btn btn-primary" onclick="main_routes('create', '')"><i class="fa fa-pencil"></i>Add New</button>
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
		url			        : "<?php echo base_url() . 'youtubevideo/data'; ?>",
		primaryField			: 'id', 
		rowNumber			: true,
                itemsPerPage			: 10,
		itemsPerPageOption 		: [5, 10, 20],
		searchInputElement 		: '#search', 
		searchFieldElement 		: '#search-option', 
		pagingElement 			: '#paging', 
		optionPagingElement 	: '#option', 
		pageInfoElement 		: '#info',
		columns					: 
                [
				
		  {field: 'video_title', title: 'Title', editable: true, sortable:  false, width: 50, align: 'left', search: true},
                
				  {field: 'video_id_formatted', title: 'Video', editable: true, sortable: false, width:40, align: 'left', search: false,rowStyler: function(rowData, rowIndex) {
				if(rowData.video_id == null)
				{
					return '';
					
				} else{
					return ' <a href="https://youtu.be/'+ rowData.video_id +'" ><img src="https://img.youtube.com/vi/' + rowData.video_id + '/mqdefault.jpg"  height="42"></a>';
				}
				}},
				 
				  {field: 'status', title: 'Status', editable: true, sortable: false, width:10, align: 'left', search: true},
			
				
		  {field: 'menu', title: 'Menu', sortable: false, width: 10, align: 'center', search: false, 
		      rowStyler: function(rowData, rowIndex) { return menu(rowData, rowIndex); }}
	        ]
        });

	datagrid.run();

	function menu(rowData, rowIndex) {
		var menu = '<a href="javascript:;" onclick="main_routes(\'update\', ' + rowIndex + ')"><i class="fa fa-pencil"></i> Edit</a> ' +
		'&nbsp; &nbsp; &nbsp; <a href="javascript:;" onclick="delete_action(' + rowIndex + ')"><i class="fa fa-trash-o"></i> Delete</a>'
		return menu;
	}

	function create_update_form(rowIndex) {
		$.post("<?php echo base_url() . 'youtubevideo/form'; ?>", {index : rowIndex}).done(function(data) {
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
			$.post("<?php echo base_url() . 'youtubevideo/delete'; ?>", {id : row.id}).done(function(data) {
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