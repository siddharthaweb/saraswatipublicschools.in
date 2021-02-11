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
        $("#e21").select2("data",preload_edit_data);
    });
</script>


<div class="inner-cont">
    <div class="left-sec">
        <div class="inner-sec">
            <h2>User Account</h2>
            <div class="user-account">
                <?php echo $this->element('navigation'); ?>
                <div class="total-cont">
                    <h2 class="left"> <span> <?php echo $this->session->read('Auth.User.first_name') . '&nbsp;' . $this->session->read('Auth.User.last_name'); ?></span></h2>
                    <br class="clr"/>
                    <div class="error-message" style="padding-left:272px;"><?php echo $this->Session->flash('auth'); ?></div>
                    
                    <div class="right">
                    <?php echo $this->Form->create('User', array('action' => 'advertise_details')); ?>
                    <p><span class="length" style="width:157px!important;">Add/Remove Categories :</span> <strong><?php echo $this->Form->input('group_id', array('label' => false, 'id' => 'e21', 'type' => 'hidden', 'style' => 'width:383px;')); ?></strong></p> 
                    <span class="right" style="margin: -10px 0 10px 0;"><?php echo $this->Form->submit('Update'); ?></span>   <?php echo $this->Form->end(); ?>
                    </div>
                    
                    <br class="clr"/>
                    <ul class="account-radio">
                        <li class="left-head">Existing Categories</li>
                        <li class="right-head">Publishing your contact detail for public view</li>
                        <?php foreach ($this->data as $key => $val): ?>
                            <li class="left ash"><span class="account-radio-button"><?php echo $val['Group']['name']; ?></span></li>
                            <li class="right ash"><input type="radio" class="clickradio" value="Y" rowid="<?php echo $val['UserGroupAddRelation']['id']; ?>" name="<?php echo $val['Group']['name']; ?>" <?php echo $val['UserGroupAddRelation']['add_vertisement'] == 'Y' ? 'checked="checked"' : ''; ?> ></input> Yes, publish my contact details for public view.<br />
                                <input type="radio" class="clickradio" value="N" rowid="<?php echo $val['UserGroupAddRelation']['id']; ?>" name="<?php echo $val['Group']['name']; ?>" <?php echo $val['UserGroupAddRelation']['add_vertisement'] == 'N' ? 'checked="checked"' : ''; ?> > No, let me stay connected with my peers and colleagues.
                            </li>
                        <?php endforeach; ?>
                    </ul>              
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
    $('.clickradio').click(function () {
        var id = $(this).attr('rowid');
        var data = $(this).val();
        if(id != '' && data != ''){
            var request = $.ajax({
                type: "POST",
                url: "<?php echo $this->Html->url(array("controller" => "users", "action" => "useradvertisechange")); ?>",
                data: {id : id, data : data},
                cache: false,
                dataType: "html"
            });
            request.done(function(msg){
                location.reload();
            });
            request.fail(function(jqXHR, textStatus) {
                alert( "Request failed: " + textStatus );
            });
        }
    }); 
</script>