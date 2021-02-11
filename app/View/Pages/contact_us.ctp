<div class="cbp-row wh-content">
    
    
    <div class="cbp-row wh-page-title-bar">
		<div class="cbp-container">
			<div class="one whole wh-padding wh-page-title-wrapper">
				<h1 class="page-title">Contact</h1>
			</div>
		</div>
	</div>
    
    
	<div class="cbp-container">
		<div class="entry-content one whole wh-padding">
            <div class="vc_row-full-width vc_clearfix"></div>
            
            <div class="vc_row wpb_row vc_row-fluid vc_custom_1458734918279">
            <div class="wpb_column vc_column_container vc_col-sm-4">
                <div class="vc_column-inner "><div class="wpb_wrapper">
					
		
		<p style="font-size: 12px;text-align: left" class="vc_custom_heading vc_custom_1458730550980">ADDRESS</p><p style="font-size: 15px;text-align: left" class="vc_custom_heading vc_custom_1458731158955">Main Branch: Natun Sirajuli, Sonitpur<br />
City Office: Dhekiajuli, Sonitpur Dist, Assam, Pin: 784110</p>
					
		
		<p style="font-size: 12px;text-align: left" class="vc_custom_heading vc_custom_1458827344092">WORKING HOURS</p><p style="font-size: 15px;text-align: left" class="vc_custom_heading vc_custom_1458827350394"><?php echo Configure::read('WORKING_DAYS');?>: <?php echo Configure::read('TIME');?>
</p>
					
		
		<p style="font-size: 12px;text-align: left" class="vc_custom_heading vc_custom_1458730962590">PHONE</p><p style="font-size: 15px;color: #ff7264;text-align: left" class="vc_custom_heading vc_custom_1458827423630">
                    <?php echo Configure::read('CONTACT_ONE');?></p>
					
		
		<p style="font-size: 12px;text-align: left" class="vc_custom_heading vc_custom_1458827357785">EMAIL</p><p style="text-align: left" class="vc_custom_heading vc_custom_1458827363100"><?php echo Configure::read('ADMIN_EMAIL');?></p></div></div></div>
            <div class="wpb_column vc_column_container vc_col-sm-8 vc_col-has-fill"><div class="vc_column-inner vc_custom_1458729850668"><div class="wpb_wrapper"><h2 style="font-size: 23px;text-align: center" class="vc_custom_heading">Make an Appointment</h2>
                
                <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_10 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_grey vc_custom_1458832714491  vc_custom_1458832714491"><span class="vc_sep_holder vc_sep_holder_l"><span  class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span  class="vc_sep_line"></span></span>
</div>
                <div role="form" class="wpcf7" id="wpcf7-f216-p210-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"></div>

                    
<?php echo $this->Form->create('Page', array('action' => 'send_mail_to_admin')); ?>
<?php echo $this->Session->flash('auth'); ?>                     
<div class="vc_row make-an-appointment-form" style="line-height:30px;padding:18px">
<div class="vc_col-sm-6">
<p><span class="wpcf7-form-control-wrap first-name">
    
    <?php echo $this->Form->input('first_name',array('label' => false, 'size' => '50','class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required','aria-required'=>'true','aria-invalid'=>'false','placeholder'=>'First name')); ?>
    
    
    </span> </p>
<p><span class="wpcf7-form-control-wrap last-name">
    
    
    <?php echo $this->Form->input('last_name',array('label' => false, 'size' => '50','class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required','aria-required'=>'true','aria-invalid'=>'false','placeholder'=>'Last name')); ?>
   
    
    </span> </p>
</div>
<div class="vc_col-sm-6">
<p><span class="wpcf7-form-control-wrap your-email">
    
    <?php echo $this->Form->input('email',array('label' => false, 'size' => '50','class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required','aria-required'=>'true','aria-invalid'=>'false','placeholder'=>'Your email')); ?>
    
    </span> </p>
<p><span class="wpcf7-form-control-wrap your-subject">
        
    <?php echo $this->Form->input('subject',array('label' => false, 'size' => '50','class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required','aria-required'=>'true','aria-invalid'=>'false','placeholder'=>'Your subject')); ?>
    
    </span> </p>
</div>
<div class="vc_col-sm-12">
<p><span class="wpcf7-form-control-wrap your-message">
    
    
    <?php echo $this->Form->input('message',array('label' => false, 'cols'=>'100','rows'=>'12','class'=>'wpcf7-form-control wpcf7-textarea','aria-invalid'=>'false', 'placeholder'=>'Your message')); ?>
    
    
    </span> </p>
</div>
<div class="vc_col-xs-6">
<p style="margin-top: 21px;margin-left: 11px;font-size: 15px;line-height: 18px;">All fields are obligatory</p>
</div>
<div class="vc_col-xs-6">
<p class="form-button pull-right" style="margin-top: 10px;margin-right:-20px;">
    
    <?php echo $this->Form->submit('Submit',array('class'=>'wpcf7-form-control wpcf7-submit'));?>
    </p>
</div>
</div>
<div class="wpcf7-response-output wpcf7-display-none"></div>
<?php echo $this->Form->end();?>
                
                </div></div></div></div>
            </div>
				</div>
	</div>
</div>
	

	