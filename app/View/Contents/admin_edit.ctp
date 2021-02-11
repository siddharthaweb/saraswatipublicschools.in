<?php echo $this->Html->css('validate.css'); ?>
<?php echo $this->Html->script('jquery.validate', array('inline' => false)); ?>
<script src="<?php echo $this->webroot; ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript"> 
    $(document).ready(function(){
        $("#ContentAdminEditForm").validate({
            rules: {
                "data[Content][add_image]": {
                    accept: "jpeg|jpg|gif|png"
                },
                "data[Content][title]": {
                    required: true
                },"data[Content][description]": {
                    required: true
                },
                "data[Content][position]": {
                    required: true
                }
            },
            messages: {
                "data[Content][add_image]": {
                    accept: "Please upload with extention jpeg,jpg,gif,png"
                },
                "data[Content][title]":{
                    required: "Please enter title"
                },"data[Content][description]": {
                    required: "Please enter description"
                },
                "data[Content][position]":{
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
            <?php $_type_name = array('N'=>'Notice','E'=>'Event','S'=>'Student Corner','B'=>'Booklet');?>
            <div  class="headingall" style="text-align:left;">Edit <?php echo $_type_name[$this->data['Content']['type']];?></div>
            <div class="mainarea">

                <div class="lightash">		
                    <div class="clear"></div>
                </div>
                <?php echo $this->Form->create('Content', array('action' => 'admin_edit', 'type' => 'file')); ?>
                <?php echo $this->Form->input('id', array('type' => 'hidden'));?>
                <?php echo $this->Form->input('type', array('type' => 'hidden'));?>
                
                <?php if($this->data['Content']['type'] == 'E'){?>
                <div class="ash">
                    <fieldset>
                        <label>Event Img : </label>
                        <?php
                        if($this->data['Content']['image'] != ''){
                        echo $this->Html->image(PRE_IMGPATH . 'timthumb.php?src=' . IMGPATH . 'gallery/' . $this->data['Content']['image'] . '&h=100&w=100', array("alt" => 'Admin', 'url' => '#', 'id' => 'actualimage'));
                        }
                        echo '<div class="clear"></div>
                        <div style="margin-left: 210px;">';
                        echo $this->Form->input('edit_image', array('label' => false, 'type' => 'file'));
                        echo '</div>';
                        ?>                      
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <?php } ?>
                
                <div class="lightash">
                    <fieldset>
                        <label>Title:</label>
                        <?php echo $this->Form->input('title', array('label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>

                <div class="ash">
                    <fieldset>
                        <label>Description:</label>
                        <div style="float:right;margin-right:254px;"><?php echo $this->Form->input('description', array('label' => false, 'class' => 'ckeditor')); ?></div>
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
                        <label>Display date:</label>
                        <?php echo $this->Form->input('display_date', array('label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>

                <div class="lightash">
                    <fieldset>
                        <label>&nbsp;</label><?php echo $this->Form->submit('Submit'); ?>&nbsp;&nbsp;
                        <?php
                        echo $this->Html->link('Cancel', '/admin/contents/index/'.$this->data['Content']['type'], array('class' => 'buttonlnk'));
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
