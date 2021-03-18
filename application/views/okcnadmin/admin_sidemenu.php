   <?php $fm=$this->router->fetch_method();?>
   <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href=""><img src="<?php echo base_url();?>assets/okcnadmin/img/ui-okcn.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Administrator</h5>
              	  	
                  <li class="mt">
                      <a href="">
                          <i class="fa fa-dashboard"></i>
                          <span>Admin Home</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;"  <?php if($fm=='upload'||$fm=='programs'||$fm=='timetable_today'||$fm=='timetable_twomorrow'||$fm=='publish12') echo "class='active'";?> >
                          <i class="fa fa-desktop"></i>
                          <span>프로그램</span>
                      </a>
                      <ul class="sub">
                          <li <?php if($fm=='upload') echo "class='active'";?> ><a  href="<?php echo base_url();?>okcnadmin/upload">프로그램 올리기</a></li>
                          <li <?php if($fm=='timetable_today') echo "class='active'";?> ><a  href="<?php echo base_url();?>okcnadmin/timetable_today">오늘 프로그램</a></li>
                           <li <?php if($fm=='timetable_twomorrow') echo "class='active'";?> ><a  href="<?php echo base_url();?>okcnadmin/timetable_twomorrow">내일 프로그램</a></li>
                          <li <?php if($fm=='programs') echo "class='active'";?> ><a  href="<?php echo base_url();?>okcnadmin/programs">전체 프로그램 리스트</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a  href="javascript:;" <?php if($fm=='channel'||$fm=='category') echo "class='active'";?> >
                          <i class="fa fa-cogs"></i>
                          <span>채널</span>
                      </a>
                      <ul class="sub">
                      	<li <?php if($fm=='channel'&&$this->uri->segment(3)=='add') echo "class='active'";?> ><a   href="<?php echo base_url();?>okcnadmin/channel/add">채널 추가하기</a></li>
                          <li <?php if($fm=='channel'&&$this->uri->segment(3)!='add') echo "class='active'";?>><a   href="<?php echo base_url();?>okcnadmin/channel">채널 리스트</a></li>
                           <li <?php if($fm=='category'&&$this->uri->segment(3)=='add') echo "class='active'";?>><a   href="<?php echo base_url();?>okcnadmin/category/add">카테고리 추가하기</a></li>
                          <li <?php if($fm=='category'&&$this->uri->segment(3)!='add') echo "class='active'";?>><a   href="<?php echo base_url();?>okcnadmin/category">카테고리 리스트</a></li>
                        
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a  href="javascript:;" <?php if($fm=='timetable') echo "class='active'";?> >
                          <i class="fa fa-book"></i>
                          <span>편성표</span>
                      </a>
                      <ul class="sub">
                         	<li><a  href="<?php echo base_url();?>okcnadmin/timetable/add">편성표 추가하기</a></li>
                          <li><a  href="<?php echo base_url();?>okcnadmin/timetable">편성표 리스트</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" <?php if($fm=='banner') echo "class='active'";?>>
                          <i class="fa fa-tasks"></i>
                          <span>배너</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url();?>okcnadmin/banner/add">배너 추가하기</a></li>
                          <li><a  href="<?php echo base_url();?>okcnadmin/banner">배너 리스트</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" <?php if($fm=='webbanner') echo "class='active'";?>>
                          <i class="fa fa-tasks"></i>
                          <span>Web배너</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url();?>okcnadmin/webbanner/add">Web배너 추가하기</a></li>
                          <li><a  href="<?php echo base_url();?>okcnadmin/webbanner">Web배너 리스트</a></li>
                      </ul>
                  </li>
                   <li class="sub-menu">
                      <a href="javascript:;" <?php if($fm=='videos') echo "class='active'";?>>
                          <i class="fa fa-video-camera"></i>
                          <span>영상 LIVE</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url();?>okcnadmin/videos/add">영상 추가하기</a></li>
                          <li><a  href="<?php echo base_url();?>okcnadmin/videos">영상 리스트</a></li>
                      </ul>
                  </li>
                   <li class="sub-menu">
                      <a href="<?php echo base_url();?>okcnadmin/Comment">
                          <i class="fa fa-comment"></i>
                          <span>사연 comments</span>
                      </a>
                  </li>
                    <li class="sub-menu">
                      <a href="<?php echo base_url();?>okcnadmin/notifications">
                          <i class="fa fa-bell"></i>
                          <span>Notifications</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>

              </ul>