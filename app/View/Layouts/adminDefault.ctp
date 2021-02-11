<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
            <?php echo $this->Html->meta('favicon.ico', '/app/webroot/favicon.ico', array('type' => 'icon')); ?>
            <meta name="robots" content="index,follow" />
            <title><?php echo ADMIN_TITLE; ?></title>
            <?php echo $this->Html->css(array('adminstyle.css')); ?>
            <?php echo $this->Html->script(array('jquery-1.9.1.js')); ?>
            <!--[if IE]>
            <?php echo $this->Html->script(array('html5.js')); ?>
            <![endif]-->
            <?php echo $this->fetch('script'); ?>
            <?php echo $this->fetch('css'); ?>
    </head>
    <body>
        <!--header code start-->
        <div class="header_main">
            <div class="header_sub">
                <div class="logo"><a href="#"></a></div>
                <ul class="top_link">
                    <li style="border:none;"><a href="<?php echo $this->Html->url('/admin/users/display/'); ?>">Welcome&nbsp;Admin</a></li>
                    <li><a href="<?php echo $this->Html->url('/admin/users/logout/'); ?>" class="active">Logout</a></li>
                </ul>
            </div>
        </div>
        <!--header code end-->		
        <!--body code start-->
        <?php echo $this->fetch('content'); ?>
        <?php 
        if(Configure::read('QueryDisplay') == 1){
            echo $this->element('sql_dump');
        }
        ?>
        <!--body code end-->		
        <!--footer code start-->		
        <div class="footer_bg">
            <p><?php echo COPYRIGHT; ?></p>
        </div>
        <!--footer code end-->
        <?php //echo $this->Js->writeBuffer();?>
        
    </body>
</html>