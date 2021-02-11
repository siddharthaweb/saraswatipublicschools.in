<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
            <meta name="robots" content="index,follow" />
            <title><?php echo ADMIN_TITLE; ?></title>
            <?php echo $this->Html->css('adminstyle'); ?>
            <?php echo $this->Html->script(array('curvycorners.src.js', 'jquery-1.9.1.js')); //,'jquery.validate.js'?>
            <?php echo $this->fetch('script'); ?>
            <?php echo $this->fetch('css'); ?>
            <script type="text/JavaScript">
                curvyCorners.addEvent(window, 'load', initCorners);
                function initCorners() {
                    var settings = {
                        tl: { radius: 10 },
                        tr: { radius: 10 },
                        bl: { radius: 10 },
                        br: { radius: 10 },
                        antiAlias: true
                    }
                    curvyCorners(settings, ".content_sec");
                }
            </script>
    </head>
    <body>
        <!--header code start-->
        <div class="header_main">
            <div class="header_sub">
                <div class="logo"><a href="#"></a></div>
                <ul class="top_link">
                    <li style="border:none;"><a href="<?php echo $this->Html->url('/admin/users/display/'); ?>">Welcome&nbsp;Admin</a></li>
                </ul>
            </div>
        </div>
        <!--header code end-->

        <!--body code start-->
        <?php echo $this->fetch('content'); ?>
        <!--body code end-->

        <!--footer code start-->
        <div class="footer_bg">		  
            <p><?php echo COPYRIGHT; ?></p>
        </div>
        <!--footer code end-->
    </body>
</html>
