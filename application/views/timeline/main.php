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
   padding: 10px 20px;
}
.table.dataTable thead .sorting:before, table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:before, table.dataTable thead .sorting_desc_disabled:after {
    bottom: 10px;
}
.table.dataTable.table-bordered tbody td{
    padding: 5px 10px;
}
</style>
<!-- Table -->
<section class="datagrid-panel">
	<div class="breadcrumb">
            
	</div>
	<div class="content">
		<div class="panel">
			
			<div class="row">
	
				<div class="col-md-12">
                                     <a href="/timeline/addtimeline/<?php echo $week;?>" class="btn btn-primary" style="font-size: 12px; background-color:  #058ED3; float: right;"><i class="fa fa-pencil"></i>  추가</a>
<center>
                <p style="font-size: 24px; color: #005cbf; font-weight: 500"> <?php echo $date;?>Timeline 편성표</p>
         
    <label class="radio-inline">
        <input type="radio" name="optradio" value="0">&nbsp;주일
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="1">&nbsp;월요일
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2">&nbsp;화요일
    </label>
   <label class="radio-inline">
      <input type="radio" name="optradio" value="3">&nbsp;수요일
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="4">&nbsp;목요일
    </label>
  <label class="radio-inline">
      <input type="radio" name="optradio" value="5">&nbsp;금요일
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="6">&nbsp;토요일
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="7">&nbsp;다음 주일
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="8  ">&nbsp;다음 월요일
    </label>
  
            </center>
           
	<div class="content">
      	<table class="table table-striped table-bordered table-hover" id="timelinetable" style="font-size: 18px;width: 100%; padding: 0px;">
                      
        <thead>
            <tr>
                
            <th>시간</th>
            <th>이미지</th>
               
                <th>채널</th>
                <th>프로그램</th>
               
                <th></th>
          
            </tr>
        </thead>
       
        <tbody >
        	 <?php if(isset($timeline)) foreach ($timeline as $row) { ?>
            <tr >
            	  
                <td  >
                <?php echo $row->start_time;?></td>
                </td>
                <td>
                <?php if($row->channel_poster != null) {?>
                  <img src="<?php echo $row->channel_poster?>" style="width:70px">

                <?php }?>
                </td>
                
                 
                 <td><a href="/cchannels/index/<?php echo $row->cid;?>"><?php echo $row->channel_title;?></a>
                  </td>
                   
                   
              <td>
                <?php if($row->file == 'none') {?>
                  <a href="/channelprogram/addprogram/<?php echo $row->cid.'/'.$row->actor_id.'/'.$date;?>"><span style="font-size: 18px; color: deeppink;">Add New Program</span></a>

                  <?php } else {?>
              <audio src="<?php echo $row->file->program_url;?>" name="asdf" class="" controls="">Your browser does not support audio tag.</audio><br/>
              <a href="/Channelprogram/program/<?php echo $row->cid;?>/10"><span style="font-size: 12px;"><?php echo '('.$row->file->program_date.')'.$row->file->program_title;?></span></a>
                <?php } ?>
              </td>
              
                   <td style="font-size: 16px; font-weight: 700; text-align: center; color:  #058ED3"><a href="/timeline/edittimeline/<?php echo $row->Id.'/'.$week;?>">편집</a>
                    <a href="#" style=" margin-left: 10px; color: #F26F25;" onclick="delete_action('<?php echo $row->Id;?>')">삭제</a>
                  
                  
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
$('input[name="optradio"]:eq(<?php echo $week;?>)').attr('checked', 'checked');	
$('input:radio[name="optradio"]').change(function(){ 
    var value = $(this).val();
      window.location = '/timeline/index/'+value;
  
    })


$('#timelinetable').DataTable( {
        scrollY:        '60vh',
        scrollCollapse: true,
        paging:         false,
         order: [[ 0, "asc" ]]
    } );
		
		
});
	

	

	function create_update_form(rowIndex) {
		$.post("<?php echo base_url() . 'cchannels/form'; ?>", {index : rowIndex}).done(function(data) {
			$('.form-panel').html(data);
		});
	}

	function delete_action(e) {
		swal({   
			title: "삭제하시겠습니까？",   
			text: "삭제하시면 복구할수 없습니다！",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			cancelButtonText: "취소",
			confirmButtonText: "확정",
			closeOnConfirm: true 
		}, function() {
			//alert(e);
			$.post("<?php echo base_url() . 'timeline/delete'; ?>", {tid : e}).done(function(data) {
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
        
        function selectcategory(e)
        {
         //   alert( e.value );
            window.location = '/cchannels/index/'+e.value+'/0';
        }
         function selecttheme(e)
        {
         //   alert( e.value );
            window.location = '/cchannels/index/0/'+e.value;
        }

</script>