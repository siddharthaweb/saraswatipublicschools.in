<div class="content_sec_inner">
    <?php echo $this->element('leftpanel'); ?>
    <div class="right_sec">
        <div class="categery">
            <div class="succcls"><?php echo $this->Session->flash('auth'); ?></div>
            <div  class="headingall" style="text-align:left;">User Listing </div>
            <div>
                <div id="user-search">
                    <?php echo $this->Form->create('User', array('action' => 'admin_list', 'type' => 'get')); ?> 
                    <div class="input_text"><?php echo $this->Form->input('fieldValue', array('label' => false)); ?></div>
                    <div class="input_select">
                        <?php
                        $dropdown = array('User.email' => 'Email', 'User.first_name' => 'Surname', 'Group.name' => 'Group');
                        echo $this->Form->input('fieldName', array('type' => 'select', 'options' => $dropdown, 'default' => '', 'empty' => 'Select one', 'label' => false));
                        ?>
                    </div> 
                    <div class="input_submit">
                        <?php echo $this->Form->submit('Search'); ?>
                    </div>               
                    <?php echo $this->Form->end(); ?> 
                </div>
                <div id="sort-by">
                    <?php echo $this->Paginator->sort('User.update_status', 'Newly update', array('direction' => 'asc')); ?> || <?php echo $this->Paginator->sort('User.status', 'Inactive User', array('direction' => 'desc')); ?> || <?php echo $this->Paginator->sort('User.new_user', 'Newly registered', array('direction' => 'desc')); ?>              
                </div>
                <div class="clear"></div>
            </div>

            <div class="clear"></div>
            <div class="mainarea">
                <div class="heading">
                    <ul>
                        <li style="width:225px;"><?php echo $this->Paginator->sort('User.first_name', 'Name'); ?></li>
                        <li style="width:225px;"><?php echo $this->Paginator->sort('User.email', 'Email'); ?></li>
                        <li style="width:225px;"><?php echo $this->Paginator->sort('#', 'Group Name'); ?></li>
                        <li style="width:225px;"><?php echo $this->Paginator->sort('User.id', 'Action'); ?></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <?php
                if (!empty($this->data)) {
                    $i = 0;
                    foreach ($this->data as $value) {

                        if ($i % 2 == 0) {
                            $class = "lightash";
                        } else {
                            $class = "ash";
                        }
                        ?>
                        <div class="<?= $class ?> group-view">
                            <ul>
                                <li style="width:225px;"><?php echo $value['User']['first_name']; ?> &nbsp;<?php echo $value['User']['last_name']; ?></li>
                                <li style="width:225px;">
                                    <?php echo $value['User']['email']; ?>
                                    <span style="float: right; padding-right: 5px;"> 
                                        <?php
                                        echo $this->Html->link(
                                                $this->Html->image('send_email.png', array("alt" => "send email", "title" => "send email to user")), "/admin/users/sendemail/?email=" . $value['User']['email'], array('escape' => false)
                                        );
                                        ?>
                                    </span>  
                                </li>
                                <li style="width:225px;"><?php
                                if (@$this->request->query['fieldName'] != 'Group.name') {
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
                                        'conditions' => array('UserGroupRelation.user_id' => $value['User']['id']),
                                        'fields' => array('Group.name')
                                            ));
                                    $g = 1;
                                    foreach ($group_name as $key => $val):
                                        if ($g != '1') {
                                            echo ' , ';
                                        }
                                        echo $val['Group']['name'];
                                        $g++;
                                    endforeach;
                                } else {
                                    echo $value['Group']['name'];
                                }
                                        ?> </li>
                                <li style="width:250px;text-align:left;padding-left:25px;">
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image("" . $value['User']['status'] . ".png", array("alt" => "status", "title" => "Change status")), "/admin/users/changeuserstatus/" . $value['User']['id'], array('escape' => false)
                                    );
                                    ?> &nbsp; | &nbsp;
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image("delete.png", array("alt" => "Delete", "title" => "Delete")), "/admin/users/delete/" . $value['User']['id'], array('escape' => false), "Are you sure?"
                                    );
                                    ?>
                                    &nbsp; | &nbsp;
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image("edit.png", array("alt" => "Edit", "title" => "Edit")), "/admin/users/edit/" . $value['User']['id'], array('escape' => false)
                                    );
                                    ?>
                                    &nbsp; | &nbsp;
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image("user_details.png", array("alt" => "User details", "title" => "User details")), "/admin/users/details/" . $value['User']['id'], array('escape' => false)
                                    );
                                    ?>
                                    &nbsp; | &nbsp;
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image("message.png", array("alt" => "Send message", "title" => "Send message to user")), "/admin/message_details/internal_message/" . $value['User']['id'], array('escape' => false)
                                    );
                                    ?>
                                    &nbsp; | &nbsp;
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image("" . $value['User']['discussion_status'] . "_Discussion.png", array("alt" => "Edit", "title" => "Discussion status")), "/admin/users/change_discussion_status/" . $value['User']['id'], array('escape' => false)
                                    );
                                    ?>
                                    <?php
                                    if ($value['User']['new_user'] == 'Y') {
                                        echo '&nbsp; | &nbsp;' . $this->Html->link(
                                                $this->Html->image("admin_approval.png", array("alt" => "Admin Approval", "title" => "New User Registered")), "/admin/users/newuser/" . $value['User']['id'], array('escape' => false)
                                        );
                                    }
                                    ?>
                                    <?php
                                    if ($value['User']['update_status'] == 'A') {
                                        echo '&nbsp; | &nbsp;' . $this->Html->link(
                                                $this->Html->image("updated-usert.png", array("alt" => "Newly updated", "title" => "Newly updated")), "/admin/users/update_status/" . $value['User']['id'], array('escape' => false)
                                        );
                                    }
                                    ?>
                                </li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <?php
                        $i++;
                    }
                } else {
                    ?>
                    <div>
                        <ul>
                            <li style="width:900px; text-align:center; height: 20px;"> No Data Found</li>
                        </ul>
                    </div>
                    <?php } ?>
                <div>
<?php echo $this->element('paging'); ?> 
                </div>
            </div>
        </div>
    </div>
    <br class="spacer"/>
</div>