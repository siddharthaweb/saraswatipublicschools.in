<div class="cbp-row wh-content">
	<div class="cbp-container">
		<div class="entry-content one whole wh-padding">
				<div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element ">
		<div class="wpb_wrapper">
<div id="justified_gallery_smart-grid-child-theme-generated-id"
class="sgg-style-7 ">

<?php
 $data = ClassRegistry::init("Gallery")->find('all',array(
                            'conditions' => array('status' => 'A'),
                            'order' => array('position' => 'ASC')
                            ));
 foreach($data as $val):
?>
<!--banner1-->
    <a class="sgg-lightbox-item" href="img/gallery/<?php echo $val['Gallery']['image'];?>" data-caption="<?php echo $val['Gallery']['description']?>">
    <?php
     echo $this->Html->image(PRE_IMGPATH.'timthumb.php?src='.IMGPATH.'gallery/'.$val['Gallery']['image'].'&h=430&w=895', 
                             array("alt" => $val['Gallery']['description'])
                            );
    ?>
    </a>
 <!--banner1-->
<?php endforeach;?>    
    
    
<!--<a class="sgg-lightbox-item" href="img/gallery/01.png" data-caption="Preteenager Boy Studying"><img src="img/gallery/01-1024x690.png" alt="Preteenager Boy Studying"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/02.png" data-caption="Back to School"><img src="img/gallery/02-216x300.png" alt="Back to School"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/03.png" data-caption="Girl Hands Note to Friend"><img src="img/gallery/03-1024x674.png" alt="Girl Hands Note to Friend"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/04.png" data-caption="Girls Giggling Instead of Working"><img src="img/gallery/04-1024x680.png" alt="Girls Giggling Instead of Working"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/05.png" data-caption="Girl Proud of Great Grade"><img src="img/gallery/05-1024x762.png" alt="Girl Proud of Great Grade"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/07.png" data-caption="Lockers"><img src="img/gallery/07-1024x697.png" alt="Lockers"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/08.png" data-caption="Smiling Boys"><img src="img/gallery/08-1024x728.png" alt="Smiling Boys"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/09.png" data-caption="Concentrating on Reading Story"><img src="img/gallery/09-1024x757.png" alt="Concentrating on Reading Story"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/10.png" data-caption="Young Girl Waves American Flag"><img src="img/gallery/10-1024x619.png" alt="Young Girl Waves American Flag"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/11.png" data-caption="Smart Boy Ready to Answer Question"><img src="img/gallery/11-227x300.png" alt="Smart Boy Ready to Answer Question"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/12.png" data-caption="Girl with Friends During Reading Time"><img src="img/gallery/12-1024x640.png" alt="Girl with Friends During Reading Time"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/06.png" data-caption="Smart Girl Ready to Answer Question"><img src="img/gallery/06-197x300.png" alt="Smart Girl Ready to Answer Question"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/features-01.png" data-caption="Smart Girl Ready to Answer Question"><img src="img/gallery/features-01.png" alt="Smart Girl Ready to Answer Question"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/features-02.png" data-caption="Smart Girl Ready to Answer Question"><img src="img/gallery/features-02.png" alt="Smart Girl Ready to Answer Question"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/features-03.png" data-caption="Our School"><img src="img/gallery/features-03.png" alt="Our School"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/news-01.png" data-caption="Smart Girl Ready to Answer Question"><img src="img/gallery/news-01.png" alt="Smart Girl Ready to Answer Question"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/news-02.png" data-caption="Smart Girl Ready to Answer Question"><img src="img/gallery/news-02.png" alt="Smart Girl Ready to Answer Question"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/News-03.png" data-caption="Smart Girl Ready to Answer Question"><img src="img/gallery/News-03.png" alt="Smart Girl Ready to Answer Question"/></a>
    
<a class="sgg-lightbox-item" href="img/gallery/News-04.png" data-caption="Smart Girl Ready to Answer Question"><img src="img/gallery/News-04.png" alt="Smart Girl Ready to Answer Question"/></a>-->
    
    
    
    
    
</div>
	<div id="load_more_holder_smart-grid-child-theme-generated-id" style="display:none"></div>
			<script type="text/javascript">
				(function($){
					$("#justified_gallery_smart-grid-child-theme-generated-id").justifiedGallery({
						sizeRangeSuffixes : {'lt100': '', 'lt240': '', 'lt320': '', 'lt500': '', 'lt640': '', 'lt1024': ''},rowHeight: 175,
mobileRowHeight: 160,
margins: 14,
lastRow: "hide",
fixedHeight: false,
captions: true,
captionsColor: "#000000",
captionsOpacity: 0.7,
randomize: false,
maxRowHeight: 0,
rel: "smart-grid-child-theme-generated-id",
target: null,
refreshTime: 250,
cssAnimation: true,
captionsAnimationDuration: 500,
imagesAnimationDuration: 300,
captionsVisibleOpacity: 0.7,
class: "",
					})
					.on('jg.complete', function(){
						$('#justified_gallery_smart-grid-child-theme-generated-id').photobox('a.sgg-lightbox-item',{title: true,
counter: "(A/B)",
thumbs: true,
autoplay: false,
time: 3000,
zoomable: true,
history: false,
});					});
										WebFontConfig = {
	google: { families: [] }
};
(function() {
	var wf = document.createElement('script');
	wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	wf.type = 'text/javascript';
	wf.async = 'true';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(wf, s);
})();WebFontConfig.google.families.push('Raleway');
                    var galleries = [];
				var gallery = $("#justified_gallery_smart-grid-child-theme-generated-id");
				$(window).scroll(function() {
					if ( galleries.length >= 1  ) {
						var scroll_top = $(window).scrollTop();
						var scroll_bottom = scroll_top + $(window).height();
						var gallery_top = $(gallery).offset().top;
						var gallery_height = $(gallery).innerHeight();
						var gallery_bottom = gallery_top + gallery_height;
						if( scroll_bottom >= gallery_bottom ) {
							var images = galleries.splice(0,1);
							var image_html = $("#load_more_holder_smart-grid-child-theme-generated-id").html(images).text();
							$(gallery).append(image_html);
							$(gallery).justifiedGallery('norewind');
						}
					}
				});				})(jQuery);
			</script>
			

		</div>
	</div>
</div></div></div></div>
				</div>
	</div>
</div>
		
        
        <div class="vc_row-full-width vc_clearfix"></div>