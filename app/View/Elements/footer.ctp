<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1458736960521 vc_row-has-fill">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner vc_custom_1459850666073">
            <div class="wpb_wrapper">
                <h2 style="color: #ffffff;text-align: center" class="vc_custom_heading">Events</h2>
                <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text vc_custom_1459842299205  vc_custom_1459842299205 wh-vc-separator">
                    <span class="vc_sep_holder vc_sep_holder_l"><span  style="border-color:#55575a;" class="vc_sep_line"></span></span>
                    <span class="vc_sep_holder vc_sep_holder_r"><span  style="border-color:#55575a;" class="vc_sep_line"></span></span>
</div>
            </div>
        </div>
    </div>
</div>
<div class="vc_row-full-width vc_clearfix"></div>
<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1457430950182 vc_row-has-fill"><div class="wpb_column vc_column_container vc_col-sm-8"><div class="vc_column-inner vc_custom_1457347914005">
    <div class="wpb_wrapper">		
        <div class="linp-post-list wh-post-list wh-text-color">
							<div class="vc_row">
                                <?php
                                     $data = ClassRegistry::init("Content")->find('all',array(
                                                                'conditions' => array('status' => 'A','type'=>'E'),
                                                                'order' => array('position' => 'ASC'),
                                                                'limit' => 3 
                                                                ));
                                     foreach($data as $val):
                                    ?>
								    <div class="wh-padding item one third">
                                        <div class="img-container">
                                        <div class="date">
                                            <div class="month"><?php echo date('M',strtotime($val['Content']['display_date']));?></div>
                                            <div class="day"><?php echo date('d',strtotime($val['Content']['display_date']));?></div>
                                        </div>
                                        <a href="/contents/details/<?php echo $val['Content']['id']?>/<?php echo str_replace(' ','',$val['Content']['title']);?>" title="<?php echo $val['Content']['title'];?>">
<?php  echo $this->Html->image(PRE_IMGPATH.'timthumb.php?src='.IMGPATH.'gallery/'.$val['Content']['image'].'&h=430&w=768', 
    array('class'=>'post-list-thumb wp-post-image','alt'=>$val['Content']['title'],'width'=>'768','height'=>'430')
                        );
