<?php echo $this->Html->css('uservalidate.css'); ?>
<?php echo $this->Html->script('jquery.validate'); ?>
<script>
    $(document).ready(function(){
        $("#UserForgotpasswordForm").validate({
            rules: {
                "data[User][email]": {
                    required: true,
                    email: true
                }
            },
            messages: {
                "data[User][email]":{
                    required: "Please enter email address.",
                    email: "Please enter valid email address"
                }
            }
        });
    });
</script>
<style>
    label.error {
        padding-left: 16.5em !important;
        margin-top: 0px !important;
    }
</style>
<div class="inner-cont">
    <div class="left-sec">
        <div class="inner-sec">
            <div class="login-sec">
                <h2> Forgot Password</h2>
                <div class="error-message" style="text-align:center;"><?php echo $this->Session->flash('auth'); ?></div>
                <?php echo $this->Form->create('User', array('action' => 'forgotpassword')); ?>

                <fieldset>
                    <label>Email<span>*</span></label>
                    <?php echo $this->Form->input('email', array('label' => false)); ?>
                </fieldset> 
                <fieldset>
                    <label>&nbsp;</label>
                    <?php echo $this->Form->submit('Send'); ?>				
                </fieldset>
                <?php echo $this->Form->end(); ?>
            </div>
            <!--login-sec-end-->
        </div>
    </div>
    <?php echo $this->element('tagcloud'); ?>
    <div class="clr"></div>
</div>