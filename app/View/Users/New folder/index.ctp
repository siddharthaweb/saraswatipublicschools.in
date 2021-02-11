<div class="wrapper">
    <div class="index-banner">
        <!----------------------------------------------sliding------------------------------------------------------->  
        <div class="left">
            <div class="index-banner-left" id="banner">
                <?php
                 $banner = ClassRegistry::init("Advertise")->find('all');
                 foreach($banner as $val):
                ?>
                <!--banner1-->
                <div>
                    <?php
                     echo $this->Html->image(PRE_IMGPATH.'timthumb.php?src='.IMGPATH.'advertise_image/'.$val['Advertise']['advertise'].'&h=361&w=660', array("alt" => 'Admin','url' => $val['Advertise']['url']));
                    ?>
                </div>
                <!--banner1--> 
                <?php endforeach;?>
            </div>
            <!--index-banner-left-end -->
            <div class="clr"><img src="<?php echo $this->webroot; ?>img/shadow.png" alt="shadow" /></div>
        </div>
        <!----------------------------------------------sliding------------------------------------------------------->  
        <div class="index-banner-right">
            <?php echo $this->element('index_tagcloud'); ?>
        </div>
        <div class="clr"></div>
    </div><!--index-banner-end-->
</div>