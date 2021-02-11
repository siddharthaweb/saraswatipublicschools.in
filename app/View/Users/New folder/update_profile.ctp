<?php echo $this->Html->css('uservalidate.css'); ?>
<?php echo $this->Html->script('jquery.validate'); ?>
<script>
    jQuery(function($){
        $("#UserUpdateProfileForm").validate({
            rules: {
                "data[User][first_name]": {
                    required: true
                },
                "data[User][last_name]": {
                    required: true
                },
                "data[User][dob]":{
                    required: true
                },
                "data[User][email]": {
                    required: true,
                    email: true
                },
                "data[User][group_id]": {
                    required: true
                },
                "data[User][city_id]": {
                    required: true
                },
                "data[User][district_id]":{
                    required: true
                },
                "data[User][profile_picture]": {
                    accept: "jpeg|jpg|gif|png"
                },
                "data[User][user_desc]":{
                    maxlength: 200
                }
            },
            messages: {
                "data[User][first_name]":{
                    required: "Please enter user surname"
                },
                "data[User][last_name]": {
                    required: "Please enter user given name"
                },
                "data[User][dob]":{
                    required: "Please enter date of birth"
                },
                "data[User][email]": {
                    required: "Please enter email address",
                    email: "Please enter valid email address"
                },
                "data[User][city_id]": {
                    required: "Please select one city"
                },
                "data[User][password]": {
                    required: "Please enter password",
                    minlength: "Minimum length of 5 characters"
                },
                "data[User][district_id]":{
                    required: "Please select one district"
                },
                "data[User][profile_picture]": {
                    accept: "Please upload with extention jpeg,jpg,gif,png"
                },
                "data[User][user_desc]":{
                    maxlength: "Maximum length 200 characters"
                }
            }
        });
    }); 
</script>

<?php echo $this->Html->script(array('jquery-1.3.2')); ?>
<link type="text/css" href="<?php echo $this->webroot; ?>datepicker/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $this->webroot; ?>datepicker/ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>datepicker/ui/ui.datepicker.js"></script>
<script type="text/javascript">
    $j=jQuery.noConflict();
    $j(function() {
        $j('#UserDob').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
            yearRange: '<?php echo (date('Y') - 80);?>:<?php echo date('Y');?>'
        });
    });    
</script>
<style>
    select{width: 262px;padding: 0px !important;}
    label.error {margin-left: 105px; }
    .error-message {margin: -8px 0 -5px 105px;  }
    .error-message strong {font: 12px/22px Tahoma; color: #A23E01;  }
    p input{width:250px  !important;}  
    .acc-right-cont{float: right !important;}
</style>
<div class="inner-cont">
    <div class="left-sec">
        <div class="inner-sec">
            <h2>User Account</h2>
            <div class="user-account">
                <?php echo $this->element('navigation'); ?>
                <div class="total-cont">
                    <h2 class="left"> <span>  <?php echo $this->data['User']['first_name']; ?> <?php echo $this->data['User']['last_name']; ?></span></h2>
                    <br class="clr"	 />                    
                    <div class="acc-photo">
                        <?php if ($this->data['User']['profile_image'] == '') { ?>

                            <img src="<?php echo $this->webroot; ?>img/account-photo.jpg" width="144" height="144" />

                        <?php } else { ?>

                            <?php echo $this->Html->image(PRE_IMGPATH . 'timthumb.php?src=' . IMGPATH . 'profile_image/' . $this->data['User']['profile_image'] . '&h=156&w=153', array("alt" => 'user', 'url' => '#')); ?>

                        <?php } ?>                            
                    </div>
                    
                    <div class="error-message" style="padding-left:150px;margin-top: -30px;">
                            <?php echo $this->Session->flash('auth'); ?>
                    </div>
                    
                    
                    <div class="acc-right-cont" >
                        <?php echo $this->Form->create('User', array('action' => 'update_profile', 'type' => 'file')); ?>
                        <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>

                        <p><span class="length">Select District :</span> <strong><?php echo $this->Form->input('district_id', array('type' => 'select', 'options' => $districts, 'label' => false, 'div' => false, 'empty' => 'Select District', 'onchange' => 'cityAjaxbydistrictID(this.value)')); ?></strong></p>  

                        <p><span class="length">Select City :</span> <strong><span id="cityId"><?php echo $this->Form->input('city_id', array('type' => 'select', 'options' => $userCities, 'label' => false, 'div' => false, 'empty' => 'Select City')); ?> </span></strong></p> 
                        
                        <p><span class="length">Surname :</span> <strong>  <?php echo $this->Form->input('first_name', array('label' => false, 'div' => false, )); ?> </strong></p>

                        <p><span class="length">Given name :</span> <strong><?php echo $this->Form->input('last_name', array('label' => false, 'div' => false, )); ?></strong></p>

                        <p><span class="length">Date Of Birth :</span> <strong><?php echo $this->Form->input('dob', array('label' => false, 'div' => false,  'type' => 'text')); ?></strong></p>

                        <p><span class="length">Email :</span> <strong><?php echo $this->Form->input('email', array('label' => false, 'div' => false, )); ?></strong></p>

                        <p><span class="length">Telephone 1 :</span> <strong><?php echo $this->Form->input('telephone1', array('label' => false, 'div' => false, )); ?></strong></p>

                        <p><span class="length">Telephone 2 :</span> <strong><?php echo $this->Form->input('telephone2', array('label' => false, 'div' => false, )); ?></strong></p>

                        <p><span class="length">Work Place :</span> <strong><?php echo $this->Form->input('workplace', array('label' => false, 'div' => false,  'type' => 'text')); ?></strong></p>

                        <p><span class="length">Position :</span> <strong><?php echo $this->Form->input('position', array('label' => false, 'div' => false,  'type' => 'text')); ?></strong></p>

                        <p><span class="length">Qualification :</span> <strong><?php echo $this->Form->input('qualification', array('label' => false, 'div' => false,  'type' => 'text')); ?></strong></p>

                        <p><span class="length">About Me :</span> 
                            <div class="clr"></div>
                            <strong><?php echo $this->Form->input('user_desc', array('label' => false, 'div' => false,'cols'=>false,'rows'=>false,'style'=>'width:355px;')); ?></strong></p>
                                           
                        <p><span class="length">Email notification :</span> <strong>
                                <?php
                                echo $this->Form->checkbox('email_notification', array(
                                    'value' => 'Y',
                                    'hiddenField' => 'N',
                                ));
                                ?></strong></p>
                        <p><span class="length">Picture:</span> <strong> <?php echo $this->Form->input('profile_picture', array('label' => false, 'div' => false, 'type' => 'file')); ?></strong></p>
                        <p><span>&nbsp;</span><strong class="left" style="padding-left:257px;"><?php echo $this->Form->submit('Submit'); ?></strong></p>
                        <?php
                        echo $this->Form->end();
                        ?>
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
<script>
    function cityAjaxbydistrictID(district_id){
        if(district_id != ''){
            $("#cityId").html('<?php echo $this->Html->image('ajax-loader.gif', array('border' => '0')); ?>');  
            var request = $.ajax({
                type: "POST",
                url: "<?php echo $this->Html->url(array("controller" => "cities", "action" => "UserDisplayajaxbydistrictId")); ?>",
                data: {district_id : district_id},
                cache: false,
                dataType: "html"
            });
            request.done(function(msg){
                $("#cityId").html(msg);
            });
            request.fail(function(jqXHR, textStatus) {
                alert( "Request failed: " + textStatus );
            });
        }
    } 
</script>