<?php echo $this->Html->css('validate.css'); ?>
<?php echo $this->Html->script('jquery.validate', array('inline' => false)); ?>
<script>
    $(document).ready(function(){
        $("#UserAdminLoginForm").validate({
            rules: {
                "data[User][email]": {
                    required: true,
                    email: true
                },
                "data[User][password]":{
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                "data[User][email]":{
                    required: "Please enter email address.",
                    email: "Please enter valid email address"
                },
                "data[User][password]": {
                    required: "Please enter password",
                    minlength: "Minimum length of 5 characters"
                }
            }
        });
    });
</script>
<style>
    form{width: 550px;}
    label.error{padding-left: 25.5em;}
</style>
<div class="content_sec">
    <div class="login_sec" style="height:300px;">
        <h2>Welcome to Administrator</h2>
        <div class="error-message" style="padding-left:90px;"><?php echo $this->Session->flash('auth'); ?></div>
        <div class="form_login">
            <?php echo $this->Form->create('User', array('action' => 'admin_login')); ?>
            <label>Email:</label>
            <?php echo $this->Form->input('email', array('label' => false)); ?>
            <br style="clear:both;"/>
            <label>Password:</label>
            <?php echo $this->Form->input('password', array('label' => false)); ?>
            <br class="spacer"/>
            <label class="forget_pass">
                <?php
                echo $this->Html->link('Forgot Password', array(
                    'controller' => 'users',
                    'action' => 'forgotpassword',
                    'admin' => true
                ));
                ?> 
            </label><br class="spacer"/>
            <label class="submit_btn"> <?php echo $this->Form->submit('Login'); ?>
                <?php echo $this->Html->link('Cancel', '/admin/', array('class' => 'buttonlnk')); ?></label>
            <br class="spacer"/>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>			