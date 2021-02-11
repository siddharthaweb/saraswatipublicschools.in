<div class="content_sec_inner">
    <?php echo $this->element('leftpanel'); ?>
    <div class="right_sec">
        <div class="categery">
            <div class="succcls"><?php echo $this->Session->flash('auth'); ?></div>
            <div  class="headingall" style="text-align:left;">Administrator Details </div>
            <div class="mainarea" id="CategoryPaging">	
                <div class="heading">
                    <ul>
                        <li style="width:225px;">First Name</li>
                        <li style="width:225px;">Last Name</li>
                        <li style="width:225px;">Email</li>
                        <li style="width:225px;">Action</li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="lightash">
                    <ul>
                        <li style="width:225px;"><?php echo $this->data['User']['first_name']; ?></li>
                        <li style="width:225px;"><?php echo $this->data['User']['last_name']; ?></li>
                        <li style="width:225px;"><?php echo $this->data['User']['email']; ?></li>
                        <li style=" width:225px;">
                            <?php
                            echo $this->Html->link(
                                        $this->Html->image("edit.png", array("alt" => "Edit","title" => "Edit")), "/admin/users/edit_details/".$this->Session->read('Auth.User.id') , array('escape' => false)
                                );
                            ?>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
    <br class="spacer"/>
</div>