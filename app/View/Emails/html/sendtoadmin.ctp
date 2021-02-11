<div style="width:600px; margin:0 auto;border:#e4f2db solid 1px;">
    <div style="width:595px; float:left;">
        <div style="padding-bottom:8px;float:left;">
            <div style="padding:10px;float:left;background-color:#13547E;font: bold 14px/14px Tahoma;color:#ffffff;width:580px;">
                Contact From <?php echo Configure::read('TITLE'); ?></div>
        </div>
        <div style="clear:both"></div>
    </div>
    <div style="width:595px; float:left;">
        <div style="padding-bottom:2px;float:left;">
            <div style="padding:10px;float:left;font:normal 12px/12px Tahoma;width:555px">Hi Administrator,</div>
        </div>
        <div style="clear:both"></div>
    </div>
    <div style="width:595px; float:left;">
        <div style="padding-bottom:2px;float:left;">
            <div style="padding:10px;float:left;font: normal 12px/12px Tahoma;width:540px;line-height: 5px;">
                <p>Person Name :: <?php echo $first_name;?> <?php echo $last_name;?></p>
                <p>Email Address : <?php echo $email; ?></p>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
    <div style="width:595px; float:left;">
        <div style="padding-bottom:8px;float:left;">
            <div style="padding:10px;float:left;font:normal 12px/12px Tahoma;width:540px;line-height: 5px;">
                <p> Message </p>
                <p><?php echo $message;?></p>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>

    <?php echo $this->element('email_footer');?>
</div>