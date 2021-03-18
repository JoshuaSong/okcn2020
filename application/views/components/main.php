<?php $this->load->view('components/head'); ?>
<style>
@media (max-width: 900px){
.top-nav .top-nav-box .logo-wrapper { padding-left: 5%; }
}
</style>

<div class="top-nav">
	<div class="top-nav-box">
		<div class="side-nav-mobile"><i class="fa fa-bars"></i></div>
		<div class="logo-wrapper">
			<div class="logo-box">
                        
				<img alt="pongo" src="/images/okcn_logo_w_320.png">
                       
				<a href="<?php echo base_url(); ?>" style="margin-top: 10px;">
					<div class="logo-title">OKCN - CMS</div>
				</a>
			</div>
		</div>
		<div class="top-nav-content">
			<div class="top-nav-box">
				<div class="top-notification">
				</div>
				
		
				<div class="user-top-profile">
				
					<div class="clear">
						<div class="user-name"><?php echo $active_user->name; ?></div>
					
						<ul class="user-top-menu animated bounceInUp">
                                                    <!--
							<li><a href="<?php echo base_url() . 'profile'; ?>">Profile <div class="badge badge-yellow pull-right">2</div></a></li>
							<li><a href="<?php echo base_url() . 'settings'; ?>">Settings</a></li>
							<li><a href="<?php echo base_url() . 'change_password'; ?>">Change Password</a></li>
                                                      -->  
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
	    
			</ul>
		</div>
		
		
	
	</aside>
	<div class="main">
		<?php $this->load->view($subview); ?>		
	</div>
</div>
<?php $this->load->view('components/foot'); ?>

