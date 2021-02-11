<div id="pagination_main">
<?php if($count > ADMIN_DATA_PER_PAGE){?>
<div id="pagination">
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
<?php echo str_replace("|","",$this->Paginator->numbers()); ?>
<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>
</div>
<?php } ?>
</div>