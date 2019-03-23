<?php if($responsive) { ?>
This layout contains responsive content
<?php $this->beginBlock('blockADV'); ?>
    <b>New block!</b>
<?php $this->endBlock(); ?>

<?php } else { ?>
This layout does not contain responsive content
<?php } ?>