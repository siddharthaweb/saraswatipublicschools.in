<?php echo $this->Html->css('uservalidate.css'); ?>
<?php echo $this->Html->script('jquery.validate', array('inline' => false)); ?>
<script>
    $(document).ready(function(){
        $("#UserChangePasswordForm").validate({
            rules: {
                "data[User][oldpass]": {
                    required: true,
                    minlength: 5
                },
                "data[User][password]":{
                    required: true,
                    minlength: 5
                },
                "data[User][password_confirm]":{
                    required: true,
                    minlength: 5,
                    equalTo: "#UserPassword"
                }
            },
            messages: {
                "data[User][oldpass]": {
                    required: "Please enter password",
                    minlength: "Minimum length of 5 characters"
                },
                "data[User][password]": {
                    required: "Please enter password",
                    minlength: "Minimum length of 5 characters"
                },
                "data[User][password_confirm]":{
                    required: "Please re-enter your email address",
                    minlength: "Minimum length of 5 characters",
                    equalTo: "Password and Confirm password are not same , please try again"
                }
            }
        });
    });
</script>
<style>
    label.error {
        padding-left: 9.0em !important;
        margin-top: -3px !important;
    }
    .error-message {
        margin-left: 105px;
    }
    p input{width:250px  !important;}
    .total-cont .acc-right-cont p span.length {
        width: 105px;
    }
    .acc-right-cont{float: right !important;}
</style>
<div class="inner-cont">
    <div class="left-sec">
        <div class="inner-sec">
            <h2>User Account</h2>
            <div class="user-account">
                <?php echo $this->element('navigation'); ?>
                <div class="total-cont">		
                    <h2 class="left"> <span> <?php echo $this->data['User']['first_name']; ?> <?php echo $this->data['User']['last_name'] ?></span></h2>
                    <br class="clr"/>
                    <div class="acc-photo">
                        <?php if ($this->data['User']['profile_image'] == '') { ?>
                            <img src="<?php echo $this->webroot; ?>img/account-photo.jpg" width="144" height="144" />
                        <?php } else { ?>
                            <?php echo $this->Html->image(PRE_IMGPATH . 'timthumb.php?src=' . IMGPATH . 'profile_image/' . $this->data['User']['profile_image'] . '&h=156&w=153', array("alt" => 'user', 'url' => '#')); ?>
                        <?php } ?>
                        <?php
                        echo $this->Html->link(
                                'Edit', array('controller' => 'users', 'action' => 'update_profile', 'full_base' => true)
                        );
                        ?></div>
                    <div class="error-message" style="padding-left:150px;margin-top: -30px;">
                        <?php echo $this->Session->flash('auth'); ?>
                    </div>                    
                    <div class="acc-right-cont">
                        <?php echo $this->Form->create('User', array('action' => 'change_password')); ?>
                        <?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id'))); ?>
                        <p><span class="length">Password :</span> <strong><?php echo $this->Form->input('oldpass', array('div' => false, 'label' => false, 'type' => 'password')); ?></strong></p>
                        <p><span class="length">New Password:</span> <strong><?php echo $this->Form->input('password', array('div' => false, 'label' => false, 'type' => 'password')); ?></strong></p>
                        <p><span class="length">Confirm Password:</span> <strong> <?php echo $this->Form->input('password_confirm', array('div' => false, 'type' => 'password', 'label' => false)); ?></strong></p>

                        <p><span>&nbsp;</span><strong class="left" style="padding-left:100px;"><?php echo $this->Form->submit('Submit'); ?></strong></p>
                        <?php echo $this->Form->end(); ?>
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