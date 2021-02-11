<?php //echo $this->Html->script(array('jquery-1.3.2'));  ?>
<link type="text/css" href="<?php echo $this->webroot; ?>datepicker/themes/base/ui.all.css" rel="stylesheet" />
<!--<script type="text/javascript" src="<?php //echo $this->webroot;  ?>datepicker/ui/ui.core.js"></script>
<script type="text/javascript" src="<?php //echo $this->webroot;  ?>datepicker/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.3/jquery-ui.min.js"></script>-->

<script type="text/javascript" src="<?php echo $this->webroot; ?>datepicker/jquery-ui.min.js"></script>

<script type="text/javascript"> 
    jQuery(function($){
        $('#UserDob').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
            yearRange: '<?php echo (date('Y') - 80);?>:<?php echo date('Y');?>'
        });
    });
</script>
<?php echo $this->Html->css('uservalidate.css'); ?>
<?php echo $this->Html->script('jquery.validate'); ?>
<script type="text/javascript">
    jQuery(function($){
        $("#UserSignupForm").validate({
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
                "data[User][confirm_email]": {
                    required: true,
                    email: true,
                    equalTo: "#UserEmail"
                },
                "data[User][group_id]": {
                    required: true
                },
                "data[User][city_id]": {
                    required: true
                },
                "data[User][password]":{
                    required: true,
                    minlength: 5
                },
                "data[User][password_confirm]":{
                    required: true,
                    minlength: 5,
                    equalTo: "#UserPassword"
                },
                "data[User][district_id]":{
                    required: true
                },
                "data[User][user_desc]":{
                    maxlength: 200
                },
                "data[User][profile_picture]": {
                    accept: "jpeg|jpg|gif|png"
                },
                "accept_condition":{
                    required: true
                },
                "recaptcha_response_field":{
                    required: true
                },
                "data[UserGroupAddRelation][add_vertisement]":{
                    required: true
                }
            },
            messages: {
                "data[User][first_name]":{
                    required: "Please enter your surname"
                },
                "data[User][last_name]": {
                    required: "Please enter your given name"
                },
                "data[User][dob]":{
                    required: "Please enter your date of birth"
                },
                "data[User][email]": {
                    required: "Please enter your email address",
                    email: "Please enter valid email address"
                },
                "data[User][confirm_email]": {
                    required: "Please re-enter your email address",
                    email: "Please enter valid confirm email",
                    equalTo: "Email and Confirm Email are not same , please try again"
                },
                "data[User][group_id]": {
                    required: "Please select a category"
                },
                "data[User][city_id]": {
                    required: "Please select a city"
                },
                "data[User][password]": {
                    required: "Please enter a password",
                    minlength: "Minimum length 5 characters"
                },
                "data[User][password_confirm]":{
                    required: "Please re-enter the password",
                    minlength: "Minimum length 5 characters",
                    equalTo: "Password and Confirm password are not same , please try again"
                },
                "data[User][district_id]":{
                    required: "Please select a district"
                },
                "data[User][user_desc]":{
                    maxlength: "Maximum length 200 characters"
                },
                "data[User][profile_picture]": {
                    accept: "Please upload with extention jpeg,jpg,gif,png"
                },
                "accept_condition":{
                    required: "Please accept terms of use and privacy policy"
                },
                "recaptcha_response_field":{
                    required : ""
                },
                "data[UserGroupAddRelation][add_vertisement]":{
                    required: "<span style='color:#A23E01;left:35px;position:absolute;top:320px;z-index:100;'>Please select an option</span>"
                }
            }
        });
    }); 
</script>
<link type="text/css" href="<?php echo $this->webroot; ?>autocomplete/select2.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $this->webroot; ?>autocomplete/select2.js"></script>
<script id="script_e21">
    var preload_data = [
<?php
$i = 1;
foreach ($groupsdata as $val):
    if ($i != 1) {
        echo ',';
    }
    ?>     
                { id: '<?php echo $val['Group']['id']; ?>', text: '<?php echo $val['Group']['name']; ?>'}
    <?php
    $i++;
endforeach;
?>
    ];
    
    jQuery(function($){
        $('#e21').select2({
            multiple: false
            ,maximumSelectionSize: 6
            ,query: function (query){
                var data = {results: []};
                $.each(preload_data, function(){
                    if(query.term.length == 0 || this.text.toUpperCase().indexOf(query.term.toUpperCase()) >= 0 ){
                        data.results.push({id: this.id, text: this.text });
                    }
                });
                query.callback(data);
            }
        });
<?php if (isset($dis_group_details) && !empty($dis_group_details)) { ?> 
                    $("#e21").select2("data", {id: "<?php echo $dis_group_details['Group']['id']; ?>", text: "<?php echo $dis_group_details['Group']['name']; ?>"});
<?php } ?> 
            });
