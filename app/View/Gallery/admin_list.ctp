<div class="content_sec_inner">
    <?php echo $this->element('leftpanel'); ?>
    <div class="right_sec">
        <div class="categery">
            <div class="succcls"><?php echo $this->Session->flash('auth'); ?></div>
            <div  class="headingall" style="text-align:left;">Gallery Image Listing </div>
            <div class="mainarea" id="CategoryPaging">	
                <div class="heading">
                    <ul>
                        <li style="width:50px;"><?php echo $this->Paginator->sort('position', 'Sl.no'); ?></li>	
                        <li style="width:350px;"><?php echo $this->Paginator->sort('image', 'Image'); ?></li>
                        <li style="width:350px;"><?php echo $this->Paginator->sort('description', 'Description'); ?></li>
                        <li style="width:150px;">Action</li>
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
                                <li style=" width:50px;">
                                 <?php echo $value['Gallery']['position'];?>   
                                </li>
                                <li style="width:350px;height:100px;">
                                    <?php echo $this->Html->image(PRE_IMGPATH . 'timthumb.php?src=' . IMGPATH . 'gallery/' . $value['Gallery']['image'] . '&h=100&w=100', array("alt" => 'Admin', 'url' => '#', 'id' => 'actualimage')); ?></li>
                                
                                <li style="width:350px;"><?php echo $value['Gallery']['description']; ?> </li>
                                
                                <li style=" width:100px;">
                                <?php
                                echo $this->Html->link(
                                        $this->Html->image("" . $value['Gallery']['status'] . ".png", array("alt" => "status", "title" => "Change status")), "/admin/galleries/changeadvertisesstatus/" . $value['Gallery']['id'], array('escape' => false));
                                ?> 
                                 &nbsp; | &nbsp;
                                <?php
                                echo $this->Html->link(
                                        $this->Html->image("delete.png", array("alt" => "Delete", "title" => "Delete")), "/admin/galleries/delete/" . $value['Gallery']['id'], array('escape' => false), "Are you sure?"
                                );
                                ?>
                                &nbsp; | &nbsp;
                                <?php
                                echo $this->Html->link(
                                        $this->Html->image("edit.png", array("alt" => "Edit", "title" => "Edit")), "/admin/galleries/edit/" . $value['Gallery']['id'], array('escape' => false)
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
                <div>
                    <?php echo $this->element('paging'); ?> 
                </div>
            </div>
        </div>
    </div>
    <br class="spacer"/>
</div>