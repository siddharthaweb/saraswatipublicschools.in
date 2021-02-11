<?php echo $this->Html->css('validate.css'); ?>
<?php echo $this->Html->script('jquery.validate', array('inline' => false)); ?>
<script>
    $(document).ready(function(){
        $("#GalleryAdminAddForm").validate({
            rules: {
                "data[Gallery][add_image]": {
                    required: true,
                    accept: "jpeg|jpg|gif|png"
                },
                "data[Gallery][description]": {
                    required: true
                },
                "data[Gallery][position]": {
                    required: true
                }
                
            },
            messages: {
                
                "data[Gallery][add_image]": {
                    required: "Please select one image",
                    accept: "Please upload with extention jpeg,jpg,gif,png"
                },
                "data[Gallery][description]": {
                    required: 'Please enter description' 
                },
                "data[Gallery][position]":{
                    required: "Please enter position."
                }
            }
        });
    });
    
</script>
<div class="content_sec_inner">
    <?php echo $this->element('leftpanel'); ?>
    <div class="right_sec">
        <div class="categery">
            <div class="succcls"> <?php echo $this->Session->flash('auth'); ?> </div>
            <div  class="headingall" style="text-align:left;">Add Gallery</div>
            <div class="mainarea">

                <div class="lightash">		
                    <div class="clear"></div>
                </div>
                <?php echo $this->Form->create('Gallery', array('action' => 'admin_add', 'type' => 'file')); ?>

               
                <div class="lightash">
                    <fieldset>
                        <label>Gallery img : </label>
                        <?php echo $this->Form->input('add_image', array('label' => false, 'type' => 'file')); ?>                        
                    </fieldset>
                    <div class="clear"></div>
                </div>  
                <div class="ash">
                    <fieldset>
                        <label>Description:</label>
                        <div style="float: left;margin: 0 auto 0 auto;">
                            <?php echo $this->Form->input('description', array('label' => false,'type'=>'textarea')); ?>
                        </div>
                    </fieldset>
                    <div class="clear"></div>
                </div>

                <div class="lightash">
                    <fieldset>
                        <label>Position:</label>
                        <?php echo $this->Form->input('position', array('label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                
                <div class="ash">
                    <fieldset>
                        <label>&nbsp;</label><?php echo $this->Form->submit('Submit'); ?>&nbsp;&nbsp;
                        <?php
                        echo $this->Html->link('Cancel', '/admin/galleries/list', array('class' => 'buttonlnk'));
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