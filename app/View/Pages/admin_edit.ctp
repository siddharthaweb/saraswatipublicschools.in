<?php echo $this->Html->css('validate.css'); ?>
<?php echo $this->Html->script('jquery.validate', array('inline' => false)); ?>
<script src="<?php echo $this->webroot; ?>/ckeditor/ckeditor.js"></script>
<script src="<?php echo $this->webroot; ?>/ckfinder/ckfinder.js"></script>
<script>
    $(document).ready(function(){
        $("#PageAdminEditForm").validate({
            rules: {
                "data[Page][title]": {
                    required: true
                },
                "data[Page][content]": {
                    required: true
                }
            },
            messages: {
                "data[Page][title]":{
                    required: "Please enter page title."
                },
                "data[Page][content]": {
                    required: "Please enter page content."
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
            <div  class="headingall" style="text-align:left;">Edit Content</div>
            <div class="mainarea">
                <div class="lightash">		
                    <div class="clear"></div>
                </div>
                <?php echo $this->Form->create('Page', array('action' => 'admin_edit')); ?>
                <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>            
                <div class="lightash">
                    <fieldset>
                        <label>Title:</label>
                        <?php echo $this->Form->input('title', array('label' => false)); ?> 
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <div class="ash">
                    <fieldset>
                        <label>Content:</label>
                        <div style="float: left;margin: 0 auto 0 auto;"><?php echo $this->Form->input('content', array('label' => false, 'class' => 'ckeditor')); ?>
                        </div>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                
                <div class="lightash">
                    <fieldset>
                        <label>&nbsp;</label><?php echo $this->Form->submit('Submit'); ?>&nbsp;&nbsp;
                        <?php
                        echo $this->Html->link('Cancel', '/admin/pages/list', array('class' => 'buttonlnk'));
                        ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<br class="spacer"/>
</div>
<script type="text/javascript">
    CKEDITOR.replace( 'PageContent', {
    width: '700',
    height: '400',
    });
</script>