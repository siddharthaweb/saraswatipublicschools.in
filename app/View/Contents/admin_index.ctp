<div class="content_sec_inner">
    <?php echo $this->element('leftpanel'); ?>
    <div class="right_sec">
        <div class="categery">
            <div class="succcls"><?php echo $this->Session->flash('auth'); ?></div>
            <div  class="headingall" style="text-align:left;">
            <?php $_type_name = array('N'=>'Notice','E'=>'Event','S'=>'Student Corner','B'=>'Booklet');?>   
            <?php echo $_type_name[$this->request->pass[0]];?> Listing 
            </div>
            <?php echo $this->element('alphabetsearch', array('fieldname' => 'title')); ?>
            <div class="mainarea">
                <div class="heading">
                    <ul>
                     <li style="width:100px;"><?php echo $this->Paginator->sort('position', 'SL.No'); ?></li>   
                     <li style="width:500px;"><?php echo $this->Paginator->sort('title', 'Title'); ?></li>	
                     <li style="width:100px;"><?php echo $this->Paginator->sort('id', 'Action'); ?></li>
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
                                <li style="width:100px;"><?php echo $value['Content']['position']; ?></li>
                                <li style="width:500px;"><?php echo $value['Content']['title']; ?></li>
                                <li style=" width:100px;">
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image($value['Content']['status'].".png", array("alt" => "Status", "title" => "Change Status")), "/admin/contents/changestatus/" . $value['Content']['id'], array('escape' => false)
                                    );
                                    ?> &nbsp; | &nbsp;
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image("delete.png", array("alt" => "Delete", "title" => "Delete")), "/admin/contents/delete/" . $value['Content']['id'].'/'.$this->request->pass[0], array('escape' => false), "Are you sure?"
                                    );
                                    ?>
                                    &nbsp; | &nbsp;
                                    <?php
                                    echo $this->Html->link(
                                            $this->Html->image("edit.png", array("alt" => "Edit", "title" => "Edit")), "/admin/contents/edit/" . $value['Content']['id'], array('escape' => false)
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
                            <li style="width:700px; text-align: center;">No Data Found</li>
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