?>
                                        </a>
                                        </div>
                                        <div class="data">
                                            <h3>
                                            <a title="<?php echo $val['Content']['title'];?>" href="contents/details/<?php echo $val['Content']['id']?>/<?php echo str_replace(' ','',$val['Content']['title']);?>"><?php echo $val['Content']['title'];?></a>
                                            </h3>
                                            <div class="content">
                                            <p>
                                                <?php 
                                                echo $this->Text->truncate(
                                                        $val['Content']['description'],
                                                        250,
                                                        array(
                                                            'ellipsis' => '...',
                                                            'exact' => false
                                                        )
                                                    );
                                                ?>
                                                </p>
                                            </div>
                                            <a class="read-more" href="/contents/details/<?php echo $val['Content']['id']?>/<?php echo str_replace(' ','',$val['Content']['title']);?>">Read more</a>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
									</div>
								</div>

		</div></div></div><div class="wpb_column vc_column_container vc_col-sm-4"><div class="vc_column-inner vc_custom_1457347990962"><div class="wpb_wrapper">			<div class="linp-tribe-events-wrap wh-text-color">
									<h3 class="widget-title">
						<i class="fa fa-calendar" aria-hidden="true"></i> Notice </h3>
								<ul class="linp-tribe-events">
                                    <?php
                                     $data = ClassRegistry::init("Content")->find('all',array(
                                                                'conditions' => array('status' => 'A','type'=>'N'),
                                                                'order' => array('position' => 'ASC'),
                                                                'limit' => 5 
                                                                ));
                                     foreach($data as $val):
                                    ?>
                                        <li class="event">
                                            <div class="date">
                                                <span class="month"><?php echo date('M',strtotime($val['Content']['display_date']));?></span>
                                                <span class="day"><?php echo date('d',strtotime($val['Content']['display_date']));?></span>
                                            </div>
                                            <div class="info">
                                                <div class="title">
                                                <a style="" href="/contents/details/<?php echo $val['Content']['id']?>/<?php echo str_replace(' ','',$val['Content']['title']);?>" rel="bookmark"><?php echo $val['Content']['title'];?></a>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach;?>
									</ul>
									<p class="linp-tribe-events-link">
						<a href="<?php echo SITE_URL;?>/notice" rel="bookmark">View all notice</a>
					</p>
							</div>
			</div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="vc_row wpb_row vc_row-fluid vc_custom_1459507824914"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner vc_custom_1459850941279"><div class="wpb_wrapper"><h2 style="text-align: left" class="vc_custom_heading">Our Documents</h2></div></div></div></div><div class="vc_row wpb_row vc_row-fluid">
                
            <div class="wpb_column vc_column_container vc_col-sm-3">
            <div class="vc_column-inner vc_custom_1459851078142">
            <div class="wpb_wrapper">
            <div class="wpb_text_column wpb_content_element ">
            <div class="wpb_wrapper">
            <p>Please click on the link to download the PDF File.</p>
            </div>
            </div>
            </div>
            </div>
            </div>
                
            <div class="wpb_column vc_column_container vc_col-sm-3">
            <div class="vc_column-inner ">
            <div class="wpb_wrapper">
            <div class="wh-theme-icon " style="font-size:53px;position:absolute;color:#b4b7c1!important;">
            <i class="fa fa-download fa-1" aria-hidden="true"></i>
            </div>
            <h5 style="text-align: left" class="vc_custom_heading vc_custom_1458306853685" onmouseover="this.style.color='#215390'" onmouseout="this.style.color='#304246'"><a href="/files/teacher_qulifications.pdf" target="_blank">Teacher's Qulifications</a></h5>
            </div>
            </div>
            </div>    
                
            <div class="wpb_column vc_column_container vc_col-sm-3">
            <div class="vc_column-inner ">
            <div class="wpb_wrapper">
            <div class="wh-theme-icon " style="font-size:53px;position:absolute;color:#b4b7c1!important;">
            <i class="fa fa-download fa-1" aria-hidden="true"></i>
            </div>
            <h5 style="text-align: left" class="vc_custom_heading vc_custom_1458306853685" onmouseover="this.style.color='#215390'" onmouseout="this.style.color='#304246'">
                <a href="/files/members_of_school_management_commitee.pdf" target="_blank">SPS School Management Committee</a></h5>
            </div>
            </div>
            </div>
                
            <div class="wpb_column vc_column_container vc_col-sm-3">
            <div class="vc_column-inner vc_custom_1459851289740">
            <div class="wpb_wrapper">
            <div class="wh-theme-icon " style="font-size:53px;position:absolute;color:#b4b7c1!important;">
            <i class="fa fa-download fa-1" aria-hidden="true"></i>
            </div>
            <h5 style="text-align: left" class="vc_custom_heading vc_custom_1458737698416" onmouseover="this.style.color='#215390'" onmouseout="this.style.color='#304246'">
                <a href="/files/members_of_society.pdf" target="_blank">Members of Saraswati Educational Society</a></h5>
            </div>
            </div>
            </div>
                
                
            </div>
            <div id="contact-us" data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1459506285327 vc_row-has-fill">
                <div class="wpb_column vc_column_container vc_col-sm-6"><div class="vc_column-inner vc_custom_1458739667740"><div class="wpb_wrapper">
            <h2 style="text-align: left" class="vc_custom_heading vc_custom_1458833105150">Objectives</h2>
            <div class="vc_tta-container" data-vc-action="collapse">
                <div class="vc_general vc_tta vc_tta-accordion vc_tta-color-grey vc_tta-style-classic vc_tta-shape-square vc_tta-o-shape-group vc_tta-controls-align-left wh-accordion wh-accordion">
                    <div class="vc_tta-panels-container">
                        <div class="vc_tta-panels">
                            
                            
                            <div class="vc_tta-panel vc_active" id="1456405893720-a55ec26a-b30a" data-vc-content=".vc_tta-panel-body"><div class="vc_tta-panel-heading">
                                <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
                                    <a href="#">
                                        <span class="vc_tta-title-text">Adopt the modern methods and techniques of child education keeping traditional values the same.</span><i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a></h4>
                                </div>
                                
                            </div>
                            
                            <div class="vc_tta-panel vc_active" id="1456405893720-a55ec26a-b30a" data-vc-content=".vc_tta-panel-body"><div class="vc_tta-panel-heading">
                                <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
                                    <a href="#">
                                        <span class="vc_tta-title-text">Create a vibrant and happy atmosphere in school to mitigate the fear of school from the child’s mind.</span><i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a></h4>
                                </div>
                                
                            </div>
                            
                            <div class="vc_tta-panel vc_active" id="1456405893720-a55ec26a-b30a" data-vc-content=".vc_tta-panel-body"><div class="vc_tta-panel-heading">
                                <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
                                    <a href="#">
                                        <span class="vc_tta-title-text">Discover and recognize the inherent talent of a child and assist in enhancing and exploring it further.</span><i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a></h4>
                                </div>
                                
                            </div>
                            
                            <div class="vc_tta-panel vc_active" id="1456405893720-a55ec26a-b30a" data-vc-content=".vc_tta-panel-body"><div class="vc_tta-panel-heading">
                                <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
                                    <a href="#">
                                        <span class="vc_tta-title-text">Instill moral values and help to inculcate healthy habits in a child.</span><i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a></h4>
                                </div>
                                
                            </div>
                            
                            <div class="vc_tta-panel vc_active" id="1456405893720-a55ec26a-b30a" data-vc-content=".vc_tta-panel-body"><div class="vc_tta-panel-heading">
                                <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
                                    <a href="#">
                                        <span class="vc_tta-title-text">Provide valuable assistance to improve a child’s interpersonal skills.</span><i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a></h4>
                                </div>
                                
                            </div>
                            
                            <div class="vc_tta-panel vc_active" id="1456405893720-a55ec26a-b30a" data-vc-content=".vc_tta-panel-body"><div class="vc_tta-panel-heading">
                                <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
                                    <a href="#">
                                        <span class="vc_tta-title-text">Uplift a child’s morale and ensure physical, mental and psychological growth of a child.</span><i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a></h4>
                                </div>
                            </div>
                        
                        
                        </div></div></div></div></div></div></div><div class="wpb_column vc_column_container vc_col-sm-6 vc_col-has-fill"><div class="vc_column-inner vc_custom_1459506291129"><div class="wpb_wrapper"><h2 style="font-size: 22px;text-align: center" class="vc_custom_heading">Make an Appointment</h2><div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_10 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_grey vc_custom_1458830674415  vc_custom_1458830674415"><span class="vc_sep_holder vc_sep_holder_l"><span  class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span  class="vc_sep_line"></span></span>
