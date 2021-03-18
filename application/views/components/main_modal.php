<?php $this->load->view('components/head'); ?>
<style>
	.dataTables_length{display: none;}
	thead {display:none;}
	#allmembers td { font-size: 18px; padding: 3px 10px; text-align: center}
	.dataTables_wrapper .row {margin: 0 30px; }
	.dataTables_filter .form-control {height: 20px; width: 60%}
</style>
<div class="modal fade bd-example-modal-lg" id="membersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #eee">
        <h2 class="modal-title" id="ModalLabel" style="font-size: 20px;"></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div id="loading">
     <br/><br/><br/><br/><br/><br/><br/>
       	<center><img src="/images/loader.gif" style="width: 100px;" /></center>
       	<br/><br/><br/><br/><br/><br/><br/>
       </div>
       	<center id="member-selecter" style="width: 100%; display: none" >
       <label style="font-size: 18px; color: #0F92F6"> Selected Members</label>
  <select id="multiple_select" class="form-control select2" multiple>
								
							</select>
							<br/><br/>
						<button id="clear_button" class="btn mgbottom-5  btn-sm-width btn-default btn-rounded" onclick="clearselected()">Clear</button>
						<button  class="btn mgbottom-5  btn-sm-width btn-primary btn-rounded" onclick="addMemberFellowship()">Submit Add Member</button>
						<br/><br/>
       <table id="allmembers" class="display" style="width:80%">
       	
        
    </table>
    </center>
      </div>
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addMemberFellowship()">Add Members to Fellowship</button>
      </div>
      -->
    </div>
  </div>
</div>

<div class="top-nav">
	<div class="top-nav-box">
		<div class="side-nav-mobile"><i class="fa fa-bars"></i></div>
		<div class="logo-wrapper">
			<div class="logo-box">
				<img alt="pongo" src="<?php echo base_url() . 'assets/images/bc_logo2.png'; ?>">
				<a href="<?php echo base_url(); ?>">
					<div class="logo-title">BC Admin</div>
				</a>
			</div>
		</div>
		<div class="top-nav-content">
			<div class="top-nav-box">
				<div class="top-notification">
				</div>
				
		
				<div class="user-top-profile">
					<div class="user-image">
						<div class="user-on"></div>
                                                <img alt="pongo" src="/images/thumb_150/<?php echo $active_user->profile_image; ?>">
					</div>
					<div class="clear">
						<div class="user-name"><?php echo $active_user->name; ?></div>
						<div class="user-group"><?php echo $active_user_group->group_name; ?></div>
						<ul class="user-top-menu animated bounceInUp">
							<li><a href="<?php echo base_url() . 'profile'; ?>">Profile <div class="badge badge-yellow pull-right">2</div></a></li>
							<li><a href="<?php echo base_url() . 'settings'; ?>">Settings</a></li>
							<li><a href="<?php echo base_url() . 'change_password'; ?>">Change Password</a></li>
							<li><a href="<?php echo base_url() . 'auth/logout'; ?>">Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-nav-mobile"><i class="fa fa-cog"></i></div>
	</div>
</div>


<!--*************************-->



<div class="wrapper <?php echo $menu_style != 'default' ? $menu_style : ''; ?>">
	<aside class="side-nav">
		
	
	
		<div class="main-menu-title">Menu</div>
		<div class="main-menu">
			<ul>
				<li class="<?php echo $active_menu == 0 ? 'active' : ''; ?>">
					<a href="<?php echo base_url().'dashboard'; ?>">
						<i class="fa fa-bars"></i> 
						<span>Dashboard</span>
					</a>
				</li>
				<?php foreach ($list_menu as $key => $menu) { ?>
	                <?php if ($menu->order < 10) { ?>
	                    <!-- Print parent menu -->
	                    <?php if ($menu->parent_id == 0 && $menu->is_have_child != 0) { ?>
				            <li class="<?php echo $active_menu == $menu->id && $menu_style != 'compact-nav' ? 'active' : ''; ?>">
					            <a href="">
						            <i class="<?php echo $menu->icon; ?>"></i> 
						            <span><?php echo $menu->title; ?></span>
						            
					            </a>
					            <ul>
						            <!-- Print submenu -->
	            		            <?php foreach ($list_menu as $submenu) { ?>
	                		            <?php if ($submenu->parent_id == $menu->id) { ?>
	                    		            <li><a href="<?php echo base_url() . $submenu->link; ?>"><?php echo $submenu->title; ?></a></li>
	                		            <?php } ?>
	            		            <?php } ?>
					            </ul>
				            </li>
	                    <?php } elseif ($menu->parent_id == 0 && $menu->is_have_child == 0) { ?>
	                        <li class="<?php echo $active_menu == $menu->id ? 'active' : ''; ?>">
					            <a href="<?php echo base_url() . $menu->link; ?>">
						            <i class="<?php echo $menu->icon; ?>"></i> 
						            <span><?php echo $menu->title; ?></span>
					            </a>
				            </li>
                        <?php } ?>
                    <?php } ?>
	            <?php } ?>
			</ul>
		</div>
		
		<div class="main-menu-title">HTML Template</div>
		<div class="main-menu">
			<ul>
				<?php foreach ($list_menu as $key => $menu) { ?>
	                <?php if ($menu->order > 9) { ?>
	                   
	                    <?php if ($menu->parent_id == 0 && $menu->is_have_child != 0) { ?>
				            <li class="<?php echo $active_menu == $menu->id && $menu_style != 'compact-nav' ? 'active' : ''; ?>">
					            <a href="">
						            <i class="<?php echo $menu->icon; ?>"></i> 
						           <span><?php echo $menu->title; ?></span>
					            </a>
					            <ul>
						           
	            		            <?php foreach ($list_menu as $submenu) { ?>
	                		            <?php if ($submenu->parent_id == $menu->id) { ?>
	                    		            <li><a href="<?php echo base_url() . $submenu->link; ?>"><?php echo $submenu->title; ?></a></li>
	                		            <?php } ?>
	            		            <?php } ?>
					            </ul>
				            </li>
	                    <?php } elseif ($menu->parent_id == 0 && $menu->is_have_child == 0) { ?>
	                        <li class="<?php echo $active_menu == $menu->id ? 'active' : ''; ?>">
					            <a href="<?php echo base_url($menu->link); ?>">
						            <i class="<?php echo $menu->icon; ?>"></i> 
						            <span><?php echo $menu->title; ?></span>
					            </a>
				            </li>
                        <?php } ?>
                    <?php } ?>
	            <?php } ?>
			</ul>
		</div>
	
	</aside>
	
	<div class="main">
		<?php $this->load->view($subview); ?>		
	</div>
</div>
<?php $this->load->view('components/foot'); ?>

