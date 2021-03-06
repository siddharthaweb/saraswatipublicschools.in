<?php echo $this->Html->css('validate.css'); ?>
<?php echo $this->Html->script('jquery.validate', array('inline' => false)); ?>
<script>
    $(document).ready(function(){
        $("#UserAdminAddForm").validate({
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
                    email: true,
                    equalTo: "#UserConfirmEmail"
                },
                "data[User][confirm_email]": {
                    required: true,
                    email: true
                },
                "data[User][group_id]": {
                    required: true
                },
                "data[User][city_id]": {
                    required: true
                },
                "data[User][password]":{
                    required: true,
                    minlength: 5,
                    equalTo: "#UserPasswordConfirm"
                },
                "data[User][password_confirm]":{
                    required: true,
                    minlength: 5
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
                "data[User][confirm_email]": {
                    required: "Please enter confirm email",
                    email: "Please enter valid confirm email"
                },
                "data[User][group_id]": {
                    required: "Please select one group"
                },
                "data[User][city_id]": {
                    required: "Please select one city"
                },
                "data[User][password]": {
                    required: "Please enter password",
                    minlength: "Minimum length of 5 characters",
                    equalTo: "Confirm Password and password are not same"
                },
                "data[User][password_confirm]":{
                    required: "Please enter confirm password",
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
    $(document).ready(function () {
        $('#e21').select2({
            multiple: true
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
            dateFormat: 'yy-mm-dd'
        });
    });    
</script> 
<div class="content_sec_inner">
<?php echo $this->element('leftpanel'); ?>
    <div class="right_sec">
        <div class="categery">

            <div class="succcls"> <?php echo $this->Session->flash('auth'); ?> </div>
            <div  class="headingall" style="text-align:left;">Add User</div>
            <div class="mainarea">
                <div class="lightash">		
                    <div class="clear"></div>
                </div>
<?php echo $this->Form->create('User', array('action' => 'admin_add', 'type' => 'file')); ?>
                <div class="lightash">
                    <fieldset>
                        <label>Surname : </label>
<?php echo $this->Form->input('first_name', array('label' => false)); #,'autofocus'=>'autofocus','placeholder'=>'Enter Name'
?> 
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

                <div class="lightash">
                    <fieldset>
                        <label>Date Of Birth : </label>
<?php echo $this->Form->input('dob', array('label' => false, 'type' => 'text')); ?> 
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
                        <label>Telephone 1 : </label>
<?php echo $this->Form->input('telephone1', array('label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="lightash">
                    <fieldset>
                        <label>Telephone 2 : </label>
<?php echo $this->Form->input('telephone2', array('label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>

                <div class="ash">
                    <fieldset>
                        <label>Work Place : </label>
<?php echo $this->Form->input('workplace', array('label' => false,'type'=>'text')); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="lightash">
                    <fieldset>
                        <label>Position : </label>
<?php echo $this->Form->input('position', array('label' => false,'type'=>'text')); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div> 

                <div class="ash">
                    <fieldset>
                        <label>Qualification : </label>
<?php echo $this->Form->input('qualification', array('label' => false,'type'=>'text')); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div> 

                <div class="lightash">
                    <fieldset>
                        <label>Group : </label>
                        <?php //echo $this->Form->input('group_id', array('type' => 'select', 'options' => $userGroups, 'label' => false, 'empty' => 'Select Group'));
                        ?> 
<?php echo $this->Form->input('group_id', array('label' => false, 'id' => 'e21', 'type' => 'text', 'style' => 'width:250px;')); ?>  
                    </fieldset>
                    <div class="clear"></div>
                </div> 

                <div class="ash">
                    <fieldset>
                        <label>District : </label>
<?php echo $this->Form->input('district_id', array('type' => 'select', 'options' => $districts, 'label' => false, 'empty' => 'Select District', 'onchange' => 'cityAjaxbydistrictID(this.value)')); ?> 
                    </fieldset>
                    <div class="clear"></div>
                </div> 


                <div class="lightash">
                    <fieldset>
                        <label>City : </label>
                        <span id="cityId">
                            <select name="data[User][city_id]">
                                <option value="">Select City</option>
                            </select>
                        </span>
                    </fieldset>
                    <div class="clear"></div>
                </div> 

                <div class="ash">
                    <fieldset>
                        <label>User Status : </label>
                        <?php
                        $dropdown = array('A' => 'Active', 'I' => 'Inactive');
                        echo $this->Form->input('status', array('type' => 'select', 'options' => $dropdown, 'default' => 'A', 'label' => false));
                        ?>
                    </fieldset>
                    <div class="clear"></div>
                </div> 
                
                
                <div class="lightash">
                    <fieldset>
                        <label>About User : </label>
                        <?php echo $this->Form->input('user_desc', array('label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div> 
                
                <div class="ash">
                    <fieldset>
                        <label>Email notification : </label>
                        <?php
                        echo $this->Form->checkbox('email_notification', array(
                            'value' => 'Y',
                            'hiddenField' => 'N',
                        ));
                        ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="lightash">
                    <fieldset>
                        <label>Admin comment : </label>
                        <?php echo $this->Form->input('admin_comment', array('label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>                
                 <div class="ash">
                    <fieldset>
                        <label>Profile picture : </label>
                        <?php echo $this->Form->input('profile_picture', array('label' => false, 'type' => 'file')); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="lightash">
                    <fieldset>
                        <label>&nbsp;</label><?php echo $this->Form->submit('Submit'); ?>&nbsp;&nbsp;
                        <?php
                        echo $this->Html->link('Cancel', '/admin/users/list', array('class' => 'buttonlnk'));
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
<script>
    function cityAjaxbydistrictID(district_id){
        if(district_id != ''){
             $("#cityId").html('<?php echo $this->Html->image('ajax-loader.gif',array('border'=>'0'));?>');  
            var request = $.ajax({
                type: "POST",
                url: "<?php echo $this->Html->url(array("controller" => "cities", "action" => "displayajaxbydistrictId")); ?>",
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

