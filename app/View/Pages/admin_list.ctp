<div class="content_sec_inner">
    <?php echo $this->element('leftpanel'); ?>
    <div class="right_sec">
        <div class="categery">
            <div class="succcls"><?php echo $this->Session->flash('auth'); ?></div>
            <div  class="headingall" style="text-align:left;">Content Listing </div>
            <div class="mainarea" id="CategoryPaging">	
                <div class="heading">
                    <ul>
                        <li style="width:300px;">Url</li>
                        <li style="width:250px;">Page Name</li>
                        <li style="width:250px;">Page Title</li>
                        <li style="width:100px;">Action</li>
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
                                <li style=" width:300px;">
                                    <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/' . $value['Page']['slug']; ?>" target="_blank">
                                        <?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/' . $value['Page']['slug']; ?>
                                    </a>
                                </li>
                                <li style="width:250px;"><?php echo $value['Page']['slug']; ?></li>
                                <li style="width:250px;"><?php echo $value['Page']['title']; ?> </li>
                                <li style=" width:100px;">
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image("edit.png", array("alt" => "Edit", "title" => "Edit")), "/admin/pages/edit/" . $value['Page']['id'], array('escape' => false)
                                    );
                                    ?>
                                </li>		
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <?php
                        $i++;
                    }
                } else {
                    ?>
                    <div class="lightash">
                        <ul>
                            <li style="width:200px;"> &nbsp; </li>
                            <li style="width:300px;"> No Data Found </li>
                            <li style="width:200px;"> &nbsp; </li>
                        </ul>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <br class="spacer"/>
</div>