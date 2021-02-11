<?php echo $this->Html->css('validate.css'); ?>
<?php echo $this->Html->script('jquery.validate', array('inline' => false)); ?>
<script src="<?php echo $this->webroot; ?>ckeditor/ckeditor.js"></script>
<script tyep="text/javascript">
    $(document).ready(function(){
        $("#UserAdminSendemailForm").validate({
            rules: {
                "data[User][subject]": {
                    required: true
                },
                "data[User][email]": {
                    required: true,
                    email: true
                },
                "data[User][ccemail]":{
                    ccemail: true
                },
                "data[User][message]": {
                    required: true
                }
            },
            messages: {
                "data[User][subject]": {
                    required: "Please enter subject."
                },
                "data[User][email]": {
                    required: "Please enter email address.",
                    email: "Please enter a valid email address."
                },
                "data[User][ccemail]":{ 
                    required: ""
                },
                "data[User][message]": {
                    required: "Please enter message."
                }
            }
        });
    });
    
jQuery.validator.addMethod("ccemail", function(value, element) {
     var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if($('#UserCcemail').val() == ''){
        return true;
    }
    else if($('#UserCcemail').val() != '' && !filter.test($("#UserCcemail").val()) ){
        return false;
    }else{
        return true;
    }
}, "Please enter a valid email address.");  
</script>
<div class="content_sec_inner">
    <?php echo $this->element('leftpanel'); ?>
    <div class="right_sec">
        <div class="categery">
            <div class="succcls"> <?php echo $this->Session->flash('auth'); ?> </div>
            <div  class="headingall" style="text-align:left;">Send Email</div>
            <div class="mainarea">
                <div class="lightash">		
                    <div class="clear"></div>
                </div>
                <?php echo $this->Form->create('User', array('action' => 'admin_sendemail')); ?>

                <div class="ash">
                    <fieldset>
                        <label>Subject : </label>
                        <?php echo $this->Form->input('subject', array('label' => false, 'placeholder' => 'Enter Subject')); ?> 
                    </fieldset>
                    <div class="clear"></div>
                </div>

                <div class="lightash">
                    <fieldset>
                        <label>To : </label>
                        <?php
                        if (isset($this->request->query['email'])) {
                            echo $this->Form->input('email', array('label' => false, 'value' => $this->request->query['email']));
                        } else {
                            echo $this->Form->input('email', array('label' => false, 'placeholder' => 'Receiver email'));
                        }
                        ?> 
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="ash">
                    <fieldset>
                        <label>Cc : </label>
                        <?php
                            echo $this->Form->input('ccemail', array('label' => false, 'placeholder' => 'Receiver email'));
                        ?> 
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="lightash">
                    <fieldset>
                        <label>Message : </label>
                        <div style="float: left;margin: 0 auto 0 auto;"><?php echo $this->Form->input('message', array('label' => false, 'type' => 'textarea', 'placeholder' => 'Message', 'class' => 'ckeditor')); ?></div> 
                    </fieldset>
                    <div class="clear"></div>
                </div>

                <div class="ash">
                    <fieldset>
                        <label>Email template : </label>
                        <?php echo $this->Html->image("template1.jpg"); ?>
                        <?php echo $this->Html->image("template2.jpg"); ?>
                        <?php echo $this->Html->image("template3.jpg"); ?>
                        <?php echo $this->Html->image("template4.jpg"); ?>
                        <div class="clear"></div>
                        <div style="margin-left: 255px;">
                            <input type="radio" name="data[User][template]" value="template1" checked="checked" >
                            <input type="radio" name="data[User][template]" value="template2" style="margin-left:105px;">
                            <input type="radio" name="data[User][template]" value="template3" style="margin-left:105px;">
                            <input type="radio" name="data[User][template]" value="template4" style="margin-left:105px;">
                        </div>
                    </fieldset>
                    <div class="clear"></div>
                </div>

                <div class="lightash">
                    <fieldset>
                        <label>&nbsp;</label><?php echo $this->Form->submit('Send'); ?>&nbsp;&nbsp;
                        <?php
                        echo $this->Html->link('Cancel', $_SERVER['HTTP_REFERER'], array('class' => 'buttonlnk'));
                        ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
    <br class="spacer"/>
</div>