</div><div role="form" class="wpcf7" id="wpcf7-f439-p8-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"></div>

  
    
    
    
<?php echo $this->Form->create('Page', array('action' => 'send_mail_to_admin')); ?>
<?php echo $this->Session->flash('auth'); ?>    
<div class="vc_row make-an-appointment-form" style="line-height:30px;">
<div class="vc_col-sm-6">
<p><span class="wpcf7-form-control-wrap your-name">   
<?php echo $this->Form->input('first_name',array('label' => false, 'size' => '30','class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required','aria-required'=>'true','aria-invalid'=>'false','placeholder'=>'First name')); ?>
</span> </p>
    
 <p><span class="wpcf7-form-control-wrap your-name">   
<?php echo $this->Form->input('last_name',array('label' => false, 'size' => '30','class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required','aria-required'=>'true','aria-invalid'=>'false','placeholder'=>'Last name')); ?>
</span> </p>   
    
<p><span class="wpcf7-form-control-wrap your-email">
 <?php echo $this->Form->input('email',array('label' => false, 'size' => '30','class' => 'wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email','aria-required'=>'true','aria-invalid'=>'false','placeholder'=>'Your email')); ?>
</span> </p>
    
<p><span class="wpcf7-form-control-wrap your-subject">
<?php echo $this->Form->input('subject',array('label' => false, 'size' => '30','class' => 'wpcf7-form-control wpcf7-text','aria-required'=>'true','aria-invalid'=>'false','placeholder'=>'Your subject')); ?>    
</span> </p>
</div>
<div class="vc_col-sm-6">
<p><span class="wpcf7-form-control-wrap your-message">
<?php echo $this->Form->input('message',array('label' => false, 'cols'=>'30','rows'=>'8','class'=>'wpcf7-form-control wpcf7-textarea','aria-invalid'=>'false', 'placeholder'=>'Your message')); ?>
    </span> </p>