</script>

<style>
    select {
        padding: 0px !important;
    }
</style>
<div class="inner-cont">
    <div class="left-sec">
        <div class="signup-sec">
            <div class="signup-form">
                <div class="error-message" style="text-align:center;"><?php echo $this->Session->flash('auth'); ?></div>
                <?php echo $this->Form->create('User', array('action' => 'signup', 'type' => 'file')); ?>
                <dl class="left-form">
                    <dt>Select District</dt>
                    <dd>
                        <?php echo $this->Form->input('district_id', array('type' => 'select', 'options' => $districts, 'label' => false, 'empty' => 'Select District')); ?>
                    </dd>
                </dl>
                <dl style="width:287px;" class="right-form">
                    <dt>Select Nearest City</dt>
                    <dd>
                        <span id="cityId">
                            <?php
                            if (isset($dis_city_list) && !empty($dis_city_list)) {
                                echo $this->Form->input('city_id', array('type' => 'select', 'options' => $dis_city_list, 'label' => false, 'empty' => 'Select City'));
                            } else {
                                ?>
                                <select name="data[User][city_id]">
                                    <option value="">Select City</option>
                                </select>
                            <?php } ?>
                        </span>
                        <p><?php echo $this->Html->link('Can’t find your nearest city?', '/city_request'); ?></p>
                    </dd>
                </dl>
                <div class="clr"></div>
                <dl class="left-form">
                    <dt>Select Category</dt>
                    <dd>
                        <?php echo $this->Form->input('group_id', array('label' => false, 'id' => 'e21', 'type' => 'text', 'style' => 'width:150px;')); ?> 
                        <p><?php echo $this->Html->link('Can’t find your category?', '/category_request'); ?></p>
                    </dd>
                </dl>

                <div class="clr"></div>
                <div class="bot-part">
                    <p>Would you like to publish your contact details for public view ? <?php echo $this->Html->link('more details', '/more_details', array('class' => 'absoluteIframeDOMWindownew')); ?></p>
                    <p class="perrordis">
                        <input type="radio" name="data[UserGroupAddRelation][add_vertisement]" value="Y" class="rg" style="vertical-align:-2px;" <?php if (isset($this->request->data['UserGroupAddRelation']['add_vertisement']) && $this->request->data['UserGroupAddRelation']['add_vertisement'] == "Y") { ?> checked="checked" <?php } ?> />
                        Yes , publish my contact details for public view.</p>
                    <p>
                        <input type="radio" name="data[UserGroupAddRelation][add_vertisement]" value="N" class="rg1" style="vertical-align:-2px;" <?php if (isset($this->request->data['UserGroupAddRelation']['add_vertisement']) && $this->request->data['UserGroupAddRelation']['add_vertisement'] == "N") { ?> checked="checked" <?php } ?>/>
                        No, let me stay connected with my peers and colleagues.</p>
                </div>
                <div class="clr"></div>
                <dl class="full-form">
                    <dt>Surname<span>*</span></dt>
                    <dd>
                        <?php echo $this->Form->input('first_name', array('label' => false)); #,'autofocus'=>'autofocus','placeholder'=>'Enter Name'
                        ?>
                    </dd>
                </dl>
                <dl class="full-form">
                    <dt>Given Name<span>*</span></dt>
                    <dd>
                        <?php echo $this->Form->input('last_name', array('label' => false)); ?> 
                    </dd>
                </dl>
                <dl class="full-form">
                    <dt>Date of birth<span>*</span></dt>
                    <dd>
                        <?php echo $this->Form->input('dob', array('label' => false, 'type' => 'text')); ?>
                    </dd>
                </dl>
                <dl class="full-form">
                    <dt>Email<span>*</span></dt>
                    <dd>
                        <?php echo $this->Form->input('email', array('label' => false)); ?> 
                    </dd>
                </dl>
                <dl class="full-form">
                    <dt>Confirm email<span>*</span></dt>
                    <dd>
                        <?php echo $this->Form->input('confirm_email', array('label' => false)); ?> 
                    </dd>
                </dl>
                <dl class="full-form">
                    <dt>Password<span>*</span></dt>
                    <dd>
                        <?php echo $this->Form->input('password', array('label' => false)); ?>
                    </dd>
                </dl>
                <dl class="full-form">
                    <dt>Confirm password<span>*</span></dt>
                    <dd>
                        <?php echo $this->Form->input('password_confirm', array('type' => 'password', 'label' => false)); ?>
                    </dd>
                </dl>
                <dl class="full-form">
                    <dt>Phone</dt>
                    <dd>
                        <?php echo $this->Form->input('telephone1', array('label' => false)); ?>
                    </dd>
                </dl>
                <dl class="full-form">
                    <dt>Mobile</dt>
                    <dd>
                        <?php echo $this->Form->input('telephone2', array('label' => false)); ?>
                    </dd>
                </dl>
                <dl class="full-form">
                    <dt>Work Place</dt>
                    <dd>
                        <?php echo $this->Form->input('workplace', array('label' => false, 'type' => 'text')); ?>
                    </dd>
                </dl>
                <dl class="full-form">
                    <dt>Position</dt>
                    <dd>
                        <?php echo $this->Form->input('position', array('label' => false, 'type' => 'text')); ?>
                    </dd>
                </dl>
                <dl class="full-form">
                    <dt>Qualification</dt>
                    <dd>
                        <?php echo $this->Form->input('qualification', array('label' => false, 'type' => 'text')); ?>
                    </dd>
                </dl>
                <dl class="full-form">
                    <dt>About you</dt>
                    <dd>
                        <?php echo $this->Form->input('user_desc', array('label' => false)); ?>
                    </dd>
                </dl>

                <dl class="full-form">
                    <dt>Picture</dt>
                    <dd>
                        <?php echo $this->Form->input('profile_picture', array('label' => false, 'type' => 'file')); ?>
                    </dd>
                </dl>
                <br class="clr" />
                <div class="bot-part">
                    <p style="margin:20px 0 0 0;">
                        I accept to agree to the ablebugs <?php echo $this->Html->link('Terms of use', '/terms_of_use', array('target' => '_blank')); ?> and <?php echo $this->Html->link('Privacy Policy', '/privacy_policy', array('target' => '_blank')); ?>
                        <input type="checkbox" name="accept_condition" style="vertical-align:-2px;" 
                               <?php if (isset($this->request->data['accept_condition']) && $this->request->data['accept_condition'] == "on") { ?> checked="checked" <?php } ?>/>
                    </p>
                </div>

                <div class="bot-part">
                    <p>Help us prove you’re not a robot. Please type the two pieces of text.</p>
                    <?php
                    #http://bakery.cakephp.org/articles/tbsmcd/2011/02/05/recaptcha_plugin_6
                    echo $this->Recaptcha->display(array(
                        'theme' => 'white', // Possible value: 'red'|'white'|'blackglass'|'clean' ; 
                        'lang' => 'en',
                    ));
                    if (isset($recaptcha_error)) {
                        //echo '<span style="color:red">' . $recaptcha_error . '</span>';
                    }
                    // echo $this->Session->flash('recaptcha_error');
                    //echo $this->Recaptcha->error();
                    ?>
                </div>
                <?php echo $this->Form->submit('Sign up'); ?>

                <?php
                echo $this->Form->end();
                ?>
                <br class="clr"/>

            </div>
            <!--sign-up-form-->
        </div>
        <div class="clr"></div>
    </div>

    <?php echo $this->element('tagcloud'); ?>

    <div class="clr"></div>
