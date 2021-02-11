<?php #print_r($groupseditdata);  ?>
<link type="text/css" href="<?php echo $this->webroot; ?>autocomplete/select2.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $this->webroot; ?>autocomplete/select2.js"></script>
<script id="script_e21">
var preload_edit_data = [
<?php
$i = 1;
foreach ($groupseditdata as $val):
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
            //,placeholder: "Select group"
            //,allowClear: false
            //,minimumInputLength: 2
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
        $("#e21").select2("data",preload_edit_data);
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
            <div  class="headingall" style="text-align:left;">View User</div>
            <div class="mainarea">
                <div class="lightash">		
                    <div class="clear"></div>
                </div>
                <?php echo $this->Form->create('User', array('action' => 'admin_details')); ?>
                <div class="lightash">
                    <fieldset>
                        <label>Surname : </label>
                        <?php echo $this->Form->input('first_name', array('label' => false)); ?> 
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
                        <?php echo $this->Form->input('confirm_email', array('label' => false, 'value' => $this->data['User']['email'])); ?> 
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
                        <?php echo $this->Form->input('workplace', array('label' => false, 'type' => 'text')); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="lightash">
                    <fieldset>
                        <label>Position : </label>
                        <?php echo $this->Form->input('position', array('label' => false, 'type' => 'text')); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div> 

                <div class="ash">
                    <fieldset>
                        <label>Qualification : </label>
                        <?php echo $this->Form->input('qualification', array('label' => false, 'type' => 'text')); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div> 
                <div class="lightash">
                    <fieldset>
                        <label>Group : </label>
                        <?php //echo $this->Form->input('group_id', array('type' => 'select', 'options' => $userGroups, 'label' => false, 'empty' => 'Select Group'));
                        ?> 
                        <?php echo $this->Form->input('group_id', array('label' => false, 'id' => 'e21', 'type' => 'hidden', 'style' => 'width:250px;')); ?>  
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
                            <?php echo $this->Form->input('city_id', array('type' => 'select', 'options' => $userCities, 'label' => false, 'empty' => 'Select City')); ?> 
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
                <div class="ash">
                    <fieldset>
                        <label>Admin comment : </label>
                        <?php echo $this->Form->input('admin_comment', array('label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                 <div class="lightash">
                    <fieldset>
                        <label>About user : </label>
                        <?php echo $this->Form->input('user_desc', array('label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="ash">
                    <fieldset>
                        <label>Profile picture : </label>
                        <?php if ($this->data['User']['profile_image'] == '') { ?>
                            <img src="<?php echo $this->webroot; ?>img/account-photo.jpg" width="144" height="144" />
                        <?php } else {
                             echo $this->Html->image(PRE_IMGPATH . 'timthumb.php?src=' . IMGPATH . 'profile_image/' . $this->data['User']['profile_image'] . '&h=156&w=153', array("alt" => 'user', 'url' => '#'));  } ?>
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