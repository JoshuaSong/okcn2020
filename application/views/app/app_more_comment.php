
     
<table style="width: 100%; padding: 10px;">
              <?php foreach($comments as $item) {?>
                <?php if(isset($member) && $member->id == $item->user_id) {?>
                  <tr>
                <td class="avatartd"></td>
                <td>
                  <div class="message-name"><?php echo $item->cm_id;?></div>
                  <div style="text-align: right; margin-right: 20px;"><a><?php echo $item->user_name;?></a></div>
                  <div class="messagebodyme"><?php echo $item->contents;?></div>
                   <div class="messagetime"><?php echo $item->create_time;?></div>
                </td>
              </tr>
              
              <?php } else {?>
                <tr>
                <td class="avatartd"><img class="avatarimg"  src="/images/thumb_150/<?php echo $item->image;?>"></td>
                <td>
                  <div class="message-name"><?php echo $item->cm_id;?></div>
                  <div style="margin-left: 5px; "><a ><?php echo $item->user_name;?></a></div>
                  <div class="messagebody <?php if(isset($member) && $item->user_id == $member->id) echo 'tome'?>"><?php echo $item->contents;?></div>
                   <div class="messagetime"><?php echo $item->create_time;?></div>
                </td>
              </tr>

              <?php }?>
              <?php }?>

            </table>

