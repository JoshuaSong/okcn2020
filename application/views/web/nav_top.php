<!-- side nav menu -->
<ul class="side-nav-menu" style="font-size:20px;">
				<li class="top-menu"><a href="<?php echo base_url() ?>">홈</a></li>
				<li class="top-menu"><a href="<?php echo base_url() ?>home/bible">다국어 성경</a></li>	
				<li class="top-menu"><a href="https://www.cornerstone.or.kr/">모퉁이돌선교회</a></li>
				<li class="top-menu"><a href="https://www.uscornerstone.org/offering">헌금</a></li>					
								
                    <?php foreach ($category as $row) { ?>                          
                        <li class="top-menu" ><a href="#"><?php echo $row->category_name ?></a>
                       
                                <?php foreach ($row->channels as $items) {?>
                                <li class="sub-menu"><a href="/home/newonechannel/<?php echo $items->c_id?>"><?php echo $items->channel_title?></a></li>                          
                                <?php }?>
                      
                        </li>
                        
						<?php }?>
						<li class="top-menu"><a href="#">날짜별 다시듣기<span>&#xf0dd;</span></a>
						
							<?php $d = array();
							for ($i = 0; $i < 20; $i++) { ?>
								<li class="sub-menu"><a href="/home/newdatechannel/<?php echo date("Y-m-d_D", strtotime("-$i days")) ?>"><?php echo date("Y-m-d (D)", strtotime("-$i days")) ?></a></li>
							<?php }?>    
							</li>
				
			</ul>