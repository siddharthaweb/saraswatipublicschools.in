<?php echo $this->Html->css('validate.css'); ?>
<?php echo $this->Html->script('jquery.validate', array('inline' => false)); ?>
<script>
    $(document).ready(function(){
        $("#UserAdminSubeditForm").validate({
            rules: {
                "data[User][first_name]": {
                    required: true
                },
                "data[User][last_name]": {
                    required: true
                },
		"data[User][profile_picture]": {
                    accept: "jpeg|jpg|gif|png"
		},
                "data[User][email]": {
                    required: true,
                    email: true
                }
            },
            messages: {
                "data[User][first_name]":{
                    required: "Please enter user first name."
                },
                "data[User][last_name]": {
                    required: "Please enter user last name."
                },
                "data[User][profile_picture]": {
                    accept: "Please upload with extention jpeg,jpg,gif,png"
		},
                "data[User][email]": {
                    required: "Please enter email address.",
                    email: "Please enter valid email address"
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
            <div  class="headingall" style="text-align:left;">Edit Administrator details</div>
            <div class="mainarea">
                <div class="lightash">		
                    <div class="clear"></div>
                </div>
                <?php echo $this->Form->create('User', array('action' => 'admin_subedit')); ?>
                <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>            
                <div class="lightash">
                    <fieldset>
                        <label>First Name:</label>
                        <?php echo $this->Form->input('first_name', array('label' => false)); ?> 
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="ash">
                    <fieldset>
                        <label>Last Name:</label>
                        <?php echo $this->Form->input('last_name', array('label' => false)); ?> 
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="lightash">
                    <fieldset>
                        <label>Email:</label>
                        <?php echo $this->Form->input('email', array('label' => false)); ?> 
                    </fieldset>
                    <div class="clear"></div>
                </div> 
                <div class="ash">
                    <fieldset>
                        <label>&nbsp;</label><?php echo $this->Form->submit('Submit'); ?>&nbsp;&nbsp;
                        <?php
                        echo $this->Html->link('Cancel', '/admin/users/subindex', array('class' => 'buttonlnk'));
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