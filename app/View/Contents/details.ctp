<div class="cbp-row wh-content">
	<div class="cbp-container">
		<div class="wh-padding wh-content-inner">
            
            <div class="one whole wh-post-item post-35 post type-post status-publish format-standard has-post-thumbnail hentry category-category-1 category-category-2 category-uncategorized tag-reading tag-school tag-smart">
            <div class="one whole">
             
            <?php if($this->data['Content']['image'] != '' ){?>    
            <div class="thumbnail">
                <img width="895" height="430" src="<?php echo PRE_IMGPATH.'timthumb.php?src='.IMGPATH.'gallery/'.$this->data['Content']['image'].'&h=430&w=895';?>" class="wh-featured-image wp-post-image" alt="event" srcset="<?php echo PRE_IMGPATH.'timthumb.php?src='.IMGPATH.'gallery/'.$this->data['Content']['image'].'&h=430&w=895';?> 895w, <?php echo PRE_IMGPATH.'timthumb.php?src='.IMGPATH.'gallery/'.$this->data['Content']['image'].'&h=144&w=300';?> 300w, <?php echo PRE_IMGPATH.'timthumb.php?src='.IMGPATH.'gallery/'.$this->data['Content']['image'].'&h=369&w=768';?> 768w, <?php echo PRE_IMGPATH.'timthumb.php?src='.IMGPATH.'gallery/'.$this->data['Content']['image'].'&h=72&w=150';?> 150w" sizes="(max-width: 895px) 100vw, 895px" />
            </div>    
            <?php }?>    
            <h2 class="entry-title"><?php echo $this->data['Content']['title'];?></h2>
            </div>
            <div class="item one whole">
            <div class="entry-summary">
                <?php echo $this->data['Content']['description'];?>
                </div>
            
            </div>
            </div>
            
            
            
										<div class="double-pad-top">
							</div>
		</div>
		
	</div>
</div>
	