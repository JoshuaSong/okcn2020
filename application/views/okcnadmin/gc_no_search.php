
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style>
	.header-tools{display:none;}
	.container {
		max-width: 970px; }
		
		.table-label .l5 {
    margin-left: 5px;font-size: 24px; padding: 10px;
}
.table-label .r5 {
    display:none;
}
.modal-backdrop{ z-index: 1030;
	
}
.filter-row{
	display:none;
}
tfoot{
	display:none;
}
	</style>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3></h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		
		<?php echo $output; ?>

          		</div>
          	</div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    
     <script src="<?php echo base_url();?>assets/okcnadmin/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/okcnadmin/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url();?>assets/okcnadmin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url();?>assets/okcnadmin/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url();?>assets/okcnadmin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/okcnadmin/js/common-scripts.js"></script>

    <!--script for this page-->
    
  
  </body>
</html>
