<div class="inner-cont">
    <div class="left-sec">
        <div class="inner-sec">
            <h2>User Account</h2>
            <div class="user-account">
               <?php echo $this->element('navigation');?>
                <div class="total-cont">		
                    <h2><span><?php echo $this->data['User']['first_name'];?> <?php echo $this->data['User']['last_name']?></span></h2>	
                     
                    <br class="clr"	 />
                    <div class="acc-photo">
                        
                        <?php if($this->data['User']['profile_image'] ==''){?>
                        
                        <img src="<?php echo $this->webroot;?>img/account-photo.jpg" width="144" height="144" />
                        
                        <?php }else{ ?>
                        
                       <?php echo $this->Html->image(PRE_IMGPATH.'timthumb.php?src='.IMGPATH.'profile_image/'.$this->data['User']['profile_image'].'&h=156&w=153', array("alt" => 'user','url' => '#'));?>
                        
                        <?php } ?>
                        <?php
                        echo $this->Html->link(
                                'Edit', array('controller' => 'users', 'action' => 'update_profile', 'full_base' => true)
                        );
                        ?>
                        </div>
                    <div class="acc-right-cont">
                        <p><span>Name :</span> <strong><?php echo $this->data['User']['first_name'];?> <?php echo $this->data['User']['last_name']?></strong></p>
<!--                        <p><span>Qualification:</span> <strong><?php echo $this->data['User']['qualification'];?></strong></p>
                        <p><span>Position:</span> <strong><?php echo $this->data['User']['position'];?></strong></p>
                        <p><span>Workplace:</span> <strong><?php echo $this->data['User']['workplace'];?></strong></p>-->
                        <p><span>Category :</span> <strong>
                                <?php 
                                $group_name = ClassRegistry::init("UserGroupRelation")->find('all', array(
                                    'joins' => array(
                                        array(
                                            'table' => 'users',
                                            'alias' => 'User',
                                            'type' => 'inner',
                                            'conditions' => array('User.id = UserGroupRelation.user_id')
                                        ),
                                        array(
                                            'table' => 'groups',
                                            'alias' => 'Group',
                                            'type' => 'inner',
                                            'conditions' => array(
                                                'Group.id = UserGroupRelation.group_id'
                                            )
                                        )
                                    ),
                                    'conditions' => array('UserGroupRelation.user_id' => $this->data['User']['id']),
                                    'fields' => array('Group.name')
                                        ));
                                $g = 1;
                                foreach ($group_name as $key => $val):
                                    if($g != '1'){ echo ' , '; }
                                    echo $val['Group']['name'];
                                    $g++;
                                endforeach;
                        ?>
                            </strong></p>      
                        <p><span>District:</span> <strong><?php $district_name = ClassRegistry::init("District")->find('first',array('conditions'=>array('id'=>$this->data['User']['district_id']),'field'=>array('name')));
                        echo $district_name['District']['name'];
                        ?></strong></p>
                        <p><span>City:</span> <strong><?php echo $this->Details->CitynameById($this->data['User']['city_id']);?></strong></p>       
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