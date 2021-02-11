<?php echo $this->Html->css('validate.css'); ?>
<?php echo $this->Html->script('jquery.validate', array('inline' => false)); ?>
<script>
    $(document).ready(function(){
        $("#UserAdminChangepassForm").validate({
            rules: {
                "data[User][oldpass]": {
                    required: true,
                    minlength: 5
                },
                "data[User][password]":{
                    required: true,
                    minlength: 5,
                    equalTo: "#UserPasswordConfirm"
                },
                "data[User][password_confirm]":{
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                "data[User][oldpass]": {
                    required: "Please enter password",
                    minlength: "Minimum length of 5 characters"
                },
                "data[User][password]": {
                    required: "Please enter password",
                    minlength: "Minimum length of 5 characters",
                    equalTo: "Confirm Password and password are not same."
                },
                "data[User][password_confirm]":{
                    required: "Please enter password",
                    minlength: "Minimum length of 5 characters"
                }
            }
        });
    });
</script>
<div class="content_sec_inner">
    <?php echo $this->element('leftpanel'); ?>
    <div class="right_sec">
        <div class="categery">
            <div class="succcls"> <?php echo $this->Session->flash('auth'); ?> </div>
            <div  class="headingall" style="text-align:left;">Change Password</div>
            <div class="mainarea">
                <div class="lightash">		
                    <div class="clear"></div>
                </div>
                <?php echo $this->Form->create('User', array('action' => 'admin_changepass')); ?>
                <?php echo $this->Form->input('id', array('type'=>'hidden','value' => $this->Session->read('Auth.User.id'))); ?>
                <div class="lightash">
                    <fieldset>
                        <?php echo $this->Form->input('oldpass', array('label' => 'Password')); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="ash">
                    <fieldset>
                        <?php echo $this->Form->input('password', array('label' => 'New Password')); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="lightash">
                    <fieldset>
                        <label>Confirm Password</label>    
                        <?php echo $this->Form->input('password_confirm', array('type' => 'password', 'label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="ash">
                    <fieldset>
                        <label>&nbsp;</label><?php echo $this->Form->submit('Submit'); ?>&nbsp;&nbsp;
                        <?php
                        //echo $this->Form->button('Cancel', array('type'=>'button','onclick'=>'history.back();','class' => 'buttonlnk'));
                        echo $this->Html->link('Cancel', '/admin/users/display', array('class' => 'buttonlnk'));
                        ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <?php
                echo $this->Form->end();
                ?>

            </div>
        </div>
    </div>
    <br class="spacer"/>
</div>