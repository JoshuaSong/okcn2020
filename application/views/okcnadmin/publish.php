 
      <section id="main-content">
          <section class="wrapper site-min-height"><center>
          	<h3> published!</h3>
          	
          	<div class="row mt">
          		<div class="col-lg-12">
          			<table>
          			<?php foreach($publish as $item) {?>
          		<tr><td><?php echo $item['time'];?></td><td> => </td><td><?php echo $item['program'];?></td></tr>
          		<?php }?>
          		</table>
          		</div>
          	</div>
			</center>
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

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/okcnadmin/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/okcnadmin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/okcnadmin/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/okcnadmin/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url();?>assets/okcnadmin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url();?>assets/okcnadmin/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url();?>assets/okcnadmin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/okcnadmin/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box


  </script>

  </body>
</html>