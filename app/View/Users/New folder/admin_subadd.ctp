<?php echo $this->Html->css('validate.css'); ?>
<?php echo $this->Html->script('jquery.validate', array('inline' => false)); ?>
<script>
    $(document).ready(function(){
        $("#UserAdminSubaddForm").validate({
            rules: {
                "data[User][first_name]": {
                    required: true
                },
                "data[User][last_name]": {
                    required: true
                },
                "data[User][email]": {
                    required: true,
                    email: true,
                    equalTo: "#UserConfirmEmail"
                },
                "data[User][confirm_email]": {
                    required: true,
                    email: true
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
                "data[User][first_name]":{
                    required: "Please enter user surname"
                },
                "data[User][last_name]": {
                    required: "Please enter user given name"
                },
                "data[User][email]": {
                    required: "Please enter email address",
                    email: "Please enter valid email address"
                },
                "data[User][confirm_email]": {
                    required: "Please enter confirm email",
                    email: "Please enter valid confirm email"
                },
                "data[User][password]": {
                    required: "Please enter password",
                    minlength: "Minimum length of 5 characters",
                    equalTo: "Confirm Password and password are not same"
                },
                "data[User][password_confirm]":{
                    required: "Please enter confirm password",
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
            <div  class="headingall" style="text-align:left;">Add Sub Administrator</div>
            <div class="mainarea">
                <div class="lightash">		
                    <div class="clear"></div>
                </div>
                <?php echo $this->Form->create('User', array('action' => 'admin_subadd')); ?>                
                <div class="lightash">
                    <fieldset>
                        <label>Surname : </label>
                        <?php echo $this->Form->input('first_name', array('label' => false)); ?> 
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="ash">
                    <fieldset>
                        <label>Given Name : </label>
                        <?php echo $this->Form->input('last_name', array('label' => false)); ?> 
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="ash">
                    <fieldset>
                        <label>Email : </label>
                        <?php echo $this->Form->input('email', array('label' => false)); ?> 
                    </fieldset>
                    <div class="clear"></div>
                </div> 
                <div class="lightash">
                    <fieldset>
                        <label>Confirm Email : </label>
                        <?php echo $this->Form->input('confirm_email', array('label' => false)); ?> 
                    </fieldset>
                    <div class="clear"></div>
                </div> 
                <div class="ash">
                    <fieldset>
                        <label>Password : </label>
                        <?php echo $this->Form->input('password', array('label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="lightash">
                    <fieldset>
                        <label>Confirm Password : </label>    
                        <?php echo $this->Form->input('password_confirm', array('type' => 'password', 'label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="ash">
                    <fieldset>
                        <label>&nbsp;</label><?php echo $this->Form->submit('Submit'); ?>&nbsp;&nbsp;
                        <?php
                        echo $this->Html->link('Cancel', '/admin/users/subindex/', array('class' => 'buttonlnk'));
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
