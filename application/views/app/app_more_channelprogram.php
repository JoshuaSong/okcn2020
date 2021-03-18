
<?php $i=$count; foreach($program as $row) if(isset($row)) { ?>
    <li>
      <a class="item-link item-content" programid="<?php echo $row->p_id;?>"   programcount="<?php echo $i;?>" onclick="playthisprogram(this)">
        <div class="item-media"><div class="item-text" style="width: 50px;font-size: 12px; color: #9f1f24; text-align: right; padding-right: 10px;"><?php echo $i.'회';?></div>
          <img src="/images/playbutton1.png" width="40"/>
        </div>
        <div class="item-inner">
         
            <div class="item-text" style="font-size:14px; padding-right: 15px;"><?php echo '['.$row->program_date.']'.$row->program_title;?></div>
            
          
         
        </div>
      </a>

    </li>
  <?php $i--; }?>

