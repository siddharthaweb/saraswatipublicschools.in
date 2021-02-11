<?php echo $this->Html->css('validate.css'); ?>
<?php echo $this->Html->script('jquery.validate', array('inline' => false)); ?>
<script>
    $(document).ready(function(){
        $("#SeoAdminEditForm").validate({
            rules: {
                "data[Seo][seo_title]": {
                    required: true
                },
                "data[Seo][seo_meta_tag]": {
                    required: true
                },
                "data[Seo][seo_meta_desc]": {
                    required: true
                }
            },
            messages: {
                "data[Seo][seo_title]":{
                    required: "Please enter seo title."
                },
                "data[Seo][seo_meta_tag]": {
                    required: "Please enter seo meta tag."
                },
                "data[Seo][seo_meta_desc]": {
                    required: "Please enter seo meta desc."
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
            <div  class="headingall" style="text-align:left;">Edit Seo data</div>
            <div class="mainarea">
                <div class="lightash">		
                    <div class="clear"></div>
                </div>
                <?php echo $this->Form->create('Seo', array('action' => 'admin_edit')); ?>
                <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>            
                <div class="lightash">
                    <fieldset>
                        <label>Title:</label>
                        <?php echo $this->Form->input('slug', array('label' => false,'readonly'=>true)); ?> 
                    </fieldset>
                    <div class="clear"></div>
                </div>
                

                <div class="lightash">
                    <fieldset>
                        <label>Seo title:</label>
                        <?php echo $this->Form->input('seo_title', array('label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>  

                <div class="ash">
                    <fieldset>
                        <label>Seo meta tag:</label>
                        <?php echo $this->Form->input('seo_meta_tag', array('label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div>  

                <div class="lightash">
                    <fieldset>
                        <label>Seo meta desc:</label>
                        <?php echo $this->Form->input('seo_meta_desc', array('label' => false)); ?>
                    </fieldset>
                    <div class="clear"></div>
                </div> 

                <div class="lightash">
                    <fieldset>
                        <label>&nbsp;</label><?php echo $this->Form->submit('Submit'); ?>&nbsp;&nbsp;
                        <?php
                        echo $this->Html->link('Cancel', '/admin/seos/list', array('class' => 'buttonlnk'));
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
