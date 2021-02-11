<div class="content_sec_inner">
    <?php echo $this->element('leftpanel'); ?>
    <div class="right_sec">
        <div class="categery">
            <div class="succcls"><?php echo $this->Session->flash('auth'); ?></div>
            <div  class="headingall" style="text-align:left;">Sub Administrator Listing </div>
            <div class="clear"></div>
            <div class="mainarea">
                <div class="heading">
                    <ul>
                        <li style="width:225px;">Name</li>
                        <li style="width:225px;">Email</li>
                        <li style="width:225px;">Action</li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <?php
                if (!empty($this->data)) {
                    $i = 0;
                    foreach ($this->data as $value) {

                        if ($i % 2 == 0) {
                            $class = "lightash";
                        } else {
                            $class = "ash";
                        }
                        ?>
                        <div class="<?= $class ?>">
                            <ul>
                                <li style="width:225px;"><?php echo $value['User']['first_name']; ?> &nbsp;<?php echo $value['User']['last_name']; ?></li>
                                <li style="width:225px;">
                                    <a href="mailto:<?php echo $value['User']['email']; ?>?Subject=from social network"><?php echo $value['User']['email']; ?></a>
                                </li>
                                <li style=" width:225px;">
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image("" . $value['User']['status'] . ".png", array("alt" => "status","title" => "Change status")), "/admin/users/changeuserstatus/" . $value['User']['id'], array('escape' => false)
                                    );
                                    ?> &nbsp; | &nbsp;
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image("delete.png", array("alt" => "Delete","title" => "Delete")), "/admin/users/subdelete/" . $value['User']['id'], array('escape' => false), "Are you sure?"
                                    );
                                    ?>
                                    &nbsp; | &nbsp;
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image("edit.png", array("alt" => "Edit","title" => "Edit")), "/admin/users/subedit/" . $value['User']['id'], array('escape' => false)
                                    );
                                    ?>
                                </li>

                            </ul>
                            <div class="clear"></div>
                        </div>
                        <?php
                        $i++;
                    }
                } 
                    ?>
                    
            </div>
        </div>
    </div>

    <br class="spacer"/>
</div>