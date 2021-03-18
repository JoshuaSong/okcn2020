  <section id="main-content">
          <section class="wrapper site-min-height">
          	<center>
          	<br/><br/><br/><br/>
          	<h3>Push Notifications</h3>
          	<br/><br/>
          	</center>
          	<div class="row mt">
          		<div class="col-lg-12">
          		<div class="content">
				<div class="box" >
					<p></p>
		<form method="post" action="/okcnadmin/postpush" enctype="multipart/form-data">
                    <div class="form-group">
    <label for="exampleFormControlSelect1">TimeZone</label>
    <select class="form-control" name="timezone">
    <?php foreach($timezones as $item) {?>
      <option value ="<?php echo $item->timezone?>"><?php echo $item->timezone.'('.$item->total.')';?></option>
    <?php }?>
    </select>
  </div>
                     <div class="form-group">
    <label for="exampleInputEmail1">Notification Title</label>
    <input type="text" class="form-control"  name="title"  placeholder="Enter Title">
   
  </div>
                     <div class="form-group">
    <label for="exampleInputEmail1">Notification Message</label>
    <textarea type="text" class="form-control" name="message" placeholder="Enter Message"></textarea>
   
  </div>
                <br/><br/><br/>    
                <button type="submit" class="btn btn-danger btn-lg btn-block">Push Notification</button>
       
        
        
    </form>
    				</div>

				

			</div>
		
          		</div>
          	</div>
          
          
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2019 - OKCN Radio
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/okcnadmin/js/jquery.js"></script>
    <script src="../assets/okcnadmin/js/bootstrap.min.js"></script>
    <script src="../assets/okcnadmin/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../assets/okcnadmin/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/okcnadmin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/okcnadmin/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/okcnadmin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../assets/okcnadmin/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box


  </script>

  </body>
</html>
