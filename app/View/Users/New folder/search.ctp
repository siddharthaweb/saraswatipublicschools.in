<link type="text/css" href="<?php echo $this->webroot; ?>autocomplete/select2.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $this->webroot; ?>autocomplete/select2.js"></script>
<script id="script_e21">
    var preload_data = [
<?php
$i = 1;
foreach ($this->data as $val):
    if ($i != 1) {
        echo ',';
    }
    ?>     
                { id: '<?php echo $val['User']['id']; ?>', text: '<?php echo $val['User']['first_name'] . ' ' . $val['User']['last_name']; ?>'}
    <?php
    $i++;
endforeach;
?>
    ];
    $(document).ready(function () {
        $('#e21').select2({
            multiple: false
            ,query: function (query){
                var data = {results: []};
                $.each(preload_data, function(){
                    if(query.term.length == 0 || this.text.toUpperCase().indexOf(query.term.toUpperCase()) >= 0 ){
                        data.results.push({id: this.id, text: this.text });
                    }
                });
                query.callback(data);
            }
        });
    });
</script>
<div class="inner-cont">
    <div class="left-sec">

        <div class="inner-sec">
            <h2 class="left">&nbsp;</h2>
            <div class="search-right">
                <?php
                echo $this->Form->create('User', array('action' => 'search', 'type' => 'get'));
                echo $this->Form->input('group_id', array('type' => 'hidden', 'value' => $this->request->query['group_id']));
                echo $this->Form->input('city_id', array('type' => 'hidden', 'value' => $this->request->query['city_id']));
                echo $this->Form->input('userlsitid', array('label' => false, 'div' => false, 'id' => 'e21', 'style' => 'width:220px;'));
                echo $this->Form->submit('GO', array('div' => false));
                echo $this->Form->end();
                ?>
            </div>
            <br class="clr" />
            <div class="group-cont">
                <h2>&nbsp;</h2>
                <ul>
                    <?php
                    if (count($this->data) > 0 && !empty($this->data[0]['User']['id'])) {
                        foreach ($this->data as $key => $val):
                            $is_new = $this->Time->wasWithinLast(Configure::read('newtagavailable_days'), $val['User']['reg_date'], $userOffset = null);
                            ?>
                            <li><div class="left">
                                    <?php
                                    if ($val['User']['profile_image'] == '') {
                                        echo $this->Html->image('account-photo.jpg', array("height" => '136', "weidth" => '136', "alt" => 'user', 'border' => '0', 'url' => array('controller' => 'users', 'action' => 'member_view', $val['User']['id'])));
                                    } else {
                                        echo $this->Html->image(PRE_IMGPATH . 'timthumb.php?src=' . IMGPATH . 'profile_image/' . $val['User']['profile_image'] . '&h=136&w=136', array("alt" => 'user', 'border' => '0', 'url' => array('controller' => 'users', 'action' => 'member_view', $val['User']['id'])));
                                    }
                                    ?>    
                                </div>
                                <div class="right">
                                    <?php if ($is_new == 1 && $this->Session->read('userlogin') == 'yes') { ?>
                                        <div class="new-tag"><img src="<?php echo $this->webroot; ?>img/new-tag.png" alt="new tag" /></div>
                                        <?php
                                        $is_new = 0;
                                    }
                                    ?>
                                    <p><?php echo $val['User']['first_name']; ?> <?php echo $val['User']['last_name']; ?> 
                                        <?php if ($val['User']['qualification'] != '') echo ',' . $val['User']['qualification']; ?></p>
                                    <p> <?php echo $val['User']['position']; ?>  
                                        <?php if ($val['User']['position'] != '' && $val['User']['workplace'] != '') echo ' - '; ?>
                                        <?php echo $val['User']['workplace']; ?> 
                                    </p>
                                    <p><?php echo $this->Details->CitynameById($val['User']['city_id']); ?></p>
                                    <p><?php echo $val['User']['telephone1']; ?>
                                        <?php if ($val['User']['telephone2'] != '' && $val['User']['telephone1'] != '') echo ','; ?>
                                        <?php echo $val['User']['telephone2']; ?>
                                    </p>
                                    <p style="padding-bottom: 2px;"><?php echo $val['User']['email']; ?></p>
                                    <p><?php echo $this->Text->excerpt($val['User']['user_desc'], 'method', 200, ''); ?></p>
                                </div>
                            </li>
                            <?php
                        endforeach;
                    } else {
                        ?> 
                        <li> <div class="right"><h3>No member found</h3></div></li>
            <?php } ?>
                </ul>
                <br class="clr" />
            </div>
<?php echo $this->element('paging'); ?> 
            <br class="clr" />
        </div>
        <div class="clr"></div>
    </div>
<?php echo $this->element('tagcloud'); ?>
    <div class="clr"></div>
</div>