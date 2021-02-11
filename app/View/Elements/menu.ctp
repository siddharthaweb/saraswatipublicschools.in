<header class="cbp-row wh-header wh-header-inner ">
<div class="wh-main-menu-bar-wrapper wh-sticky-header-enabled">
<div class="cbp-container">
<div class="logo-sticky">
<a href="<?php echo SITE_URL;?>">
<img width="100" src="<?php echo $this->webroot; ?>img/logo.png" alt="logo">
</a>
</div>
<div class="wh-main-menu one whole wh-padding">

<div id="cbp-menu-main">
<div class="menu-main-menu-container">
<ul id="menu-main-menu" class="sf-menu wh-menu-main pull-left">
    <li id="menu-item-948" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-8 current_page_item menu-item-has-children menu-item-948">
        <a href="<?php echo SITE_URL;?>/">Home</a>
    </li>
    <li id="menu-item-953" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-953">
        <a href="<?php echo SITE_URL;?>/about">About Us</a>
    </li>
    <li id="menu-item-949" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-949">
        <a href="<?php echo SITE_URL;?>/gallery">Gallery</a>
    </li>
    <li id="menu-item-951" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-951">
        <a href="<?php echo SITE_URL;?>/events">Events</a>
        <ul class="sub-menu">
            <li id="menu-item-954" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-954"><a href="<?php echo SITE_URL;?>/notice">Notice</a></li>
            <li id="menu-item-958" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-958"><a href="<?php echo SITE_URL;?>/student_corner">Student Corner</a></li>
        </ul>
    </li>
    <li id="menu-item-951" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-951">
        <a href="javascript:void(0);">Booklet</a>
        <ul class="sub-menu">
        <?php $_sydata = ClassRegistry::init("Content")->booklet_link('B');
            foreach($_sydata as $key => $val){
                echo '<li id="menu-item-'.$val['Content']['id'].'" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$val['Content']['id'].'"><a href="'.SITE_URL.'/contents/details/'.$val['Content']['id'].'/'.str_replace(' ','_',$val['Content']['title']).'">'.$val['Content']['title'].'</a></li>';
            }   
            ?>
        </ul>
    </li>
    <li id="menu-item-952" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-952">
        <a href="<?php echo SITE_URL;?>/contact_us">Contact</a>
    </li>
</ul>
</div>
</div>
</div>
</div>
</div>
</header>