</div>

<div class="vc_col-xs-6">
<p class="form-button pull-right" style="margin-top: 10px;margin-right:-20px;margin-bottom:22px;">
    <?php echo $this->Form->submit('Submit',array('class'=>'wpcf7-form-control wpcf7-submit'));?>
    </p>
</div>
<div class="vc_col-xs-6">
<p style="margin-top: 21px;margin-left: 11px;font-size: 15px;line-height: 18px;">All fields are obligatory</p>
</div>    
</div>    
<div class="wpcf7-response-output wpcf7-display-none"></div>
<?php echo $this->Form->end();?>            
            
            </div></div></div></div></div>


<div class="vc_row-full-width vc_clearfix"></div>



<div class="vc_row-full-width vc_clearfix"></div>
                        </div>
</div>
	<div class="cbp-container wh-footer">
        <div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1457437609751 vc_row-has-fill"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner vc_custom_1459852665865"><div class="wpb_wrapper"><div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text"><span class="vc_sep_holder vc_sep_holder_l"><span  style="border-color:#5a5c60;" class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span  style="border-color:#5a5c60;" class="vc_sep_line"></span></span>
</div></div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1457438149013 vc_row-has-fill"><div class="wpb_column vc_column_container vc_col-sm-6">
        
        <div class="vc_column-inner vc_custom_1457436622007">
            <div class="wpb_wrapper"><h5 style="color: #ffffff;text-align: left" class="vc_custom_heading vc_custom_1459520288563">About</h5>
                <p style="color: #989797;line-height: 23px;text-align: justify;" class="vc_custom_heading vc_custom_1459520010654">
                Saraswati Public School is one of the educational initiative of Saraswati Educational Society in the year 2005 at Dhekiajuli.
                “VIDYA DADATI VINAYAM” is the moto of Saraswati Public School. It imparts education in C.B.S.E. curriculum to the children of small towns and rural areas with a view to bridge the communication and human resource management and training gap between large cities and rural Assam of Sonitpur District.
                Saraswati Public School is devoted and committed to deliver services to the Nation and its human resources with the highest efforts of the respected principal Mrs. Abanti Chowdhury and her able and dedicated team of teachers.
                </p>
		</div></div>
        
        </div>
        
        
        <div class="wpb_column vc_column_container vc_col-sm-3">
            <div class="vc_column-inner vc_custom_1459852997752"><div class="wpb_wrapper"><h5 style="color: #ffffff;text-align: left" class="vc_custom_heading vc_custom_1459520279651">Testimonials</h5>
                <p style="font-size: 14px;color: #989797;line-height: 21px;text-align: left" class="vc_custom_heading vc_custom_1459520420890">"The School provide ideal learning ambience for child's future and also provide quality teachers, pedagogy, infrastructural facilities, all kinds of support to motivate children to learn, comprehend and apply knowledge."</p>
                <p style="color: #989797;font-size: 14px;text-align: left" class="vc_custom_heading">- Suvenira</p>
                <p style="font-size: 14px;color: #989797;line-height: 21px;text-align: left" class="vc_custom_heading vc_custom_1459520428711">"It was an easy decision because it is the best school in Dhekiajuli. The school has innovative and caring teachers which is important to us."</p>
                <p style="color: #989797;font-size: 14px;text-align: left" class="vc_custom_heading">- Amit</p>
                </div></div></div>
        
        <div class="wpb_column vc_column_container vc_col-sm-3"><div class="vc_column-inner vc_custom_1459520219603"><div class="wpb_wrapper"><h5 style="color: #ffffff;text-align: left" class="vc_custom_heading vc_custom_1459754126438">Contact Info</h5>
					<div class="wh-theme-icon vc_custom_1459520532939 " style="font-size:16px;position:absolute;color:#ffffff!important;">
				<i class="fa fa-map-marker" aria-hidden="true"></i>
			</div>
		
		<h6 style="font-size: 13px;color: #ffffff;text-align: left" class="vc_custom_heading wh-font-weight-normal vc_custom_1459520391474">Our Address</h6><p style="font-size: 14px;color: #989797;text-align: left" class="vc_custom_heading vc_custom_1459520453292">
            <?php echo Configure::read('CONTACT_ONE');?><BR>
            Main Branch: Natun Sirajuli, Sonitpur
            City Office: Dhekiajuli, Sonitpur Dist,
            Assam, Pin: 784110</p>
            <div class="wh-theme-icon vc_custom_1459520538228 " style="font-size:16px;position:absolute;color:#ffffff!important;">
				<i class="fa fa-clock-o" aria-hidden="true"></i>
			</div>
		
		<h6 style="font-size: 13px;color: #ffffff;text-align: left" class="vc_custom_heading wh-font-weight-normal vc_custom_1459520399984">Working Hours</h6>
            
        <p style="font-size: 14px;color: #989797;text-align: left" class="vc_custom_heading vc_custom_1459520472016">Monday to Friday:</p>
        <p style="font-size: 14px;color: #989797;text-align: left" class="vc_custom_heading vc_custom_1459520465399"><?php echo Configure::read('TIME');?></p>
        </br>
            
        <!-- facebook -->
        <div class="fbcon wh-theme-icon vc_custom_1459520538228 " style="font-size:16px;position:absolute;color:#ffffff!important;">
		<i class="fa fa-facebook" aria-hidden="true"></i>
        </div>
		<h6 style="font-size: 13px;color: #ffffff;text-align: left" class="fbcon vc_custom_heading wh-font-weight-normal vc_custom_1459520399984"><a href="https://www.facebook.com/SARASWATIEDUCATIONALSOCIETY">Follow US On Facebook</a></h6>    
        <!-- facebook -->    
            
            
        </div></div></div>
        
        </div>
        
        <div class="vc_row-full-width vc_clearfix"></div>
        <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid">
            <div class="wpb_column vc_column_container vc_col-sm-6">
                <div class="vc_column-inner vc_custom_1459844282139">
                    <div class="wpb_wrapper">
                        <p style="font-size: 15px;color: #000000;text-align: left" class="vc_custom_heading">Copyright <?php echo date('Y');?> Saraswati Public School</p>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="vc_row-full-width vc_clearfix"></div>	</div>
<link rel='stylesheet' id='vc_tta_style-css'  href='<?php echo $this->webroot; ?>plugins/js_composer/assets/css/js_composer_tta.min.css' media='all' />
<script type='text/javascript' src='<?php echo $this->webroot; ?>js/wheels-plugins.min.js'></script>
<script type='text/javascript' src='<?php echo $this->webroot; ?>js/wheels-main.min.js'></script>
