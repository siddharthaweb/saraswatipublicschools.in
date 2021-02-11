<?php echo $this->Html->css('uservalidate.css'); ?>
<?php echo $this->Html->script('jquery.validate'); ?>
<script>
    jQuery(function($){
        $("#UserLoginForm").validate({
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
    label.error {
     margin-bottom: -5px;
    margin-top: -3px !important;
    padding-left: 16.5em !important;
    }
    .inner-cont .left-sec {
    float: left;
    width: 992px !important;
}
</style>
<div class="inner-cont">
        <div class="left-sec">
		<div class="inner-sec">
		
          <div class="login-sec">
            <h2>Sign In</h2>
            <div class="error-message" style="text-align: center;"><?php echo $this->Session->flash('auth'); ?></div>
              <?php echo $this->Form->create('User', array('action' => 'login')); ?>
			  
				<fieldset>
				<label>Email<span>*</span></label>
                <?php echo $this->Form->input('email', array('label' => false)); ?>
                </fieldset>
                              
               <fieldset>
				<label>Password<span>*</span></label>
                <?php echo $this->Form->input('password', array('label' => false)); ?>
                </fieldset>
				
				<fieldset>
				<label>&nbsp;</label>
                                <?php
                echo $this->Html->link('Forgot your password?', array(
                    'controller' => 'users',
                    'action' => 'forgotpassword'
                ));
                ?> 
                 </fieldset>
				 
            <fieldset>
                <label>&nbsp;</label>
                <?php echo $this->Form->submit('Sign In', array("size" => "10")); ?>
            </fieldset>
				
               
			   
              <?php echo $this->Form->end(); ?>
             
           </div>
                    
            <div class="clr" style="background-color:#ffffff;height:10px;">&nbsp;</div>        
            
            <div class="login-sec">
            <h2 style="text-align:center;">Not a member yet?</h2>
                <?php echo $this->Form->submit('Sign Up', array('div'=>false,'lable'=>false,'style'=>'margin:18px 5px 5px 113px;padding:0 70px;','onclick'=>'location.href="'.$this->base.'/users/signup"')); ?>
                <div style="color:#006699;font: bold 24px/25px Tahoma;padding-left:160px;">It's</div>
                <div class="clr"></div>
                <div style="color:#006699;font: bold 26px/27px Tahoma;text-align: center;">Free!</div>
           </div>        
            <!--login-sec-end-->
         
        </div>
        </div>
    
        <?php //echo $this->element('tagcloud');?>
    
    
        <div class="clr"></div>
      </div>	