</div>

<script>
    jQuery(function($){
        $('#UserDistrictId').change(function(){
            var district_id = $(this).val();
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
        });
    });
</script>


<?php echo $this->Html->script('jquery.DOMWindow.js'); ?>
<script type="text/javascript"> 
    jQuery.noConflict();
    (function($) {
        $(function() {
            $('.absoluteIframeDOMWindownew').openDOMWindow({ 
                height:380,
                width:600,
                positionTop:50, 
                eventType:'click', 
                positionLeft:300, 
                windowSource:'ajax', 
                windowPadding:0, 
                loader:1, 
                loaderImagePath:'ajax-loader.gif', 
                loaderHeight:16, 
                loaderWidth:17,
                functionCallOnOpen: function(){
                    $("#DOMWindow .right-sec").remove();
                    $("#DOMWindow .inner-cont").addClass("force_599");
                    $("#DOMWindow .left-sec").addClass("force_599");
                }
            });
            $('.closeDOMWindow').click(function(){
                $(this).parent().close();
            });
        });
    })(jQuery);
</script>
<style>
.recaptcha_input_area > input {
height: 20px !important;
padding: 0 !important;

}

.recaptchatable #recaptcha_response_field {
width: 153px!important;
position: relative!important;
bottom: 3px!important;
padding: 0!important;
margin: 5px 0 0 0!important;
font-size: 10pt;
}
</style>
