	
<div class="inner-cont">
    <div class="left-sec">
        <div class="inner-sec">
            <h2>&nbsp;</h2>
            <div class="user-account">

                <div class="total-cont">		
                    <h2>&nbsp;<span><?php echo $this->data['User']['first_name'];?> <?php echo $this->data['User']['last_name'];?></span></h2>	   
                    <br class="clr"/>
                    <div class="acc-photo">
                        
                        <?php if ($this->data['User']['profile_image'] == '') { ?>

                            <img src="<?php echo $this->webroot; ?>img/account-photo.jpg" width="144" height="144" />

                        <?php } else { ?>

                            <?php echo $this->Html->image(PRE_IMGPATH . 'timthumb.php?src=' . IMGPATH . 'profile_image/' . $this->data['User']['profile_image'] . '&h=144&w=144', array("alt" => 'user', 'url' => '#')); ?>

                        <?php } ?>
                    </div>
                    <div class="acc-right-cont">
                        <p><span>Name :</span> <strong><?php echo $this->data['User']['first_name']; ?> <?php echo $this->data['User']['last_name'] ?> </strong></p>
                        <p><span>Qualification:</span> <strong><?php echo $this->data['User']['qualification']; ?></strong></p>
                        <p><span>Position:</span> <strong><?php echo $this->data['User']['position']; ?></strong></p>
                        <p><span>Workplace:</span> <strong><?php echo $this->data['User']['workplace']; ?></strong></p>
                        <p><span>City:</span> <strong><?php echo $this->Details->CitynameById($this->data['User']['city_id']); ?></strong></p>
                        <p><span>Phone No:</span> <strong> <?php echo $this->data['User']['telephone1']; ?></strong></p>
                        <p><span>Mobile No:</span> <strong> <?php echo $this->data['User']['telephone2']; ?></strong></p>
                        <p><span>Email Address:</span> <strong> <?php echo $this->data['User']['email']; ?></strong></p>
                        <?php if ($this->data['User']['user_desc'] != '') { ?>
                            <p><span>About Me:</span> 
                                <strong>
                                    <span style="text-align: justify;margin: -36px 5px 0 0; display:block; clear:both; padding: 14px 0 0px 64px;">
                                        <?php echo $this->data['User']['user_desc']; ?>
                                    </span>    
                                </strong>
                            </p>
                        <?php } ?>            
                                    </div>
                                    <br class="clr" />
                                    </div>
                                    </div>



                                    <div class="clr"></div>
                                    </div>
                                    </div>

                                    <?php echo $this->element('tagcloud'); ?>

                                    <div class="clr"></div>
                                    </div>