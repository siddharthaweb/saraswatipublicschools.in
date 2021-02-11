<div class="cbp-row wh-content">
	<div class="cbp-container">
		<div class="wh-padding wh-content-inner">
            <?php
             $data = ClassRegistry::init("Content")->find('all',array(
                                        'conditions' => array('status' => 'A','type'=>$this->request->type),
                                        'order' => array('position' => 'ASC')
                                        ));
             foreach($data as $val):
            ?>
            <div class="one whole wh-post-item post-35 post type-post status-publish format-standard has-post-thumbnail hentry category-category-1 category-category-2 category-uncategorized tag-reading tag-school tag-smart">
            <div class="one whole">
            <!--<div class="thumbnail">
            <a href="#" title="Survey for School Time Alumni"><img width="895" height="430" src="img/gallery/News-04.png" class="wh-featured-image wp-post-image" alt="Smart Girl Ready to Answer Question" srcset="img/gallery/News-04.png 895w, img/gallery/News-04-300x144.png 300w, img/gallery/News-04-768x369.png 768w, img/gallery/News-04-150x72.png 150w" sizes="(max-width: 895px) 100vw, 895px" /></a>		
            </div>-->
                
            <h2 class="entry-title"><a href="contents/details/<?php echo $val['Content']['id']?>/<?php echo str_replace(' ','',$val['Content']['title']);?>"><?php echo $val['Content']['title'];?></a></h2>
            </div>
            <div class="item one whole">
            <div class="entry-summary">
                <?php echo $val['Content']['description'];?>
                </div>
            <a class="wh-alt-button read-more" href="contents/details/<?php echo $val['Content']['id']?>/<?php echo str_replace(' ','',$val['Content']['title']);?>">Read more</a>
            </div>
            </div>
            <?php endforeach;?>
            
            <!--<div class="one whole wh-post-item post-33 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized tag-calendar tag-date tag-year">

	<div class="one whole">
		<div class="thumbnail">
			<a href="#" title="Calendar Changes in School Time"><img width="895" height="430" src="img/gallery/news-02.png" class="wh-featured-image wp-post-image" alt="Smart Girl Ready to Answer Question" srcset="img/gallery/news-02.png 895w, img/gallery/news-02-300x144.png 300w, img/gallery/news-02-768x369.png 768w, img/gallery/news-02-150x72.png 150w" sizes="(max-width: 895px) 100vw, 895px" /></a>		</div>
		
		<h2 class="entry-title"><a href="#">Calendar Changes in School Time</a></h2>
	</div>
	<div class="item one whole">
		<div class="entry-summary">Education is the process of facilitating learning. Knowledge, skills, values, beliefs, and habits of a group of people are transferred to other people, through storytelling, discussion, teaching, training, or research. Education frequently takes place under the guidance of educators, but learners may also educate themselves in a process called autodidactic learning. Any experience that has a formative effect on the&nbsp;<a href="#">[&hellip;]</a></div>
		<a class="wh-alt-button read-more" href="#">Read more</a>
	</div>
</div>
            <div class="one whole wh-post-item post-6 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized tag-book tag-library tag-read">

	<div class="one whole">
		<div class="thumbnail">
			<a href="#" title="Read Across America Week and Bookfair!"><img width="895" height="430" src="img/gallery/news-01.png" class="wh-featured-image wp-post-image" alt="Smart Girl Ready to Answer Question" srcset="img/gallery/news-01.png 895w, img/gallery/news-01-300x144.png 300w, img/gallery/news-01-768x369.png 768w, img/gallery/news-01-150x72.png 150w" sizes="(max-width: 895px) 100vw, 895px" /></a>		</div>
		
		<h2 class="entry-title"><a href="#">Read Across America Week and Bookfair!</a></h2>
	</div>
	<div class="item one whole">
		<div class="entry-summary">Education is the process of facilitating learning. Knowledge, skills, values, beliefs, and habits of a group of people are transferred to other people, through storytelling, discussion, teaching, training, or research. Education frequently takes place under the guidance of educators, but learners may also educate themselves in a process called autodidactic learning. Any experience that has a formative effect on the&nbsp;<a href="#">[&hellip;]</a></div>
		<a class="wh-alt-button read-more" href="#">Read more</a>
	</div>
</div>-->
            
            
										<div class="double-pad-top">
							</div>
		</div>
		
	</div>
</div>
	