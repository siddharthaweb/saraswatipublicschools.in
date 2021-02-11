<div style="width:600px; margin:0 auto;border:#e4f2db solid 1px;">
    <div style="width:595px; float:left;">
        <div style="padding-bottom:8px;float:left;">
            <div style="padding:10px;float:left;background-color:#13547E;font: bold 14px/14px Tahoma;color:#ffffff;width:580px;">
                <?php echo Configure::read('TITLE'); ?> Account Password Reset</div>
        </div>
        <div style="clear:both"></div>
    </div>
    <div style="width:595px; float:left;">
        <div style="padding-bottom:2px;float:left;">
            <div style="padding:10px;float:left;font:normal 12px/12px Tahoma;width:555px">Hi <?php echo $username;?>,</div>
        </div>
        <div style="clear:both"></div>
    </div>
    <div style="width:595px; float:left;">
        <div style="padding-bottom:2px;float:left;">
            <div style="padding:10px;float:left;font: normal 12px/12px Tahoma;width:540px;line-height: 5px;">
                <p>Your <?php echo Configure::read('TITLE'); ?> account password was reset at your request.</p>
                <p>Your new password : <?php echo $password; ?></p>
                <p>&nbsp;</p>
                <p>We recommend that you change your own password after signing in to your <?php echo Configure::read('TITLE'); ?> account.</p>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
    <div style="width:595px; float:left;">
        <div style="padding-bottom:8px;float:left;">
            <div style="padding:10px;float:left;font:normal 12px/12px Tahoma;width:540px;line-height: 5px;">
                <p>Thank you</p>
                <p><?php echo Configure::read('email_regards'); ?></p>
                <p style="font:normal 10px/15px Tahoma;color:#808081;"> Did not request Password Reset? Please <a href="http://<?php echo $_SERVER['HTTP_HOST'] . $this->base ?>/contact_us" target="_blank">Contact Us</a>
                </p>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>

    <?php echo $this->element('email_footer');?>
</div>