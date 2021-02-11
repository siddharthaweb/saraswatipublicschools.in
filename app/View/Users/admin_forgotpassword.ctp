<?php echo $this->Html->css('validate.css'); ?>
<?php echo $this->Html->script('jquery.validate',array('inline' => false));?>
<script>
$(document).ready(function(){
	$("#UserAdminForgotpasswordForm").validate({
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
    form{width: 550px;}
    label.error{padding-left: 25.5em;}
</style>
<div class="content_sec">
<div class="login_sec" style="height:300px;">
			  <h2>Administrator Forgot Password</h2>
			  <div class="error-message" style="padding-left:90px;"><?php echo $this->Session->flash('auth'); ?></div>
			  <div class="form_login">
			   <?php echo $this->Form->create('User', array('action' => 'admin_forgotpassword')); ?>
			  <label>Email:</label>
			  <?php echo $this->Form->input('email',array('label' => false)); ?>
                          <br class="spacer"/>
			<label class="submit_btn"> <?php echo $this->Form->submit('Send');?>
			<?php echo $this->Html->link('Cancel', '/admin/users/forgotpassword', array('class' => 'buttonlnk'));?>
			</label>
			  <br class="spacer"/>
				 <?php echo $this->Form->end();?>
			  </div>
			</div>
</div>