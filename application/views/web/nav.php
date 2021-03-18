<style>
	.nav-main-menu .menu li a{
		font-size: 17px;
	}
</style>
				<ul class="menu">
					<li><a class="submenu" href="<?php echo base_url() ?>">홈</a>
						
					</li>
					
						
						</li>
                    <?php foreach ($category as $row) { ?>                          
                        <li><a class="submenu" href="<?php if($row->category_id == 9) echo '/home/oldprogram'?>"><?php echo $row->category_name ?><span>&#xf0dd;</span></a>
                            <ul>
                                <?php foreach ($row->channels as $items) {?>
                                <li><a href="/home/newonechannel/<?php echo $items->c_id?>"><?php echo $items->channel_title?></a></li>                          
                                <?php }?>
                            </ul>
                        </li>
                        
                        <?php }?>
						<li><a class="submenu" href="#">날짜별 다시듣기<span>&#xf0dd;</span></a>
							<ul>
							<?php $d = array();
							for ($i = 0; $i < 20; $i++) { ?>
								<li><a href="/home/newdatechannel/<?php echo date("Y-m-d_D", strtotime("-$i days")) ?>"><?php echo date("Y-m-d (D)", strtotime("-$i days")) ?></a></li>
							<?php }?>   
							
						</ul>
							</li>
						<li><a class="submenu" href = "https://www.uscornerstone.org/offering">헌금</a></li> 
						
					
				</ul>
				